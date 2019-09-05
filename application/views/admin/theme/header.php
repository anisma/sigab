
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGAB - Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontastic.css'); ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>"> -->
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>">
    <!-- Data Table CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/datatables.css'); ?>">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.default.css'); ?>" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdns.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="<?php echo base_url('admin'); ?>" class="navbar-brand">
                  <div class="brand-text brand-big"><strong>SIGAB</strong><span>Disdikbudpora</span></div>
                  <div class="brand-text brand-small"><strong>SIGAB</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><a href="<?php echo base_url('logout'); ?>" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo base_url('assets/img/user.png'); ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php echo ucfirst($user); ?></h1>
              <p>Admin</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
              <li><a href="<?php echo base_url('admin/'); ?>" aria-expanded="false"> <i class="icon-home"></i>Beranda</a></li>
              <li><a href="<?php echo base_url('user/'); ?>"> <i class="icon-user"></i>Pengguna</a></li>
              <li><a href="<?php echo base_url('kantor/'); ?>"> <i class="fa fa-building-o" aria-hidden="true"></i>Kantor</a></li>
              <li><a href="<?php echo base_url('gaji/'); ?>"> <i class="fa fa-credit-card"></i>Acuhan Gaji Pokok</a></li>
              <li><a href="<?php echo base_url('format_surat/'); ?>"> <i class="fa fa-file-text-o"></i>Format Surat</a></li>
          </ul>
        </nav>
