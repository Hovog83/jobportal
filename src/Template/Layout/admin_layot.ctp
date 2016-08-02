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
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php $this->assign('title', $title_for_layout_include); ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('/Books_Admin/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/Books_Admin/css/style.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
        
    <?= $this->Html->script('jquery-1.11.3.min') ?>
    <?= $this->Html->script('jquery-ui.min') ?>
    
    <?= $this->Html->script('SelectInspiration/classie') ?>
    <?= $this->Html->script('SelectInspiration/selectFx') ?>
    
    <?= $this->Html->script('/Books_Admin/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/Books_Admin/js/bootstrap.js') ?>
    
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="maincontainer">
        <?php echo $this->element('admin_header'); ?>
        <?= $this->Flash->render() ?>
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>
        <?php echo $this->element('admin_footer'); ?>
    </div>
</body>
</html>
