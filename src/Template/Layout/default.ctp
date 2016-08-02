<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
   <ul id="slidetoggle" class="clearAfter">
                <li><a href="/jobportal">Home</a></li>
                <li><a href="#">How works</a></li>
                <?php
                if(!$u_id){
                ?>
                <li>
                    <?php echo $this->Html->link(__d('users', 'Login'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login'],['class' => ''] ); ?>

                </li>
                <li>
                    <?php echo $this->Html->link(__d('users', 'Sign up'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'register'],['class' => 'link_fon'] ); ?>
                </li>
                <?php }else{?>
                <li>
                    <?php echo $this->Html->link(__d('users', 'Logout'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout'],['class' => ''] ); ?>
                </li>
                   <?php if($u_role != 'superuser'){ ?>
                <li>
                    <?php echo $this->Html->link('Edit profile', ['controller' => 'Profiles', 'action' => 'user_edit'],['class' => ''] ); ?>
                </li>
                <li>
                    <?php echo $this->Html->link('Balance', ['controller' => 'Transactions', 'action' => 'index'],['class' => ''] ); ?>
                </li>
                   <?php }?>
                <?php if($u_role == 'superuser'){ ?>
                    <li>
                        <?php echo $this->Html->link('Admin Panel', ['controller' => 'Admins', 'action' => 'index'],['class' => ''] ); ?>
                    </li>
                <?php } ?>
                <?php } ?>

            </ul>
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
