<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Routing\Router;
use Services_Twilio;
use Services_Twilio_Twiml;

/**
 * Class TwilioComponent
 * @package App\Controller\Component
 */
class TwilioComponent extends Component
{
    /**
     * Account sid
     * @var string
     */
    protected $_sid = false;

    /**
     * Auth token
     * @var string
     */
    protected $_token = false;

    /**
     * @param array $config
     */
    public function initialize(array $config)
    {
        $this->_sid = 'ACdd82f905a49b31a9e3c8e59cbede3b59';
        $this->_token = '367fcb86c08c6d226c1a332fab157b1d';
    }

    /**
     * @param $phoneNumber
     * @return Services_Twilio_Twiml
     */
    public function join($phoneNumber)
    {
        $response = new Services_Twilio_Twiml;
        $response->say(
            'Please enter a pin code to connect to conference',
            [
                'voice' => 'alice',
                'language' => 'en-GB'
            ]
        );
        $response->gather([
            'numDigits' => 4,
            'action' => Router::url([
                'controller' => 'Twilios',
                'action' => 'connectConference',
                $phoneNumber
            ]),
            'method' => 'POST'
        ]);

        return $response;
    }

    /**
     * @param $phoneNumber
     * @return Services_Twilio_Twiml
     */
    public function connect($phoneNumber)
    {
        $response = new Services_Twilio_Twiml;
        $response->say(
            'You have joined the conference.',
            ['voice' => 'alice', 'language' => 'en-GB']
        );
        $dial = $response->dial(['timeLimit' => 20]);
        $dial->conference('Room ' . $phoneNumber, [
            'waitUrl' => 'http://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient',
        ]);

        return $response;
    }

    public function hangup()
    {
        $response = new Services_Twilio_Twiml;
        $response->say(
            'Wrong pin code.',
            ['voice' => 'alice', 'language' => 'en-GB']
        );
        $response->hangup();

        return $response;
    }

    public function buyNewNumber()
    {
        $client = new Services_Twilio($this->_sid, $this->_token);
        $newNumber = false;
        $returnData = ['success' => false];

        $numbers = $client->account->available_phone_numbers->getList('US', 'Local', array(
            'AreaCode' => '855',
            'VoiceEnabled' => 'true',
            'SmsEnabled' => 'true'
        ));

        foreach($numbers->available_phone_numbers as $availableNumber) {
            $newNumber = $availableNumber->phone_number;
            break;
        }

        if($newNumber) {
            $number = $client->account->incoming_phone_numbers->create(array(
                'FriendlyName' => $newNumber,
                'PhoneNumber' => $newNumber,
                'VoiceUrl' => Router::url([
                    'controller' => 'Twilios',
                    'action' => 'joinConference',
                    str_replace('+', '', $newNumber)
                ]),
                'VoiceMethod' => 'GET'
            ));

            $returnData = [
                'success' => true,
                'number' => $newNumber,
                'numberSid' => $number->sid
            ];
        }

        return $returnData;
    }
}