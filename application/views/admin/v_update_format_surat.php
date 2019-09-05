<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Ubah Format Surat</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>">Beranda</a></li>
      <li class="breadcrumb-item active">Ubah Format Surat</li>
    </ul>
  </div>
  <!-- Forms Section-->
  <section class="forms">
    <div class="container-fluid">
      <div class="row">
        <!-- Basic Form-->
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Ubah Format Surat</h3>
            </div>
            <div class="card-body">
              <?php foreach ($surat as $surat)?>
              <form method="post" action="<?php echo base_url('proses_ubah_format_surat/'); ?>">
                <div class="form-group row has-danger">
                  <label class="col-sm-4 form-control-label">Nama Kepala Dinas</label>
                  <div class="col-sm-8">
                    <input type="text" value="<?php if(isset($_POST['nama_kadin'])){
                      echo $_POST['nama_kadin'];
                    } else{
                      echo $surat->nama;
                    } ?>"class="form-control <?php if (form_error('nama_kadin')) {echo "is-invalid";}?>" name="nama_kadin">
                    <?php echo form_error('nama_kadin'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-4 form-control-label">Pangkat Kepala Dinas</label>
                  <div class="col-sm-8 select">
                    <select name="pangkat_kadin" class="form-control <?php if (form_error('pangkat_kadin')) {echo "is-invalid";}?>">
                      <option id="emp" class="specialLink" value="Pembina Tingkat I" <?php if (isset($_POST['pangkat_kadin'])){
                          if(($_POST['pangkat_kadin']=="Pembina Tingkat I")){
                            echo "selected";
                          }
                        }else{
                          if($surat->pangkat == "Pembina Tingkat I"){
                            echo "selected";
                          }
                        }?>
                        >Pembina Tingkat I</option>
                      <option id="emp" class="specialLink" value="Pembina Utama Muda" <?php if (isset($_POST['pangkat_kadin'])){
                        if(($_POST['pangkat_kadin']=="Pembina Utama Muda")){
                          echo "selected";
                        }
                      }else{
                        if($surat->pangkat == "Pembina Utama Muda"){
                          echo "selected";
                        }
                      }?>
                        >Pembina Utama Muda</option>
                    </select>
                    <?php echo form_error('pangkat_kadin'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-4 form-control-label">NIP Kepala Dinas</label>
                  <div class="col-sm-8">
                    <input type="text" value="<?php echo $surat->nip ?>" class="form-control <?php if (form_error('nip_kadin')) echo "is-invalid";?>" name="nip_kadin">
                    <?php echo form_error('nip_kadin'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-4 form-control-label">UU Acuhan Gaji</label>
                  <div class="col-sm-8">
                    <input type="text" value="<?php echo $surat->uu_gaji ?>" class="form-control <?php if (form_error('uu')) echo "is-invalid";?>" name="uu">
                    <?php echo form_error('uu'); ?>
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
