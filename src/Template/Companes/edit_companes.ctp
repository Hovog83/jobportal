<style>
  .error-message{
    color:red;
    padding-left: 5px;
  }

</style>
<?php echo $this->element('english/header'); ?>
 <?php echo $this->form->create($company_profile,[ 'type'=>'file','id'=>'editForm']); ?>
 <?php $img ='';$class = ''; ?>
 <?php if(!empty($data->cover) && file_exists(WWW_ROOT.DS.'system'.DS.'uploads'.$data->cover)): ?>
      <?php $img = 'style="background-image: url(/jobportal/system/uploads/<?php echo $bg_img?>)"' ?>
      <?php $class = 'bg-img'; ?>
 <?php endif; ?>
      <!-- Page header -->
      <header class="page-header <?php echo $class?>" <?php echo $img; ?>>
        <div class="container page-name">
          <h1 class="text-center">Add your company</h1>
          <p class="lead text-center">Create a profile for your company and put it online.</p>
        </div>

        <div class="container">

          <div class="row">
            <div class="col-xs-12">
              <div class="row">

                <div class="col-xs-12 col-sm-4 col-lg-2">
                  <div class="form-group">
                  <?php
                     $coverPath = '/jobportal/img/logo-default.png';
                      if(!empty($data->logo) && file_exists(WWW_ROOT.DS.'system'.DS.'uploads'.DS.$data->logo)){
                        $coverPath = '/jobportal/system/uploads/'.$data->logo;
                      }
                   ?>
                  <?php echo $this->form->input('Company_profile.logo',['type'=>'file','class'=>'dropify logoImage','data-default-file'=> $coverPath]) ?>
                    <!-- <input type="file" class="dropify" data-default-file="/jobportal/img/logo-default.png"> -->
                    <span class="help-block">A square logo</span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-lg-10">
                  <div class="form-group">
                  <?php echo $this->form->input('company_profile.comapny_name',['class'=>'form-control input-lg','placeholder'=>'Comapny name','label'=>false]) ?>
                  </div>
                  <div class="form-group">
                  <?php echo $this->form->input('company_profile.headline',['class'=>'form-control','placeholder'=>'Headline (e.g. Internet and computer software)','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Headline (e.g. Internet and computer software)"> -->
                  </div>

                  <div class="form-group">
                  <?php echo $this->form->textarea('company_profile.short_description',['class'=>'form-control','placeholder'=>'Short description','label'=>false,'rows'=>3]) ?>
                    <!-- <textarea class="form-control" rows="3" placeholder="Short description"></textarea> -->
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xs-12">
              <div class="row">

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <?php echo $this->form->input('company_profile.location',['class'=>'form-control','placeholder'=>'Location, e.g. Melon Park, CA','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Location, e.g. Melon Park, CA"> -->
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                      <?php  echo $this->form->input('company_profile.employer',['class'=>'form-control selectpicker','label'=>false,'options'=>['0 - 9','10-99','100-999','1,000-9,999,10,000-99,999','100,000-999,999']]) ?>
<!--                     <select class="form-control selectpicker" name="employer">
                      <option>0 - 9</option>
                      <option>10 - 99</option>
                      <option>100 - 999</option>
                      <option>1,000 - 9,999</option>
                      <option>10,000 - 99,999</option>
                      <option>100,000 - 999,999</option>
                    </select> -->
                    <span class="input-group-addon">Employer</span>
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                    <?php echo $this->form->input('company_profile.website_address',['class'=>'form-control','placeholder'=>'Website address','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Website address"> -->
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                     <?php echo $this->form->input('company_profile.founded',['type'=>'text','class'=>'form-control','placeholder'=>'Founded on, e.g. 2013','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" name="founded" placeholder="Founded on, e.g. 2013"> -->
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <?php echo $this->form->input('company_profile.phone_number',['class'=>'form-control','placeholder'=>'Phone number','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Phone number"> -->
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <?php echo $this->form->input('company_profile.email_address',['class'=>'form-control','placeholder'=>'Email address','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Email address"> -->
                  </div>
                </div>

              </div>
            </div>


          </div>

          <div class="button-group">
            <div class="action-buttons">
              <div class="upload-button">
                <button class="btn btn-block btn-primary">Choose a cover image</button>
                 <?php echo $this->Form->input('Company_profile.cover', array('type' => 'file', 'label' => false, 'id' => 'cover_img_file','class'=>'image')); ?>
                <!-- <input id="cover_img_file" type="file"> -->
              </div>
            </div>
          </div>

        </div>
      </header>
      <!-- END Page header -->


      <!-- Main container -->
      <main>

        <!-- Social media -->
        <section>
          <div class="container">

            <header class="section-header">
              <span>Get connected</span>
              <h2>Social media</h2>
            </header>

            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                    <?php echo $this->form->input('profile_url.facebook',['class'=>'form-control','placeholder'=>'Profile URL','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Profile URL"> -->
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                    <?php echo $this->form->input('profile_url.google-plus',['class'=>'form-control','placeholder'=>'Profile URL','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Profile URL"> -->
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                    <?php echo $this->form->input('profile_url.dribbble',['class'=>'form-control','placeholder'=>'Profile URL','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Profile URL"> -->
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
                    <?php echo $this->form->input('profile_url.pinteres',['class'=>'form-control','placeholder'=>'Profile URL','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Profile URL"> -->
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                    <?php echo $this->form->input('profile_url.twitter',['class'=>'form-control','placeholder'=>'Profile URL','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Profile URL"> -->
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-github"></i></span>
                    <?php echo $this->form->input('profile_url.github',['class'=>'form-control','placeholder'=>'Profile URL','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Profile URL"> -->
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                    <?php echo $this->form->input('profile_url.instagram',['class'=>'form-control','placeholder'=>'Profile URL','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Profile URL"> -->
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                    <?php echo $this->form->input('profile_url.youtube',['class'=>'form-control','placeholder'=>'Profile URL','label'=>false]) ?>
                    <!-- <input type="text" class="form-control" placeholder="Profile URL"> -->
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>
        <!-- Social media -->

        <!-- Company detail -->
        <section class=" bg-alt">
          <div class="container">

            <header class="section-header">
              <span>About</span>
              <h2>Company detail</h2>
              <p>Write about your company, culture, benefits of working there, etc.</p>
            </header>
              <?php echo $this->form->textarea('company_profile.summernote_editor',['class'=>'summernote-editor','label'=>false]) ?>
            <!-- <textarea class="summernote-editor"></textarea> -->

          </div>
        </section>
        <!-- END Company detail -->


        <!-- Submit -->
        <section>
          <div class="container">
            <header class="section-header">
              <span>Are you done?</span>
              <h2>Submit it</h2>
              <p>Please review your information once more and press the below button to put your company online.</p>
            </header>

            <p class="text-center"><?= $this->Form->button(__('Submit your company'),['class'=>'btn btn-success btn-xl btn-round']); ?></p>

          </div>
        </section>
        <!-- END Submit -->


      </main>
      <!-- END Main container -->
<?php echo $this->form->end(); ?>