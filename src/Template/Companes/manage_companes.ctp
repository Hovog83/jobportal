 <?php echo $this->element('english/header') ?>
 <!-- Page header -->
    <header class="page-header bg-img size-lg" style="background-image: url(/jobportal/img/bg-banner1.jpg)">
      <div class="container no-shadow">
        <h1 class="text-center">Manage companies</h1>
        <p class="lead text-center">Here's the list of your registered companies. You can edit or delete them, or even add a new one.</p>
      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row item-blocks-condensed">

            <div class="col-xs-12 text-right">
              <br>
              <a class="btn btn-primary btn-sm" href="company-add.html">Add new company</a>
            </div>

           <!-- Company item -->
          <?php foreach($companes as $key => $company): ?>
           <?php
           // echo "<pre>";
           // print_r($company->Jobs);die;
            $path = '/img/logo-google.jpg';
            if(!empty($company->logo) && file_exists(WWW_ROOT.'system'.DS.'uploads'.DS.$company->logo)){
                $path = '/system/uploads/'.$company->logo;
                }

            ?>
            <div class="col-xs-12">
              <div class="item-block">
                <header>
                  <a href="/jobportal/companes/company-detail/<?php echo $company->company_id?>"><?= $this->Html->image($path); ?></a>
                  <div class="hgroup">
                    <h4><a href="company-detail.html"><?= $company->comapny_name?></a></h4>
                    <h5><?= $company->Categores['name']?><a href="company-detail.html#open-positions"><span class="label label-info"><?=$company->Jobs?> jobs</span></a></h5>
                  </div>
                  <div class="action-btn">
                    <?=$this->html->link('Edit',['action' => 'editCompanes/'.$company->company_id.''],['class'=>'btn btn-xs btn-gray'])?>
                    <a class="btn btn-xs btn-danger" href="#">Delete</a>
                  </div>
                </header>
              </div>
            </div>
          <?php endforeach; ?>
            <!-- END Company item -->
          </div>
        </div>
      </section>
    </main>
    <!-- END Main container -->
