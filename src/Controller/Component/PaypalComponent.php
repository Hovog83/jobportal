<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Routing\Router;
use PayPal\Rest\ApiContext; 
use PayPal\Auth\OAuthTokenCredential; 
use PayPal\Api\FlowConfig;
use PayPal\Api\Amount; 
use PayPal\Api\Details; 
use PayPal\Api\Item; 
use PayPal\Api\ItemList; 
use PayPal\Api\Payer; 
use PayPal\Api\Payment;
use PayPal\Api\Order;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

class PaypalComponent extends Component
{
//    public $components = array('CakeEmail');
    
    private $payer = Null;
    private $apiContext = null;
    private $currency = 'USD';

    
    /**
     * Initialize method
     * setup the payment credentials and currency off passed trow exception credentials not supplied
     *
     * @param array $config config options
     * @return void
     */
    public function initialize(array $config){
        parent::initialize($config);
        if(!isset($config['ClientID'],$config['ClientSecret'])){
            throw new \Cake\Core\Exception\Exception('Invalid credentials', '700');
        }
        if(isset($config['currency']))
            $this->currency = $config['currency'];
        
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $config['ClientID'],     // ClientID
                $config['ClientSecret']  // ClientSecret
            )
        );
        $this->apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                'log.LogEnabled' => true,
                'log.FileName' => '../logs/PayPal.log',
                'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                'cache.enabled' => false,
                // 'http.CURLOPT_CONNECTTIMEOUT' => 30
                // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
                //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
            )
        );
        $this->payer = new Payer(); 
        $this->payer->setPaymentMethod("paypal");
        
        
    }
    
    /**
     * initialze payment and redirect to paypal
     * 
     * @param type $data
     */
    public function initPayment($data){
        $validate = array(
            'amount'        => 'number',
            'payment_name'  => 'string',
            'payment_description' => 'string'
        );
        try{
            $this->_validateInput($data, $validate);
            
            $flowConfig = new FlowConfig();
            $flowConfig->setLandingPageType("Billing");
            $flowConfig->setBankTxnPendingUrl("http://www.yeowza.com/");
            
            
            $presentation = new \PayPal\Api\Presentation();
            $presentation->setLogoImage("http://www.yeowza.com/favico.ico")
                ->setBrandName("Sguru Paypal")
                ->setLocaleCode("US");
            
            $inputFields = new \PayPal\Api\InputFields();
            
            $inputFields->setAllowNote(true)
                ->setNoShipping(1)
                ->setAddressOverride(0);
            
            $webProfile = new \PayPal\Api\WebProfile();
            
            $webProfile->setName("YeowZa! T-Shirt Shop" . uniqid())
                ->setFlowConfig($flowConfig)   
                ->setPresentation($presentation) 
                ->setInputFields($inputFields);
             
            $request = clone $webProfile;

            try {
                $createProfileResponse = $webProfile->create($this->apiContext);
            } catch (\Exception $ex) {
                $result = ['data' => 'error', 'url' => $ex->getMessage()];
                return $result;
            }


            $item1 = new Item();
            $item1->setName($data['payment_name'])
                ->setCurrency($this->currency) 
                ->setQuantity(1) 
//                ->setSku("123123") // Similar to `item_number` in Classic API 
                ->setPrice($data['amount']);

            $itemList = new ItemList();
            $itemList->setItems(array($item1));
            
            $amount = new Amount();
            $amount->setCurrency($this->currency)
                ->setTotal($data['amount']);
//                ->setDetails($details);

            $transaction = new Transaction(); 
            $transaction->setAmount($amount) 
                ->setItemList($itemList) 
                ->setDescription($data['payment_description']) 
                ->setInvoiceNumber(uniqid());
            
            $redirectUrls = new RedirectUrls(); 
            $url = Router::url([
                'controller' => 'payments',
                'action' => 'acceptPayment',
                '?' => ['success' => 'true'],
            ], true);
            $cencalurl = Router::url([
                'controller' => 'payments',
                'action' => 'acceptPayment',
                '?' => ['success' => 'false'],
            ], true);
            
            $redirectUrls->setReturnUrl($url) 
                ->setCancelUrl($cencalurl);

            $payment = new Payment();
            $payment->setIntent("order")
                ->setExperienceProfileId($createProfileResponse->id)
                ->setPayer($this->payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));

            $request = clone $payment;

            try {
                $payment->create($this->apiContext);
                $approvalUrl = $payment->getApprovalLink();
                $result = ['data' => 'success', 'url' => $approvalUrl];
            } catch (\Exception $ex) {
                $result = ['data' => 'error', 'url' => $ex->getMessage()];
            } catch (\Cake\Core\Exception\Exception $ex) {
                $result = ['data' => 'error', 'url' => $ex->getMessage()];
            }
        } catch (\Cake\Core\Exception\Exception $ex ){
            $result = ['data' => 'error', 'url' => $ex->getMessage()];
        }
        return $result;
    }

    /**
     *
     */
    public function completePayment(){
        
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);
        
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        $transaction = new Transaction();

        $amount = new Amount();
        $amount->setCurrency($this->currency);
        $amount->setTotal($payment->getTransactions()['0']->getAmount()->getTotal());
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        try {
            $result = $payment->execute($execution, $this->apiContext);

            try {
                $payment = Payment::get($paymentId, $this->apiContext);
                
                $transactions = $payment->getTransactions();
                $transaction = $transactions[0];
                $relatedResources = $transaction->getRelatedResources();
                $relatedResource = $relatedResources[0];
                $order = $relatedResource->getOrder();
                $result = Order::get($order->getId(), $this->apiContext);
                $result->orderEmail = $payment->getPayer()->getPayerInfo()->getEmail();
                $result = ['data' => 'success', 'url' => $result];
            } catch (\Exception $ex) {
                $result = ['data' => 'error', 'url' => $ex->getMessage()];
            } catch (\Cake\Core\Exception\Exception $ex) {
                $result = ['data' => 'error', 'url' => $ex->getMessage()];
            }
        } catch (\Exception $ex) {
            $result = ['data' => 'error', 'url' => $ex->getMessage()];
        } catch (\Cake\Core\Exception\Exception $ex) {
            $result = ['data' => 'error', 'url' => $ex->getMessage()];
        }
        return $result;
    }
    
    /**
     * 
     * @param array $data
     */
    public function sendMoney($data){
        $validate = array(
            'sum'   => 'number',
            'email'   => 'email'
        );
        $this->_validateInput($data, $validate);

        $payouts = new \PayPal\Api\Payout();

        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();
        $senderBatchHeader->setSenderBatchId(uniqid())
            ->setEmailSubject("You have a Payout!");
        
        $senderItem = new \PayPal\Api\PayoutItem();
        $senderItem->setRecipientType('Email')
            ->setNote('Thanks for your patronage!')
            ->setReceiver($data['email'])
            ->setSenderItemId(" 2014031400023")
            ->setAmount(new \PayPal\Api\Currency('{
                    "value":"'.$data['sum'].'",
                    "currency":"USD"
                }'));
        
        $payouts->setSenderBatchHeader($senderBatchHeader) 
                ->addItem($senderItem);
        
        $request = clone $payouts;
        
        try {
            $output = $payouts->createSynchronous($this->apiContext);
            $result = ['data' => 'success', 'url' => $output];
        } catch (\Exception $ex) {
            $result = ['data' => 'error', 'url' => $ex->getMessage()];
        } catch (\Cake\Core\Exception\Exception $ex) {
            $result = ['data' => 'error', 'url' => $ex->getMessage()];
        }
        return $result;
    }

    private function _validateInput($inputData, $required){
        if(!is_array($inputData) || !is_array($required))
            throw new \Cake\Core\Exception\Exception ('invalid data subbmited');
        
        foreach ($required as $key => $rule){
            if(!isset($inputData[$key])){
                throw new \Cake\Core\Exception\Exception ($key . ' is missing');
            }
            switch ($rule){
                case 'number':
                    if(!is_numeric($inputData[$key]))
                        throw new \Cake\Core\Exception\Exception ($key . ' must be number');
                    break;
                case 'string':
                    if(!is_string($inputData[$key]))
                        throw new \Cake\Core\Exception\Exception ($key . ' must be number');
                    break;
                case 'email':
                    if(!preg_match("/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/",$inputData[$key]))
                        throw new \Cake\Core\Exception\Exception ($key . ' must be email');
                    break;
                default :
                    throw new \Cake\Core\Exception\Exception ('wrong validation');
            }
        }
    }

}
