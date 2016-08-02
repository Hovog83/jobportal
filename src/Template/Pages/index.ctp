<?php echo $this->element('english/header'); ?>
 <!-- Site header -->
    <header class="site-header size-lg text-center" style="background-image: url(assets/img/bg-banner1.jpg)">
      <div class="container">
        <div class="col-xs-12">
          <br><br>
          <h2>We offer <mark>1,259</mark> job vacancies right now!</h2>
          <h5 class="font-alt">Find your desire one in a minute</h5>
          <br><br><br>
          <form class="header-job-search">
            <div class="input-keyword">
              <input type="text" class="form-control" placeholder="Job title, skills, or company">
            </div>

            <div class="input-location">
              <input type="text" class="form-control" placeholder="City, state or zip">
            </div>

            <div class="btn-search">
              <button class="btn btn-primary" type="submit">Find jobs</button>
              <a href="job-list.html">Advanced Job Search</a>
            </div>
          </form>
        </div>

      </div>
    </header>
    <!-- END Site header -->
 <!-- Main container -->
    <main>
<!-- Recent jobs -->
             <!-- recent jobs -->
       <section>
       <header class="section-header">
            <span>Latest</span>
            <h2>Recent Jobs </h2>
            <p>Here's the last five job posted on the website</p>
          </header>
         <div class="container clearfix">
           <div class="col-md-3">
             <div class="jobs">
               <?php echo $this->Html->image("recentjobs.jpg",["recentjobs"]); ?>
               <!-- <img src="assets/img/recentjobs.jpg"> -->
               <span class="jobtitle">Job Title</span>
               <a href="#"><h5>Company name</h5></a>
               <p class="location">location</p>
               <span class="label label-success">Full-time</span>
               <p>This is at least a point higher than the average for employees who do their jobs in regular offices</p>
             </div>
           </div>
           <div class="col-md-3">
             <div class="jobs">
               <?php echo $this->Html->image("recentjobs.jpg",["recentjobs"]); ?>
               <!-- <img src="assets/img/recentjobs.jpg"> -->
               <span class="jobtitle">Job Title</span>
               <a href="#"><h5>Company name</h5></a>
               <p class="location">location</p>
               <span class="label label-warning">Part-time</span>
               <p>This is at least a point higher than the average for employees who do their jobs in regular offices</p>
             </div>
           </div>
           <div class="col-md-3">
             <div class="jobs">
               <?php echo $this->Html->image("recentjobs.jpg",["recentjobs"]); ?>
               <!-- <img src="assets/img/recentjobs.jpg"> -->
               <span class="jobtitle">Job Title</span>
               <a href="#"><h5>Company name</h5></a>
               <p class="location">location</p>
               <span class="label label-info">Freelance</span>
               <p>This is at least a point higher than the average for employees who do their jobs in regular offices</p>
             </div>
           </div>
           <div class="col-md-3">
             <div class="jobs">
               <?php echo $this->Html->image("recentjobs.jpg",["recentjobs"]); ?>
               <!-- <img src="assets/img/recentjobs.jpg"> -->
               <span class="jobtitle">Job Title</span>
               <a href="#"><h5>Company name</h5></a>
               <p class="location">location</p>
               <span class="label label-danger">Internship</span>
               <p>This is at least a point higher than the average for employees who do their jobs in regular offices</p>
             </div>
           </div>
         </div>
         <div class="rows container clearfix">
           <div class="col-md-3">
             <div class="jobs">
               <?php echo $this->Html->image("recentjobs.jpg",["recentjobs"]); ?>
               <!-- <img src="assets/img/recentjobs.jpg"> -->
               <span class="jobtitle">Job Title</span>
               <a href="#"><h5>Company name</h5></a>
               <p class="location">location</p>
               <span class="label label-success">Full-time</span>
               <p>This is at least a point higher than the average for employees who do their jobs in regular offices</p>
             </div>
           </div>
           <div class="col-md-3">
             <div class="jobs">
               <!-- <img src="assets/img/recentjobs.jpg"> -->
               <?php echo $this->Html->image("recentjobs.jpg",["recentjobs"]); ?>
               <span class="jobtitle">Job Title</span>
               <a href="#"><h5>Company name</h5></a>
               <p class="location">location</p>
               <span class="label label-warning">Part-time</span>
               <p>This is at least a point higher than the average for employees who do their jobs in regular offices</p>
             </div>
           </div>
           <div class="col-md-3">
             <div class="jobs">
               <?php echo $this->Html->image("recentjobs.jpg",["recentjobs"]); ?>
               <!-- <img src="assets/img/recentjobs.jpg"> -->
               <span class="jobtitle">Job Title</span>
               <a href="#"><h5>Company name</h5></a>
               <p class="location">location</p>
               <span class="label label-info">Freelance</span>
               <p>This is at least a point higher than the average for employees who do their jobs in regular offices</p>
             </div>
           </div>
           <div class="col-md-3">
             <div class="jobs">
               <?php echo $this->Html->image("recentjobs.jpg",["recentjobs"]); ?>
               <!-- <img src="assets/img/recentjobs.jpg"> -->
               <span class="jobtitle">Job Title</span>
               <a href="#"><h5>Company name</h5></a>
               <p class="location">location</p>
               <span class="label label-danger">Internship</span>
               <p>This is at least a point higher than the average for employees who do their jobs in regular offices</p>
             </div>
           </div>
         </div>
           <div class="more-jobs">
              <a class="btn btn-info" href="job-list.html">More Jobs </a>
          </div>
       </section>
        <!-- end recent jobs -->





      <!-- Categories -->
      <section class="bg-alt">
        <div class="container">
          <header class="section-header">
            <span>Categories</span>
            <h2>Popular categories</h2>
            <p>Here's the most popular categories</p>
          </header>

          <div class="category-grid">
            <a href="job-list-1.html">
              <i class="fa fa-laptop"></i>
              <h6>Technology</h6>
              <p>Designer, Developer, IT Service, Front-end developer, Project management</p>
            </a>

            <a href="job-list-2.html">
              <i class="fa fa-line-chart"></i>
              <h6>Accounting</h6>
              <p>Finance, Tax service, Payroll manager, Book keeper, Human resource</p>
            </a>

            <a href="job-list-3.html">
              <i class="fa fa-medkit"></i>
              <h6>Medical</h6>
              <p>Doctor, Nurse, Hospotal, Dental service, Massagist</p>
            </a>

            <a href="job-list-1.html">
              <i class="fa fa-cutlery"></i>
              <h6>Food</h6>
              <p>Restaurant, Food service, Coffe shop, Cashier, Waitress</p>
            </a>

            <a href="job-list-2.html">
              <i class="fa fa-newspaper-o"></i>
              <h6>Media</h6>
              <p>Journalism, Newspaper, Reporter, Writer, Cameraman</p>
            </a>

            <a href="job-list-3.html">
              <i class="fa fa-institution"></i>
              <h6>Government</h6>
              <p>Federal, Law, Human resource, Manager, Biologist</p>
            </a>
          </div>

        </div>
      </section>
      <!-- END Categories -->

               <section>
           <div class="container">
           <header class="section-header">
            <span>استيقظت.</span>
            <h2>Recent Blog Post</h2>
            <p>Blog posts</p>
          </header>
             <div class="blogpost clearfix">
               <div class="col-md-4">
                  <div class="new-post">
                  <?php echo $this->Html->image("blog-1.jpg",["blog-1"]); ?>
                    <!-- <img src="assets/img/blog-1.jpg"> -->
                    <a href="page-post.html" class="page-post-link">Design Your Workspace</a>
                    <div class="blog-content">
                      <p class="text">
                       One of the greatest benefits of a well-designed workspace and consequently, the option of privacy in the office is an increase in engagement and productivity among workers.
                      </p>
                    </div>
                    <div class="more">
                      <a class="btn btn-info" href="job-list.html">read more</a>
                    </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="new-post">
                  <?php echo $this->Html->image("blog-1.jpg",["blog-1"]); ?>
                    <!-- <img src="assets/img/blog-1.jpg"> -->
                    <a href="page-post.html" class="page-post-link">Design Your Workspace</a>
                    <div class="blog-content">
                      <p class="text">
                       One of the greatest benefits of a well-designed workspace and consequently, the option of privacy in the office is an increase in engagement and productivity among workers.
                      </p>
                    </div>
                    <div class="more">
                      <a class="btn btn-info" href="job-list.html">Read more</a>
                    </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="new-post">
                  <?php echo $this->Html->image("blog-1.jpg",["blog-1"]); ?>
                    <!-- <img src="assets/img/blog-1.jpg"> -->
                    <a href="page-post.html"  class="page-post-link">Design Your Workspace</a>
                    <div class="blog-content">
                      <p class="text">
                       One of the greatest benefits of a well-designed workspace and consequently, the option of privacy in the office is an increase in engagement and productivity among workers.
                      </p>
                    </div>
                    <div class="more">
                      <a class="btn btn-info" href="job-list.html">Read more</a>
                    </div>
                  </div>
               </div>
             </div>
           </div>
         </section>
      <!-- Blog Post -->

       <!--testimonails -->
        <section class="bg-alt">
            <div class="container clearfix">
              <div class="col-md-3">
                <div class="testimonails">
                <?php echo $this->Html->image("avatar-3.jpg",["avatar-3"]); ?>
                  <!-- <img src="assets/img/avatar-3.jpg"> -->
                  <p><b>Customer #1</b></br>The problem could be your company’s dress code policy, or lack of one. If you still don’t have a policy, you’re not alone: Plenty of companies are content to work without a formal dress code.</p>
                </div>
              </div>

              <div class="col-md-3">
                <div class="testimonails">
                <?php echo $this->Html->image("avatar-3.jpg",["avatar-3"]); ?>
                  <!-- <img src="assets/img/avatar-3.jpg"> -->
                  <p><b>Customer #2</b></br>Office-appropriate fashion seems fairly obvious. So why do so many employees still make eyebrow-raising mistakes, especially during summer? </p>
                </div>
              </div>

              <div class="col-md-3">
                <div class="testimonails">
                  <?php echo $this->Html->image("avatar-3.jpg",["avatar-3"]); ?>
                  <!-- <img src="assets/img/avatar-3.jpg"> -->
                  <p><b>Customer #3</b></br>TAs researchers who have, for years, studied how employees thrive, we were surprised to discover that people who belong to them report levels of thriving that approach an average of 6 on a 7-point scale. </p>
                </div>
              </div>

              <div class="col-md-3">
                <div class="testimonails">
                <?php echo $this->Html->image("avatar-3.jpg",["avatar-3"]); ?>
                <!-- <img src="assets/img/avatar-3.jpg"> -->
                  <p><b>Customer #4</b></br>This is at least a point higher than the average for employees who do their jobs in regular offices, and something so unheard of that we had to look at the data again.</p>
                </div>
              </div>
            </div>
        </section>


      <!-- end testimonails -->




      <!-- Newsletter -->
      <section class="bg-img text-center" style="background-image: url(/jobportal/img/bg-facts.jpg)">
        <div class="container">
          <h2><strong>Subscribe</strong></h2>
          <h6 class="font-alt">Get weekly top new jobs delivered to your inbox</h6>
          <br><br>
          <form class="form-subscribe" action="#">
            <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Your eamil address">
              <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit">Subscribe</button>
              </span>
            </div>
          </form>
        </div>
      </section>
      <!-- END Newsletter -->


    </main>
    <!-- END Main container -->
