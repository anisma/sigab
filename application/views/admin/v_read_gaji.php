<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Acuhan Gaji Pokok</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>">Beranda</a></li>
      <li class="breadcrumb-item active">Acuhan Gaji Pokok</li>
    </ul>
  </div>
  <div style="margin-top:20px"></div>
  <section class="tables">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
              <div class="dropdown">
                  <button type="button" id="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                  <div aria-labelledby="menu" class="dropdown-menu dropdown-menu-right has-shadow">
                    <a  data-target="#mModal" data-toggle="modal" href="#mModal" class="dropdown-item MainNavText"> <i class="fa fa-plus"></i>Import Data</a>
                    <a data-target="#myModal" data-toggle="modal" href="#myModal" class="dropdown-item MainNavText"> <i class="fa fa-times"></i>Kosongkan Data</a>
                  </div>
                </div>
            </div>
            <!--MODAL IMPORT DATA  -->
            <div id="mModal" tabindex="-1" role="dialog" aria-labelledby="eModalLabel" aria-hidden="true" class="modal fade text-left">
              <div role="document" class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h4 id="eModalLabel" class="modal-title">Import Data</h4>
                   <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                 </div>
                 <div class="modal-body">
                   <?php echo form_open_multipart(base_url('import_gaji'));?>
                     <div class="form-group row has-danger">
                     <label class="col-sm-2 form-control-label">File</label>
                     <div class="col-sm-9">
                       <input type="file" class="form-control <?php if (form_error('filename')) echo "is-invalid";?>" name="filename">
                       <?php echo form_error('filename'); ?>
                       <small class="form-text">*format file .xlsx</small>
                     </div>
                   </div>
                 </div>
                   <div class="modal-footer">
                     <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                     <button type="submit" name="upload_file" class="btn btn-primary pull-left">Upload</button>
                   </div>
                   <div class="clearfix"></div>
                   <?php echo form_close();?>
                 </div>
               </div>
             </div>
             <!--......................................................................... -->

             <!--MODAL KOSONGKAN DATA  -->
             <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
               <div role="document" class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Hapus Semua</h4>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                  </div>
                  <div class="modal-body">
                    <p>Anda yakin akan menghapus semua data?</p>
                  </div>
                    <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-secondary">Tidak</button>
                      <a href="<?php echo base_url('hapus_semua_gaji');?>" class="btn btn-primary">Ya</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--......................................................................... -->

              <!-- MODAL NOTIFIKASI -->
              <?php if($this->session->flashdata('sukses')){?>
                <div id="modalSukses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-center">
                  <div role="document" class="modal-dialog">
                   <div class="modal-content" style="background-color:#d4edda">
                     <div class="modal-body">
                       <p style="margin-bottom:0px"><?php echo $this->session->flashdata('sukses');?></p>
                     </div>
                     </div>
                   </div>
                 </div>
              <?php
            }elseif($this->session->flashdata('gagal')){?>
                <div id="modalGagal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-center">
                  <div role="document" class="modal-dialog">
                   <div class="modal-content" style="background-color:#f8d7da">
                     <div class="modal-body"
                       <p><?php echo $this->session->flashdata('gagal');?></p>
                     </div>
                     </div>
                   </div>
                 </div>
            <?php } ?>
              <!--......................................................................... -->
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Acuhan Gaji Pokok</h3>
            </div>
            <div class="card-body">

              <table id="table" class="table table-striped table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Golongan</th>
                    <th>Masa Kerja</th>
                    <th>Gaji Pokok</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($gaji as $gaji) {
                  ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $gaji->golongan ?></td>
                      <td><?php echo $gaji->masa_kerja ?></td>
                      <td><?php echo 'Rp. '.number_format($gaji->gaji_pokok,0,".",".").',-';?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
