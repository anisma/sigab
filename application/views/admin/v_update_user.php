<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Ubah Pengguna</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>">Beranda</a></li>
      <li class="breadcrumb-item active">Ubah Pengguna</li>
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
              <h3 class="h4">Ubah Pengguna</h3>
            </div>
            <div class="card-body">
              <?php foreach ($users as $u ) ?>
              <form method="post" action="<?php echo base_url('proses_ubah_pengguna/').$u->username; ?>">
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?php echo $u->username;?>" class="form-control" name="username" readonly>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?php if(isset($_POST['nama'])){
                      echo $_POST['nama'];
                    }else{
                      echo $u->nama;
                    }?>" class="form-control <?php if ((form_error('nama'))) {echo "is-invalid";}?>" name="nama" >
                    <?php echo form_error('nama'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?php if(isset($_POST['password'])){
                      echo $_POST['password'];
                    }else{
                      echo $u->password;
                    }?>" class="form-control <?php if ((form_error('password'))) {echo "is-invalid";}?>" name="password" >
                    <?php echo form_error('password'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Level</label>
                  <div class="col-sm-9 select">
                    <select name="level" class="form-control <?php if ((form_error('level'))) {echo "is-invalid";}?>">
                      <option id="emp" class="specialLink" value="1"
                      <?php if(isset($_POST['level'])){
                        if($_POST['level']==1){
                          echo "selected";
                        }
                      }else{
                        if($u->level == 1){
                          echo "selected";
                        }
                      }?>>
                      Admin</option>
                      <option id="emp" class="specialLink" value="2"
                      <?php if(isset($_POST['level'])){
                        if($_POST['level']==2){
                          echo "selected";
                        }
                      }else{
                        if($u->level == 2){
                          echo "selected";
                        }
                      } ?>>
                      Petugas</option>
                    </select>
                    <?php echo form_error('level'); ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
