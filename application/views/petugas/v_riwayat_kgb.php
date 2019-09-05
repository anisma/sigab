<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Riwayat Kenaikan Gaji Berkala</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('petugas/');?>">Beranda</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('kgb/').$unit;?>">KGB</a></li>
      <li class="breadcrumb-item active"><?php echo $nip ?></li>
    </ul>
  </div>
  <section class="tables">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card">
            <div class="card-close">
              <div class="">
                  <a href="<?php echo base_url('tambah_kgb/').$nip; ?>" id="closeCard1" class="dropdown-item edit"> <i  class="fa fa-plus" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4"><?php echo $nama; ?></h3>
            </div>
            <div class="card-body">
              <table id="table" class="table table-striped table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>TMT</th>
                    <th>SK Pendukung</th>
                    <th>SK KGB</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($kgb as $d) {
                  ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo anchor(base_url('preview_kgb/').$d->nip.'/'.$d->id, $d->no_surat); ?></td>
                      <td><?php echo date_indo($d->tanggal) ?></td>
                      <td><?php echo date_indo($d->tmt_baru) ?></td>
                      <td><?php
                        if($d->file_skp!='no_file'){
                          echo '<a href="'.base_url("upload/skp/").$d->file_skp.'" target="blank">'.$d->no_skp.'</a>';
                        }else{
                          echo anchor(base_url('preview_kgb/').$d->nip.'/'.$cek_kgb['id'], $d->no_skp);
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if($d->file_sk_kgb=='no_file'){
                          echo'<a  data-target="#uModal'.$d->id.'" data-toggle="modal" href="#uModal'.$d->id.'">Upload SK</a>';
                        }else{
                        echo '<a href="'.base_url("upload/sk_kgb/").$d->file_sk_kgb.'" target="blank">'.$d->no_sk_kgb.'</a>';
                        } ?>

                        <!--MODAL IMPORT DATA  -->
                        <div id="<?php echo 'uModal'.$d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="eModalLabel" aria-hidden="true" class="modal fade text-left">
                          <div role="document" class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h4 id="eModalLabel" class="modal-title">Import Data</h4>
                               <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                             </div>
                             <div class="modal-body">
                               <?php echo form_open_multipart(base_url('upload_sk_kgb').'/'.$d->id.'/'.$d->nip);?>
                               <div class="form-group row has-danger">
                                 <label class="col-sm-2 form-control-label">No SK</label>
                                 <div class="col-sm-9">
                                   <input type="text" value="<?php if(isset($_POST['no_sk_kgb'])){
                                     echo $_POST['no_sk_kgb'];
                                   }
                                   ?>"class="form-control <?php if (form_error('no_sk_kgb')) echo "is-invalid";?>" name="no_sk_kgb">
                                   <?php echo form_error('no_sk_kgb'); ?>
                                 </div>
                               </div>
                               <div class="form-group row has-danger">
                                 <label class="col-sm-2 form-control-label">File</label>
                                 <div class="col-sm-9">
                                   <input type="file" value="<?php if(isset($_POST['file_sk_kgb'])){
                                     echo $_POST['file_sk_kgb'];
                                   }
                                   ?>"class="form-control <?php if (form_error('file_sk_kgb')) echo "is-invalid";?>" name="file_sk_kgb">
                                   <small class="help-block-none">*format file: .jpg/.jpeg/.png/.pdf (max 2mb)</small>
                                   <?php echo form_error('file_sk_kgb'); ?>
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
                      </td>
                      <td>
                        <?php if($d->file_sk_kgb=='no_file'){
                          echo '<p class="text-danger"><b>ON PROCESS</b></p>';
                        }else{
                          echo '<p class="text-success"><b>SUCCESS</b></p>';
                        } ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url("print/").$nip.'/'.$d->id?>"><b>Print</b></a>

                      </td>
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

<?php echo $modal; ?>
