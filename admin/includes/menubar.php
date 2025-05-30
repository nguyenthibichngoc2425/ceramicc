<style>
  /* Tổng thể sidebar */
  .main-sidebar {
    background-color: #f8f9fa;
    border-right: 1px solid #dee2e6;
    min-height: 100vh;
    padding-top: 60px;
  }

  .sidebar {
    padding: 30px 15px;
  }

  /* Panel người dùng */
  .user-panel {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding: 10px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
  }

  .user-panel .image img {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    object-fit: cover;
    border: 1px solid #ccc;
  }

  .user-panel .info {
    margin-left: 12px;
  }

  .user-panel .info p {
    margin: 0;
    font-weight: 600;
    font-size: 14px;
    color:rgb(85, 89, 93);
  }

  .user-panel .info a {
    font-size: 12px;
    color: #28a745;
  }

  /* Menu */
  .sidebar-menu {
    padding: 0;
    margin: 0;
    list-style: none;
  }

  .sidebar-menu .header {
    font-size: 11px;
    text-transform: uppercase;
    color: #6c757d;
    padding: 10px 0 5px 10px;
  }

  .sidebar-menu li {
    margin-bottom: 4px;
  }

  .sidebar-menu li a {
    display: flex;
    align-items: center;
    font-size: 14px;
    font-weight: 500;
    color: #495057;
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
  }

  .sidebar-menu li a i {
    margin-right: 10px;
    width: 20px;
    text-align: center;
    color: #6c757d;
  }

  .sidebar-menu li.active > a {
    background-color: transparent;
    color:rgb(58, 61, 63);
    font-weight: 600;
  }

  /* Treeview */
  .treeview-menu {
    padding-left: 25px;
    display: none;
  }

  .treeview:hover .treeview-menu {
    display: block;
  }

  .treeview-menu li a {
    font-size: 13px;
    padding: 6px 12px;
    color: #495057;
    border-radius: 5px;
    display: block;
  }

  .treeview-menu li a:hover {
    text-decoration: underline;
    background-color: transparent;
  }
</style>



<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
      <li class="header">MANAGE</li>
      <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="products.php"><i class="fa fa-circle-o"></i> Product List</a></li>
          <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>