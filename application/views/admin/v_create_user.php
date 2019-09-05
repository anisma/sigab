<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Tambah Pengguna</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>">Beranda</a></li>
      <li class="breadcrumb-item active">Tambah Pengguna</li>
    </ul>
  </div>
  <!-- Forms Section-->
  <section class="forms">
    <div class="container-fluid">
      <div class="row">
        <!-- Basic Form-->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Tambah Pengguna</h3>
            </div>
            <div class="card-body">
              <?php echo form_open_multipart(base_url('proses_tambah_pengguna'));?>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label ">Username</label>
                  <div class="col-sm-9">
                    <input type="text" placeholder="Username" value="<?php if (isset($_POST['uname'])){
                      echo $_POST['uname'];
                    } ?>"class="form-control <?php if ((form_error('uname'))) {echo "is-invalid";}?>" name="uname">
                    <?php echo form_error('uname'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label ">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" placeholder="Nama" value="<?php if (isset($_POST['nama'])){
                      echo $_POST['nama'];
                    } ?>"class="form-control <?php if ((form_error('nama'))) {echo "is-invalid";}?>" name="nama">
                    <?php echo form_error('nama'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="text" placeholder="Password" value="<?php if(isset($_POST['pass'])){
                      echo $_POST['pass'];
                    } ?>"class="form-control <?php if (form_error('pass')) echo "is-invalid";?>" name="pass">
                    <?php echo form_error('pass'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Level</label>
                  <div class="col-sm-9 select">
                    <select name="level" class="form-control <?php if (form_error('level')) echo "is-invalid";?>">
                      <option value="">--Pilih Level--</option>
                      <option id="emp" class="specialLink" value=1 <?php if(isset($_POST['level'])){
                        if($_POST['level']==1){
                          echo "selected";
                        }
                      } ?>>Admin</option>
                      <option id="emp" class="specialLink" value=2 <?php if(isset($_POST['level'])){
                        if($_POST['level']==2){
                          echo "selected";
                        }
                      } ?>>Petugas</option>
                    </select>
                    <?php echo form_error('level'); ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-left">Tambah</button>
                <div class="clearfix"></div>
                <?php echo form_close();?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
