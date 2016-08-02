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
      <a href="/jobportal">
        <img src="/jobportal/img/logo.png" alt="">

      </a>
        <h1>Log into your account</h1>

        <?= $this->Form->create($user); ?>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-user"></i></span>
              <?= $this->Form->input('username',['label' => false , 'placeholder' => 'Your Name','class'=>"form-control"]);?>
              <!-- <input type="text" class="form-control" placeholder="Your name"> -->
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
              <?= $this->Form->input('email', ['label' => false , 'placeholder' => 'Your email address','class'=> 'form-control']);?>
              <!-- <input type="text" class="form-control" placeholder="Your email address"> -->
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              <?= $this->Form->input('password', ['label' => false , 'placeholder' => 'Choose a password','class'=> 'form-control']);?>
              <!-- <input type="password" class="form-control" placeholder="Choose a password"> -->
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              <?= $this->Form->input('password_confirm', ['type' => 'password' , 'placeholder' => 'Confirm password' , 'label' => false,'class'=> 'form-control']);;?>
              <!-- <input type="password" class="form-control" placeholder="Choose a password"> -->
            </div>
          </div>
            <?php
                // if (Configure::read('Users.Tos.required')) {
                //     echo $this->Form->input('tos', [
                //         'type' => 'checkbox',
                //         'label' => __d('Users', 'Accept TOS conditions?'),
                //         'required' => true ,
                //         'templates' => [
                //             'nestingLabel' => '<label{{attrs}}>{{input}}<p class="check_text">{{text}}</p></label>',
                //         ]
                //     ]);
                // }
                // if (Configure::read('Users.reCaptcha.registration')) {
                //     echo $this->User->addReCaptcha();
                // }
            ?>
            <?= $this->Form->button(__d('Users', 'Sign Up') , ['class' => 'btn btn-primary btn-block']); ?>
          <!-- <button class="btn btn-primary btn-block" type="submit">Sign up</button> -->

          <div class="login-footer">
            <h6>Or register with</h6>
            <ul class="social-icons">
            <?= implode(' ', $this->User->socialLoginList()); ?>
<!--               <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li> -->
            </ul>
          </div>

        <?= $this->Form->end(); ?>
      </div>

      <div class="login-links">
        <p class="text-center">Already have an account? <?php echo $this->Html->link(__d('users', 'Login'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login'],['class' => 'txt-brand'] ); ?></p>
      </div>
