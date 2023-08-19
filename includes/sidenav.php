  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <!-- <a href="index.php" class="brand-link">
           <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8"> 
           <span class="brand-text font-weight-light" ><h5>AdminLTE</h5></span> 
      </a> -->

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image" >
                  <img src="../img/<?=$data['user_pic']?>" class="img-circle elevation-2" style="height: 50px; width: 47px;" >
              </div>
              <div class="info mt-2 ml-1">
                  <a href="index.php" class="d-block"><h5><?=$data['name']?></h5></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="index.php" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="index.php?user-infosection=true" class="nav-link">
                          <i class="nav-icon fa fa-user-circle"></i>
                          <p>User Info</p>
                      </a>
                  </li>
                         <li class="nav-item">
                              <a href="index.php?homesection=true" class="nav-link">
                                  <i class="fa fa-home nav-icon"></i>
                                  <p>Home </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="index.php?aboutsection=true" class="nav-link">
                                  <i class="fa fa-info-circle nav-icon"></i>
                                  <p>About Us</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="index.php?resumesection=true" class="nav-link">
                                  <i class="fa fa-file nav-icon"></i>
                                  <p>Resume </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="index.php?servicesection=true" class="nav-link">
                                  <i class="fa fa-cog nav-icon"></i>
                                  <p>Our Services</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="index.php?portfoliosection=true" class="nav-link">
                                  <i class="fa fa-tasks nav-icon"></i>
                                  <p>Portfolio </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="index.php?contactsection=true" class="nav-link">
                                  <i class="fa fa-headphones nav-icon"></i>
                                  <p>Contact Us</p>
                              </a>
                          </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>