<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Ubah Data Pegawai</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('petugas/');?>">Beranda</a></li>
      <li class="breadcrumb-item active">Ubah Pegawai</li>
    </ul>
  </div>
  <!-- Forms Section-->
  <section class="forms">
    <div class="container-fluid">
      <div class="row">
        <!-- Basic Form-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Ubah Data Pegawai</h3>
            </div>
            <div class="card-body">
              <?php foreach ($duk as $duk )   ?>
              <form method="post" action="<?php echo base_url('proses_ubah_duk/').$duk->nip.'/'.$duk->id; ?>">
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?php if(isset($_POST['nama'])){
                      echo $_POST['nama'];
                    }else{
                      echo $duk->nama;
                    }?>" class="form-control <?php if (form_error('nama')) echo "is-invalid";?>" name="nama">
                    <?php echo form_error('nama'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Tempat Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?php if(isset($_POST['tempat_lahir'])){
                      echo $_POST['tempat_lahir'];
                    }else{
                      echo $duk->tempat_lahir;
                    }?>" class="form-control <?php if (form_error('tempat_lahir')) echo "is-invalid";?>" name="tempat_lahir">
                    <?php echo form_error('tempat_lahir'); ?>
                  </div>
                </div>
                <div  class="form-group row">
                  <label class="col-sm-3 form-control-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input id="tanggal_lahir" type="date" value="<?php if(isset($_POST['tanggal_lahir'])){
                      echo $_POST['tanggal_lahir'];
                    }else{
                      echo $duk->tanggal_lahir;
                    }?>" class="form-control <?php if (form_error('tanggal_lahir')) echo "is-invalid";?>" name="tanggal_lahir">
                    <?php echo form_error('tanggal_lahir'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Jabatan</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?php if(isset($_POST['jabatan'])){
                      echo $_POST['jabatan'];
                    }else{
                      echo $duk->jabatan;
                    }?>" class="form-control <?php if (form_error('jabatan')) echo "is-invalid";?>" name="jabatan">
                    <?php echo form_error('jabatan'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Kantor</label>
                  <div class="col-sm-9 select">
                    <select name="kantor" class="form-control <?php if (form_error('kantor')) echo "is-invalid";?>">
                      <?php foreach($kantor as $row) {?>
                          <option id="emp" class="specialLink" value="<?php if(isset($_POST['kantor'])){
                            echo $_POST['kantor'];
                          }else{
                            echo $row->id;
                          }?>"
                          <?php if(isset($_POST['kantor'])){
                            echo "selected";
                          }else{
                            if($row->id == $duk->id){
                              echo "selected";
                            }
                          } ?>>
                          <?php echo $row->nama_kantor;?></option>
                          <?php } ?>
                          <?php echo form_error('kantor'); ?>
                    </select>
                  </div>
                </div>
                <div>
                  <button type="submit" class="btn btn-primary pull-left">Simpan</button>
                </div>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
