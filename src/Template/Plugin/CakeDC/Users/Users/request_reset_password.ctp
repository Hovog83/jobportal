</div>
    <div class="login-block">

    <?= $this->Html->link($this->Html->image('logo.png',['alt'=>'logo']),'/',['escape' => false])?>
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Request password reset</h1>

        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create('User') ?>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
              <?= $this->Form->input('reference', ['label' => false , 'placeholder' => 'Email','class'=>'form-control']) ?>
              <!-- <input type="text" class="form-control" placeholder="Email"> -->
            </div>
          </div>
        <?= $this->Form->button(__d('Users', 'Request reset link') , ['class' => 'btn btn-primary btn-block']); ?>
          <!-- <button class="btn btn-primary btn-block" type="submit">Request reset link</button> -->
        <?= $this->Form->end() ?>
      </div>

      <div class="login-links">
        <p class="text-center"><?php echo $this->Html->link(__d('users', 'Back to login'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login'],['class' => 'txt-brand'] ); ?></p>
  </div>