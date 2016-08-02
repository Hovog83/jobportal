<!-- Navigation bar -->
    <nav class="navbar">
    <div class="container">
          <div class="pull-right log">
          <?php if(!$u_id){ ?>
              <?php echo $this->Html->link(__d('users', 'login'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login'],['class' => ''] ); ?>
              or
              <?php echo $this->Html->link(__d('users', 'register'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'registerUser'],['class' => 'link_fon'] ); ?>
              or
              <?php echo $this->Html->link(__d('users', 'register company'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'registerCompany'],['class' => 'link_fon'] ); ?>
            <?php }else{?>
               <?php echo $this->Html->link(__d('users', 'Logout'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout'],['class' => ''] ); ?>
            <?php }?>
            <!-- <a href="user-login.html">login</a> or <a href="user-register.html">register</a> -->
          </div>
          <div class="lang pull-right">
           <a href="#">English</a> /
           <a href="#">العربية</a>
         </div>
        </div>
        <hr>
      <div class="container">

        <!-- Logo -->
        <div class="pull-left">
          <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

          <div class="logo-wrapper">
            <a class="logo" href="/jobportal"><?php echo $this->Html->image("logo.png",["logo"]) ?></a>
            <a class="logo-alt" href="/jobportal"><?php echo $this->Html->image("logo-alt.png",["logo-alt"]) ?></a>
          </div>

        </div>
        <!-- END Logo -->


        <!-- Navigation menu -->
        <ul class="nav-menu">
          <li>
            <a class="active" href="index.html">Home</a>
            <ul>
              <li><?php echo $this->Html->link('Version 1', ['controller' => 'Pages', 'action' => 'index']);?></li>
              <li><?php echo $this->Html->link('Version 2', ['controller' => 'Pages', 'action' => 'index']);?></li>
            </ul>
          </li>
          <li>
            <a href="#">Position</a>
            <ul>
              <li><a href="job-list-1.html">Browse jobs - 1</a></li>
              <li><a href="job-list-2.html">Browse jobs - 2</a></li>
              <li><a href="job-list-3.html">Browse jobs - 3</a></li>
              <li><a href="job-detail.html">Job detail</a></li>
              <li><a href="job-add.html">Post a job</a></li>
              <li><a href="job-manage.html">Manage jobs</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Resume</a>
            <ul>
              <li><a href="resume-list.html">Browse resumes</a></li>
              <li><a href="resume-detail.html">Resume detail</a></li>
              <li><a href="resume-add.html">Create a resume</a></li>
              <li><a href="resume-manage.html">Manage resumes</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Company</a>
            <ul>
              <li><a href="company-list.html">Browse companies</a></li>
              <li><a href="company-detail.html">Company detail</a></li>
              <li><?php echo $this->Html->link('Create a company', ['controller' => 'Companes', 'action' => 'addCompany']);?></li>
              <li><?php echo $this->Html->link('Manage companies', ['controller' => 'Companes', 'action' => 'manageCompanes/'.$u_id]);?></li>
            </ul>
          </li>
          <li>
            <a href="#">Pages</a>
            <ul>
              <li><a href="page-blog.html">Blog</a></li>
              <li><a href="page-post.html">Blog-post</a></li>
              <li><a href="page-about.html">About</a></li>
              <li><a href="page-contact.html">Contact</a></li>
              <li><a href="page-faq.html">FAQ</a></li>
              <li><a href="page-pricing.html">Pricing</a></li>
              <li><a href="page-typography.html">Typography</a></li>
              <li><a href="page-ui-elements.html">UI elements</a></li>
            </ul>
          </li>
        </ul>
        <!-- END Navigation menu -->

      </div>
    </nav>
    <!-- END Navigation bar -->


