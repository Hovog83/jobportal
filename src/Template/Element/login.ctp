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

use Cake\Core\Configure;

?>
 <div class="login-block">
        <img src="assets/img/logo.png" alt="">
        <h1>Log into your account</h1>

       <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create() ?>
          <div class="form-group">
            <div class="input-group">
               <span class="input-group-addon"><i class="ti-email"></i></span>
             <?= $this->Form->input('email', ['required' => true ,'class' =>' form-control', 'label' => false , 'placeholder' => 'إنه وسيم جدا']) ?>
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
             <?= $this->Form->input('password', ['required' => true ,'class'=>'form-control', 'label' => false , 'placeholder' => 'Password']) ?>
            </div>
          </div>
              <?= $this->Form->button('Login',['class'=>'btn btn-primary btn-block']); ?>
          <!-- <button class="btn btn-primary btn-block" type="submit">Login</button> -->

          <div class="login-footer">
            <h6>Or login with</h6>
            <ul class="social-icons">

              <li><?php echo $this->User->facebookLogin(); ?><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>

               <?= $this->Form->end() ?>
      </div>

      <div class="login-links">
           <?php
                $registrationActive = Configure::read('Users.Registration.active');
                if (Configure::read('Users.Email.required')) {
                    // echo '<div class="right">';
                    echo $this->Html->link(__d('users', 'Forget Password?'),['action' => 'requestResetPassword'],['class'=>'pull-left']);
                    // echo '</div>';
                }
                if ($registrationActive) {
                    // echo '<div class="left">';
                    echo $this->Html->link(__d('users', 'Register an account'), ['action' => 'register'],['class'=>'pull-right']);
                    // echo '</div>';
                }
                ?>
        <!-- <a class="pull-left" href="user-forget-pass.html">Forget Password?</a> -->
        <!-- <a class="pull-right" href="user-register.html">Register an account</a> -->
      </div>