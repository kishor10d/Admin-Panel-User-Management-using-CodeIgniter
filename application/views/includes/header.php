<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $pageTitle; ?></title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css') ?>">
    <!-- pace-progress -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css') ?>">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
      <!-- pace-progress -->
    <script src="<?php echo base_url('assets/plugins/pace-progress/pace.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>

  <!-- Select2 -->
  <script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>

    <!-- InputMask -->
  <script src="<?php echo base_url('assets/plugins/moment/moment.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') ?>"></script>

   <!-- date-range-picker -->
  <script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

    <!-- SweetAlert2 -->
    <script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>


    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";


    </script>

    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
  
  </head>
  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed pace-primary">
     <div class="wrapper">
     
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url(); ?>"class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-auto">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </nav>
    <!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link elevation-4">
	<!-- <a href="<?php echo base_url(); ?>assets/index3.html" class="brand-link"> -->
	  <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="BES-IT Logo" class="brand-image img-circle elevation-3"
	  style="opacity: .8">
	  <span class="brand-text font-weight-light">BES-IT</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
	  <!-- Sidebar user panel (optional) -->
	  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
	    <div class="image">
	      <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
	    </div>
	    <div class="info">
	      <a href="#" class="d-block"><?php echo $name; ?></a>
	      <a href="#" class="d-block"><?php echo $role_text; ?></a>
	      <a href="#" class="d-block"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></a>
	    </div>

	  </div>
	  <!-- Sidebar Menu -->
	  <nav class="mt-2">
	    <ul class="nav nav-pills nav-legacy nav-sidebar flex-column" data-widget="treeview" role="menu">
	    	 <li class="nav-item">
	    	  <a href="<?php echo base_url(); ?>dashboard" class="nav-link">
	    	    <i class="nav-icon fas fa-tachometer-alt"></i>
	    	    <p>Dashboard</p>
	    	  </a>
	    	</li>



  <?php if($user_permission): ?>


  <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-users"></i>
      <p>
       User
       <i class="right fas fa-angle-left"></i>
     </p>
   </a>
   <ul class="nav nav-treeview">
    <?php if(in_array('createUser', $user_permission)): ?>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>addNew" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add User</p>
      </a>
    </li> 
  <?php endif; ?>
  <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
  <li class="nav-item">
    <a href="<?php echo base_url(); ?>userListing" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Manage User</p>
  </a>
  </li> 
  <?php endif; ?>

  </ul>
  </li>
  <?php endif; ?>




  <li class="nav-header">Add Dynamic Roles -- New</li>



  <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-layer-group"></i>
      <p>
       Group
       <i class="right fas fa-angle-left"></i>
     </p>
   </a>
   <ul class="nav nav-treeview">
    <?php if(in_array('createGroup', $user_permission)): ?>
      <li class="nav-item">
            <a href="<?php echo base_url('addGroup') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add Group</p>
      </a>
    </li> 
  <?php endif; ?>
  <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
  <li class="nav-item">
    <a href="<?php echo base_url('groupListing') ?>" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Manage Group</p>
  </a>
  </li> 
  <?php endif; ?>

  </ul>
  </li>
  <?php endif; ?>





  <li class="nav-header">Profile Settings</li>

  <?php if(in_array('viewProfile', $user_permission) || in_array('updateSetting', $user_permission)): ?>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>profile" class="nav-link">
        <i class="nav-icon far fa-user-circle"></i>
        <p>Profile</p>
      </a>
    </li>
  <?php endif; ?>

  <?php endif; ?>
  <!-- user permission info -->


  	<li class="nav-item">
  	  <a href="<?php echo base_url(); ?>logout" class="nav-link">
  	    <i class="nav-icon fas fa-sign-out-alt"></i>
  	    <p>Logout</p>
  	  </a>
  	</li>




      </ul>
   </nav>
  <!-- /.sidebar-menu -->
  </div>
<!-- /.sidebar -->
</aside>



