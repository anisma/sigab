
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGAB - Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?> assets/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <div class="navbar-header">
                        <div class="brand-text brand-big" style="font-size:2.8em;"><span>SIGAB </span> <strong>Disdikbudpora</strong></div>
                    </div>
                  </div>
                  <div class="pull-left"style="top: -10px">
                    <p>Sistem Informasi Kenaikan Gaji Berkala Disdikbudpora Kabupaten Semarang</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <div class="navbar-header">
                      <div class="brand-text brand-big" style="font-size: 2.5em;color: #796AEE;"><span>LOGIN</span></div>
                  </div>
                    <?php if($this->session->flashdata('login')):?>
                      <div class="" role="alert" style="top: -10px;color: #dc3545;font-size: 0.80em; top: auto;bottom: -40px;"><?php echo $this->session->flashdata('login'); ?></div>
                    <?php endif; ?>
                    <form id="login-form" method="post" action="<?php echo base_url('login'); ?>" role="login">
                      <div class="form-group">
                      </div>
                      <div class="form-group">
                        <input id="login-username" type="text" name="username"  value="<?php if(isset($_POST['username'])){ echo $_POST['username']; }?>" class="input-material">
                        <label  for="login-username" class="label-material <?php if(isset($_POST['username'])){if($_POST['username']!='') {echo "active"; }}?>">User Name</label>
                        <label for="login-username" class="input-material error"><?php echo form_error('username')?></label>
                      </div>
                      <div class="form-group">
                        <input id="login-password" type="password" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; }?>"  class="input-material">
                        <label  for="login-password" ata-error="wrong" data-success="right" class="label-material <?php if(isset($_POST['password'])){if($_POST['password']!='') {echo "active"; }}?>">Password</label>
                        <label for="login-password" class="input-material error"><?php echo form_error('password')?></label>
                      </div>
                      <button id="login" type="submit" name="submit" value="login" class="btn btn-primary btn-login">Login</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <!-- <p>Design by <a href="#" class="external">Bootstrapious</a></p> -->
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
  </body>
</html>
