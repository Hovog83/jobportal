<?php
$homeActiv = '';
$userActiv = 'active';
if (!empty($users)) {
    $userActiv = '';
    $homeActiv = 'active';
}
?>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <span class="navbar-brand">Admin Panel</span>
       </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="<?php echo $userActiv; ?>">
                    <?php echo $this->Html->link('Home', ['controller' => 'Admins', 'action' => 'index']); ?>
                </li>
                <li class="<?php echo $homeActiv; ?>">
                   <?php echo $this->Html->link('Users List', ['controller' => 'Admins', 'action' => 'users']); ?>
                </li>
                <li >
                   <?php echo $this->Html->link('Users Side', ['controller' => 'Pages', 'action' => 'index']); ?>
                </li>
                <li>
                     <?php echo $this->Html->link(__d('users', 'Logout'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout']); ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
    