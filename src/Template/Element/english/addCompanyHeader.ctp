 <!-- Navigation bar -->
     <?php echo $this->Flash->render();?>
    <nav class="navbar">

      <div class="container">

        <!-- Logo -->
        <div class="pull-left">
          <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

          <div class="logo-wrapper"> <a class="logo" href="/jobportal"><?php echo $this->Html->image('logo.png',['alt'=>'logo']) ?>

            <a class="logo-alt" href="/jobportal"><?php echo $this->Html->image('logo-alt.png',['alt'=>'logo-alt']) ?></a>
          </div>

        </div>
        <!-- END Logo -->
        <!-- User account -->
        <div class="pull-right">

          <div class="dropdown user-account">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <?php echo $this->Html->image('logo-envato.png',['alt'=>'logo-envato']) ?>
              </a>
            <ul class="dropdown-menu dropdown-menu-right">
            <?php if(!$u_id){ ?>
              <li><?php echo $this->Html->link(__d('users', 'login'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login'],['class' => ''] ); ?></li>
              or
              <li><?php echo $this->Html->link(__d('users', 'register'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'register'],['class' => 'link_fon'] ); ?></li>
            <?php }else{?>
               <li><?php echo $this->Html->link(__d('users', 'Logout'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout'],['class' => ''] ); ?></li>
            <?php }?>
          </ul>
           <!--  <ul class="dropdown-menu dropdown-menu-right">
              <li><a href="user-login.html">Login</a></li>
              <li><a href="user-register.html">Register</a></li>
              <li><a href="user-forget-pass.html">Forget pass</a></li>
              <li><a href="#">Logout</a></li>
            </ul> -->
          </div>

        </div>
        <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
          <li>
            <a href="index.html">Home</a>
            <ul>
              <li><a href="index.html">Version 1</a></li>
              <li><a href="index-2.html">Version 2</a></li>
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
            <a class="active" href="#">Company</a>
            <ul>
              <li><a href="company-list.html">Browse companies</a></li>
              <li><a href="company-detail.html">Company detail</a></li>
              <li><a class="active" href="company-add.html">Create a company</a></li>
              <li><a href="company-manage.html">Manage companies</a></li>
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