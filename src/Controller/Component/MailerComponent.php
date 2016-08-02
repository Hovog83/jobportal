<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;

class MailerComponent extends Component
{
//    public $components = array('CakeEmail');
    
    public $concierge = Null;
    public $noreply = Null;
    
    public $team = null;
    public $web = null;
	
    public $controller = null;
    
    public $Email = null;
    
    /**
     * Initialize method, setup Auth if not already done passing the $config provided and
     * setup the default table to Users.Users if not provided
     *
     * @param array $config config options
     * @return void
     */
    public function initialize(array $config){
        parent::initialize($config);
        $this->Email = new Email();
//        $this->concierge = Configure::read('Email.concierge');
//        $this->noreply = Configure::read('Email.noreply');
//        $this->team = Configure::read('TeamName');
//        $this->web = Configure::read('WebName');
        $this->concierge = 'sguru@startupix.com';
        $this->noreply = 'sguru';
        $this->team = '';
        $this->web = '';
    }
    

    /**
     * Sends an email to the admin after filling contact us form
     * @param array $data An array of user and profile data
     * @return bool Returns true if email is sent successfully, false otherwise
     */
    public function contact($data) {
        $sent = $this->Email->template('contact')
                            ->emailFormat('both')
                            ->to('armanpetrosyan9@gmail.com')
                            ->bcc('ofelie.avetisyan@gmail.com')
                            ->subject('New message from Contact')
                            ->from($data['email'])
                            ->emailFormat('html')
                            ->viewVars(array('messageData' => $data))
                            ->send();
        return $sent;
    }
}
