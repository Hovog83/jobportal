<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('CakeDC/Users.UsersAuth');
        // $this->loadComponent('Auth', [
        //     'loginAction' => [
        //         'controller' => 'Users',
        //         'action' => 'login',
        //         'plugin' => 'Users'
        //     ],
        //     'authError' => 'Did you really think you are allowed to see that?',
        //     'authenticate' => [
        //         'Form' => [
        //             'fields' => ['username' => 'email']
        //         ]
        //     ],
        //     'storage' => 'Session'
        // ]);
    }
    public function beforeFilter(\Cake\Event\Event $event) {
      parent::beforeFilter($event);
      // $this->Auth->allow(['register','social', 'social_redirect']);
    }

    public function index() {
         $users = $this->set('users', $this->Users->find('all')->toArray());
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        echo "<pre>";
        print_r($user);die;
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function register(){
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity($this->request->data);
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user->toArray());
                return $this->redirect($this->Auth->redirectUrl());
            }
            // return $this->redirect();
        }
    }

  public function social($provider) {

    /* Include the Config File */
    require_once(ROOT . DS . 'vendor' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'config.php');
    require_once(ROOT . DS . 'vendor' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'Hybrid' . DS . 'Auth.php');

    /* Initiate Hybrid_Auth Function*/
    $hybridauth = new \Hybrid_Auth($config);
    $authProvider = $hybridauth->authenticate($provider);
    $user_profile = $authProvider->getUserProfile();

    /*Modify here as per you needs. This is for demo */
    if ($user_profile && isset($user_profile->identifier)) {
        echo "<b>Name</b> :" . $user_profile->displayName . "<br>";
        echo "<b>Profile URL</b> :" . $user_profile->profileURL . "<br>";
        echo "<b>Image</b> :" . $user_profile->photoURL . "<br> ";
        echo "<img src='" . $user_profile->photoURL . "'/><br>";
        echo "<b>Email</b> :" . $user_profile->email . "<br>";
        echo "<br> <a href='logout.php'>Logout</a>";
    }
    exit;

   /*Example Demo For FB authorize Action*/
   #Facebook authorize
    if ($this->request->params['pass'][0] == 'Facebook') {
        if ($user_profile && isset($user_profile->identifier)) {
            $this->authorize_facebook($user_profile);
        }
    }
}

public function social_redirect() {
    $this->layout = false;
    $this->autoRender = false;
    require_once(ROOT . DS . 'vendor' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'config.php');
    require_once(ROOT . DS . 'vendor' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'Hybrid' . DS . 'Auth.php');
    require_once(ROOT . DS . 'vendor' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'hybridauth' . DS . 'Hybrid' . DS . 'Endpoint.php');
    $hybridauth = new \Hybrid_Auth($config);
    \Hybrid_Endpoint::process();
}


public function authorize_facebook($user_profile) {

        $provider = "Facebook";
        $provider_uid = $user_profile->identifier;

        $userExist = $this->Users->find('all')->where(['Users.provider' => $provider, 'Users.provider_uid' => $user_profile->identifier])->first();


        if ((isset($userExist)) && ($userExist)) {

            $session = $this->request->session();
            $session->delete('auth_sess_var');
            $session->destroy();
            $this->Auth->setUser($userExist->toArray());
            $session->write('auth_sess_var', $userExist);
            return $this->redirect($this->Auth->redirectUrl());
        } else {

            /* Create new user entity */
            $user = $this->Users->newEntity();
            $tmp_hash = md5(rand(0, 1000));
            $tmp_id = time();

            /* Save individual data */
            $user->tmp_id = $tmp_id;
            $user->firstname = (!empty($user_profile->firstName)) ? $user_profile->firstName : "";
            $user->lastname = (!empty($user_profile->lastName)) ? $user_profile->lastName : "";
            $user->username = (!empty($user_profile->lastName) && !empty($user_profile->lastName)) ? strtolower($user_profile->firstName) . "." . strtolower($user_profile->lastName) : "";
            $user->avatar = (!empty($user_profile->photoURL)) ? $user_profile->photoURL : "";
            $user->role = "public";
            $user->provider = $provider;
            $user->provider_uid = $user_profile->identifier;
            $user->gender = !empty($user_profile->gender) ? (($user_profile->gender == 'male') ? 'm' : 'f' ) : "";
            $user->provider_email = !empty($user_profile->email) ? $user_profile->email : "";
            $user->password = $user_profile->identifier;
            $user->confirm_password = $user_profile->identifier;
            $user->tmp_hash = $tmp_hash;
            $user->isverified = (!empty($user_profile->emailVerified)) ? 1 : 0;
            $user = $this->Users->patchEntity($user, $this->request->data);
            $this->Users->save($user);

            $userDetails = $this->Users->find('all')->where(['Users.provider' => $provider, 'Users.provider_uid' => $user_profile->identifier])->first();

            /* Destroy previous session before setting new Session */
            $session = $this->request->session();
            $session->delete('auth_sess_var');
            $session->destroy();

            /* Set user */
            $this->Auth->setUser($userDetails->toArray());
            $session->write('auth_sess_var', $userDetails);
            return $this->redirect($this->Auth->redirectUrl());
        }
    }

}

