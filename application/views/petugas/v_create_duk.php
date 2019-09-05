<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Tambah Data Pegawai</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('petugas/');?>">Beranda</a></li>
      <li class="breadcrumb-item active">Tambah Pegawai</li>
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
              <h3 class="h4">Tambah Pengguna</h3>
            </div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url('proses_tambah_duk/').$unit; ?>">
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">NIP</label>
                  <div class="col-sm-6">
                    <input type="text" placeholder="NIP" size="18" value="<?php if(isset($_POST['nip'])){ echo $_POST['nip']; }?>"class="form-control <?php if (form_error('nip')) echo "is-invalid";?>" name="nip">
                    <?php echo form_error('nip'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Nama</label>
                  <div class="col-sm-6">
                    <input type="text" placeholder="Nama" value="<?php if(isset($_POST['nama'])){ echo $_POST['nama']; }?>" class="form-control <?php if (form_error('nama')) echo "is-invalid";?>" name="nama">
                    <?php echo form_error('nama'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Tempat Lahir</label>
                  <div class="col-sm-6">
                    <input type="text" placeholder="Tempat Lahir" value="<?php if(isset($_POST['tempat_lahir'])){ echo $_POST['tempat_lahir']; }?>" class="form-control <?php if (form_error('tempat_lahir')) echo "is-invalid";?>" name="tempat_lahir">
                    <?php echo form_error('tempat_lahir'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Tanggal Lahir</label>
                  <div class="col-sm-6">
                    <input id="tanggal_lahir" type="text" value="<?php if(isset($_POST['tanggal_lahir'])){ echo $_POST['tanggal_lahir']; }?>" class="form-control <?php if (form_error('tanggal_lahir')) echo "is-invalid";?> datepicker" name="tanggal_lahir">
                    <?php echo form_error('tanggal_lahir'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Jabatan</label>
                  <div class="col-sm-6">
                    <input type="text" placeholder="Jabatan" value="<?php if(isset($_POST['jabatan'])){ echo $_POST['jabatan']; }?>" class="form-control <?php if (form_error('jabatan')) echo "is-invalid";?> " name="jabatan">
                    <?php echo form_error('jabatan'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Kantor</label>
                  <div class="col-sm-6 select">
                    <select name="kantor" class="form-control <?php if (form_error('kantor')) echo "is-invalid";?>">
                      <option value="">--Pilih Kantor--</option>
                      <?php foreach($kantor as $row) {?>
                        <option id="emp" class="specialLink" value=<?php echo '"'.$row->id.'"';
                        if(isset($_POST['kantor'])){
                          if($_POST['kantor']==$row->id){
                            echo "selected";
                          }
                        }?>
                        >
                        <?php echo $row->nama_kantor; }?></option>

                    </select>
                    <?php echo form_error('kantor'); ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-left">Tambah</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
