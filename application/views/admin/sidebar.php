  <?php $user = $this->session->userdata['kandora_user']; ?>
  <div class="topbar">
      <!-- LOGO -->
      <div class="topbar-left">
          <a href="index.html" class="logo">
            <span>
               <img src="<?=base_url()?>assets/images/logo.png" alt="" height="80">
            </span>
            <i>
              <img src="<?=base_url()?>assets/images/logo.png" alt="" height="30">
            </i>
          </a>
      </div>

      <nav class="navbar-custom">
          <ul class="list-unstyled topbar-right-menu float-right mb-0">
              <li class="dropdown notification-list">
                  <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                     aria-haspopup="false" aria-expanded="false">
                      <img src="<?=base_url()?>assets/images/logo.png" alt="user" class="rounded-circle"> <span class="ml-1"><?=$user['user']?><i class="mdi mdi-chevron-down"></i> </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                      <!-- item-->
                      <a href="#" class="dropdown-item notify-item">
                          <i class="fi-lock"></i> <span>Lock Screen</span>
                      </a>

                      <!-- item-->
                      <a href="<?=site_url('login/logout')?>" class="dropdown-item notify-item">
                          <i class="fi-power"></i> <span>Logout</span>
                      </a>

                  </div>
              </li>
          </ul>

          <ul class="list-inline menu-left mb-0">
              <li class="float-left">
                  <button class="button-menu-mobile open-left waves-light waves-effect">
                      <i class="dripicons-menu"></i>
                  </button>
              </li>
          </ul>

      </nav>

  </div>
  <!-- Top Bar End -->


  <!-- ========== Left Sidebar Start ========== -->
  <div class="left side-menu">
      <div class="slimscroll-menu" id="remove-scroll">

          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu" id="side-menu">
                  <li class="menu-title">Navigation</li>

                  <li>
                      <a href="#"><i class="fa fa-user-o"></i> <span> Staff </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level" aria-expanded="false">
                          <li><a href="<?=site_url('staffs')?>">Manage staffs</a></li>

                      </ul>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-user-plus"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level" aria-expanded="false">
                          <li><a href="<?=site_url('customers')?>">Manage customers</a></li>

                      </ul>
                  </li>
                  <li>
                      <a href="<?=site_url('products')?>">
                          <i class="fa fa-product-hunt"></i><span> Products </span>
                      </a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-external-link"></i> <span> Orders </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level" aria-expanded="false">
                          <li><a href="<?=site_url('orders')?>">Orders</a></li>
                          <li><a href="<?=site_url('orders/completed')?>">Completed orders</a></li>
                      </ul>
                  </li>

                  <!--<li>
                      <a href="#"><i class="fa fa-user"></i> <span> Student information </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level" aria-expanded="false">
                          <li><a href="<?=site_url('Students')?>">Student details</a></li>
                          <li><a href="<?=site_url('students/add')?>">Student admission</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="<?=site_url('admin/slider')?>">
                          <i class="fa fa-envelope"></i><span> Communicate </span>
                      </a>
                  </li>-->

              </ul>

          </div>
          <!-- Sidebar -->
          <div class="clearfix"></div>

      </div>
      <!-- Sidebar -left -->

  </div>
  <!-- Left Sidebar End -->
