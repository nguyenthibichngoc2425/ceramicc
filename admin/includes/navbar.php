<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>C</b>CS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Ceram</b>CupShop</span>
  </a>

  <!-- Navbar -->
  <nav class="navbar navbar-static-top" style="box-shadow: 0 2px 5px rgba(0,0,0,0.1); background: #fff;">
    <!-- Sidebar toggle button -->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <!-- User Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="display: flex; align-items: center;">
            <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image" style="border-radius: 50%; border: 2px solid #ddd;">
            <span class="hidden-xs" style="margin-left: 8px; font-weight: 600; color: #333;"><?php echo $admin['firstname'].' '.$admin['lastname']; ?></span>
          </a>
          <ul class="dropdown-menu" style="width: 250px;">
            <!-- User image -->
            <li class="user-header" style="background-color: #f4f4f4;">
              <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image" style="border: 3px solid #fff;">
              <p style="margin-top: 10px; color: #333; font-weight: 600;">
                <?php echo $admin['firstname'].' '.$admin['lastname']; ?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-sm btn-primary btn-flat" id="admin_profile">
                  <i class="fa fa-user-circle"></i> Update
                </a>
              </div>
              <div class="pull-right">
                <a href="../logout.php" class="btn btn-sm btn-danger btn-flat">
                  <i class="fa fa-sign-out"></i> Sign out
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>
