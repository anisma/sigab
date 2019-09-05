<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Format Surat</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>">Beranda</a></li>
      <li class="breadcrumb-item active">Format Surat</li>
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
              <h3 class="h4">Format Surat</h3>
            </div>
            <div class="card-body">
              <?php foreach ($surat as $surat)?>
              <form method="post" action="<?php echo base_url('ubah_format_surat/'); ?>">
                <div class="form-group row has-danger">
                  <label class="col-sm-4 form-control-label">Nama Kepala Dinas</label>
                  <div>:</div>
                  <div class="col-sm-6">
                    <p><?php echo $surat->nama; ?></p>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-4 form-control-label">Pangkat Kepala Dinas</label>
                  <div>:</div>
                  <div class="col-sm-6 select">
                    <p><?php echo $surat->pangkat; ?></p>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-4 form-control-label">NIP Kepala Dinas</label>
                  <div>:</div>
                  <div class="col-sm-6">
                    <p><?php echo $surat->nip; ?></p>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-4 form-control-label">UU Acuhan Gaji</label>
                  <div>:</div>
                  <div class="col-sm-7">
                    <p><?php echo $surat->uu_gaji;?></p>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-left">Ubah</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- MODAL NOTIFIKASI -->
  <?php if($this->session->flashdata('sukses')):?>
    <div id="modalSukses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-center">
      <div role="document" class="modal-dialog">
        <div class="modal-content" style="background-color:#d4edda">
          <div class="modal-body">
            <p style="margin-bottom:0px"><?php echo $this->session->flashdata('sukses');?></p>
          </div>
        </div>
      </div>
    </div>
  <?php endif; if($this->session->flashdata('gagal')):?>
    <div id="modalGagal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-center">
      <div role="document" class="modal-dialog">
        <div class="modal-content" style="background-color:#f8d7da">
          <div class="modal-body"
          <p><?php echo $this->session->flashdata('gagal');?></p>
          </div>
        </div>
      </div>
    </div>
  <?php endif;?>
