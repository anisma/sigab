<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Pengguna</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>">Beranda</a></li>
      <li class="breadcrumb-item active">Pengguna</li>
    </ul>
  </div>
  <section class="tables">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
              <div class="">
                  <a href="<?php echo base_url('tambah_pengguna');?>" id="closeCard1" class="dropdown-item edit"> <i  class="fa fa-plus" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Pengguna</h3>
            </div>
            <div class="card-body">
              <table id="table" class="table table-striped table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($users as $u) {
                  ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $u->username; ?></td>
                      <td><?php echo $u->nama; ?></td>
                      <td>
                        <?php
                          if ($u->level==1) {
                            echo 'Admin';
                          }elseif($u->level==2) {
                            echo 'Petugas';
                          }  ?></td>
                      <td>
                        <a href="<?php echo base_url().'ubah_pengguna/'.$u->username;?>">Ubah</a> |
                         <a data-target="<?php echo'#myModal'.$u->username;?>" data-toggle="modal" class="MainNavText" id="MainNavHelp1" href="<?php echo'#myModal'.$u->username ?>">Hapus</a>
                         <div id="<?php echo'myModal'.$u->username; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" class="modal fade text-left">
                           <div role="document" class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 id="exampleModalLabel1" class="modal-title">Hapus</h4>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                <p>Anda yakin akan menghapus data <?php echo $u->username; ?> ?</p>
                              </div>
                                <div class="modal-footer">
                                  <button type="button" data-dismiss="modal" class="btn btn-secondary">Tidak</button>
                                  <a href="<?php echo base_url('hapus_pengguna/').$u->username; ?>" class="btn btn-primary">Ya</a>
                                </div>
                              </div>
                            </div>
                          </div>
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
