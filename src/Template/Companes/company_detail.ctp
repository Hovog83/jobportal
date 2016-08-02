<?php echo $this->element('english/header'); ?>
    <!-- Page header -->
    <?php $cover_path = '/jobportal/img/bg-banner2.jpg' ?>
    <?php if(!empty($company[0]->cover) && file_exists(WWW_ROOT.'system'.DS.'uploads'.DS.$company[0]->cover)): ?>
    	<?php $cover_path = '/jobportal/system/uploads/'.$company[0]->cover; ?>
    <?php endif; ?>
    <header class="page-header bg-img size-lg" style="background-image: url(<?=$cover_path?>)">
      <div class="container">
        <div class="header-detail">
        <?php $logo_path = '/img/logo-google.jpg' ?>
        <?php if(!empty($company[0]->logo) && file_exists(WWW_ROOT.'system'.DS.'uploads'.DS.$company[0]->logo)): ?>
        	<?php $logo_path = '/system/uploads/'.$company[0]->logo; ?>
        <?php endif; ?>
          <?php echo $this->Html->image('/system/uploads/'.$company[0]->logo,['class' => 'logo']) ?>
          <div class="hgroup">
            <h1><?php echo $company[0]->comapny_name; ?></h1>
            <h3><?php echo $company[0]->headline?></h3>
          </div>
          <hr>
          <p class="lead"><?php echo $company[0]->short_description; ?></p>

          <ul class="details cols-3">
            <li>
              <i class="fa fa-map-marker"></i>
              <span><?php echo $company[0]->location ?></span>
            </li>

            <li>
              <i class="fa fa-globe"></i>
              <a href="#"><?php echo $company[0]->website_address; ?></a>
            </li>

            <li>
              <i class="fa fa-users"></i>
              <span><?php echo $company[0]->employer; ?> employer</span>
            </li>

            <li>
              <i class="fa fa-birthday-cake"></i>
              <span>From <?php echo date_format($company[0]->founded,'Y'); ?></span>
            </li>

            <li>
              <i class="fa fa-phone"></i>
              <span><?php echo $company[0]->phone_number; ?></span>
            </li>

            <li>
              <i class="fa fa-envelope"></i>
              <a href="#"><?php echo $company[0]->email_address; ?></a>
            </li>
          </ul>

          <div class="button-group">
            <ul class="social-icons">
            <?php 
            		$social_links = json_decode($company[0]->profile_url);

            if(!empty($social_links->facebook)): ?>
              <li><a class="facebook" href="<?php echo $social_links->facebook?>"><i class="fa fa-facebook"></i></a></li>
             <?php endif; ?> 
             <?php if(!empty($social_links->twitter)): ?>
              <li><a class="twitter" href="<?php echo $social_links->twitter ?>"><i class="fa fa-twitter"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($social_links->github)): ?>
              <li><a class="dribbble" href="<?php echo $social_links->github ?>"><i class="fa fa-dribbble"></i></a></li>
  		      <?php endif; ?>
  		      <?php if(!empty($social_links->youtube)): ?>
              <li><a class="youtube" href="<?php echo $social_links->youtube; ?>"><i class="fa fa-youtube"></i></a></li>
          	  <?php endif; ?>
          	  <?php if(!empty($social_links->instagram)): ?>
              <li><a class="instagram" href="<?php echo $social_links->instagram ?>"><i class="fa fa-instagram"></i></a></li>
              <?php endif; ?>
            </ul>

            <div class="action-buttons">
              <a class="btn btn-gray" href="#">Favorite</a>
              <a class="btn btn-success" href="#">Contact</a>
            </div>
          </div>

        </div>
      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>


      <!-- Company detail -->
      <section>
        <div class="container">

          <header class="section-header">
            <span>About</span>
            <h2>Company detail</h2>
          </header>
          		<?php echo $company[0]->summernote_editor; ?>          		
        </div>
      </section>
      <!-- END Company detail -->


      <!-- Open positions -->
      <section id="open-positions" class="bg-alt">
        <div class="container">
          <header class="section-header">
            <span>vacancies</span>
            <h2>Open positions</h2>
          </header>
          
          <div class="row">
<?php foreach ($company as $key => $job):?>
            <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="job-detail.html">
                <header>
                  <img src="assets/img/logo-google.jpg" alt="">
                  <div class="hgroup">
                    <h4>Senior front-end developer</h4>
                    <h5>Google <span class="label label-success">Full-time</span></h5>
                  </div>
                  <time datetime="2016-03-10 20:00">34 min ago</time>
                </header>

                <div class="item-body">
                  <p>A rapidly growing, well established marketing firm is looking for an experienced web developer for a full-time position. In this role, you will develop websites, apps, emails and other forms of digital electronic media, all while maintaining brand standards across design projects and other marketing communication materials.</p>
                </div>

                <footer>
                  <ul class="details cols-3">
                    <li>
                      <i class="fa fa-map-marker"></i>
                      <span>Menlo Park, CA</span>
                    </li>

                    <li>
                      <i class="fa fa-money"></i>
                      <span>$90,000 - $110,000 / year</span>
                    </li>

                    <li>
                      <i class="fa fa-certificate"></i>
                      <span>Master or Bachelor</span>
                    </li>
                  </ul>
                </footer>
              </a>
            </div>
            <!-- END Job item -->
        <?php endforeach; ?>
          </div>

        </div>
      </section>
      <!-- END Open positions -->


    </main>
    <!-- END Main container -->
