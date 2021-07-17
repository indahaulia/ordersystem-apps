<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Welcome!</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo site_url()?>/assets/dist/img/avatar-4.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['user_logged']->username ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- List Menu Bar-->
          <li class="nav-item menu-open">
            <a class="nav-link <?php if($active=='Dashboard') { echo 'active';} ?>" href="<?php echo site_url('Dashboard') ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($active=='Menu') { echo 'active';} ?>" href="<?php echo site_url('Dashboard/formshowdata') ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Menu Makanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Cashier_c/') ?>" class="nav-link <?php if($active=='Cashier') { echo 'active';} ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Cashier
              </p>
            </a>
          <li class="nav-item">
            <a href="<?php echo site_url('Kitchen_c/') ?>" class="nav-link <?php if($active=='Kitchen') { echo 'active';} ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Kitchen
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="<?php echo site_url() ?>/login/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log out
              </p>
            </a>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>