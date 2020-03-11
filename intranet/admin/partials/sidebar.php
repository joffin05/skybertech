  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">



          <li
           class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Admin</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="change-password.php" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Security Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard.php">INTERNAL ADMIN</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard.php">INTERNAL</a>
          </div>
          <ul class="sidebar-menu">

              <li><a class="nav-link" href="dashboard.php"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-image"></i> <span>Banner </span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-banner.php">Create</a></li>
                  <li><a class="nav-link" href="manage-banner.php">Manage</a></li>
                </ul>
              </li>


              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i> <span>Circulars & Policies</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-memo.php">Create</a></li>
                  <li><a class="nav-link" href="manage-memo.php">Manage</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-laptop-code"></i> <span>Softwares</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-software.php">Create</a></li>
                  <li><a class="nav-link" href="manage-software.php">Manage</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i> <span>News</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-news.php">Create</a></li>
                  <li><a class="nav-link" href="manage-news.php">Manage</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-code-branch"></i><span>Branches</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-branch.php">Create</a></li>
                  <li><a class="nav-link" href="manage-branches.php">Manage</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-business-time"></i><span>Contact Person</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-contactperson.php">Create</a></li>
                  <li><a class="nav-link" href="manage-contactperson.php">Manage</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-video"></i> <span>Media</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-category.php">Create Media Category</a></li>
                  <li><a class="nav-link" href="manage-category.php">Manage Media Category</a></li>
                  <li><a class="nav-link" href="create-photogallery.php">Create Photo Gallery</a></li>
                  <li><a class="nav-link" href="manage-photogallery.php">Manage Photo Gallery</a></li>
                  <li><a class="nav-link" href="create-videogallery.php">Create Video Gallery</a></li>
                  <li><a class="nav-link" href="manage-videogallery.php">Manage Video Gallery</a></li>
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Clients</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-client.php">Create</a></li>
                  <li><a class="nav-link" href="manage-clients.php">Manage</a></li>
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-university"></i><span>Sister Concerns</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-business.php">Create</a></li>
                  <li><a class="nav-link" href="manage-business.php">Manage</a></li>
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bookmark"></i><span>Products</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-product.php">Create</a></li>
                  <li><a class="nav-link" href="manage-products.php">Manage</a></li>
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-server"></i><span>Services</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="creative-service.php">Create</a></li>
                  <li><a class="nav-link" href="manage-services.php">Manage</a></li>
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-check"></i><span>Key Persons</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-keycategory.php">Create Category</a></li>
                  <li><a class="nav-link" href="manage-keycategory.php">Manage Category</a></li>
                  <li><a class="nav-link" href="create-keyperson.php">Create Key Person</a></li>
                  <li><a class="nav-link" href="manage-keyperson.php">Manage Key Person</a></li>
                </ul>
              </li>
              
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-download"></i><span>Downloads</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="create-form.php">Create Form</a></li>
                  <li><a class="nav-link" href="manage-forms.php">Manage Forms</a></li>
                  <li><a class="nav-link" href="create-manual.php">Create Manual</a></li>
                  <li><a class="nav-link" href="manage-manual.php">Manage Manual</a></li>
                </ul>
              </li>
              
    
              
              
              

               <li class="menu-header">General</li>
            
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>General Settings</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="general-settings.php">Website Settings</a></li>
                  <li><a class="nav-link" href="manage-logo.php">Website Logo</a></li>
                  <li><a class="nav-link" href="footer-logo.php">Footer Logo</a></li>
                  <li><a class="nav-link" href="manage-about.php">About General</a></li>
                  <li><a class="nav-link" href="about-page.php">About Page</a></li>
                  
                   <li><a class="nav-link" href="manage-holiday.php">Holiday Calendar</a></li>
                </ul>
              </li>




              <br><br>
             
             
            </ul>

          
        </aside>
      </div>

      <!-- Main Content -->




    </div>
  </div>