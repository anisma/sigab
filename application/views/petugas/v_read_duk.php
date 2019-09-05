<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Data Umum Kepegawaian</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('petugas/');?>">Beranda</a></li>
      <?php
        foreach ($kantor as $k)
        {
          if ($k->id == $unit) {
      ?>
      <li class="breadcrumb-item active">DUK / <?php echo $k->unit ?></li>
    </ul>
  </div>
  <section class="tables">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
              <div class="">
                  <a href="<?php echo base_url('tambah_duk/').$unit; ?>" id="closeCard1" class="dropdown-item edit"> <i  class="fa fa-plus" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">

              <h3 class="h4"><?php echo $k->unit;
                  }
                } ?>
              </h3>
            </div>
            <div class="card-body">
              <table id="table" class="table table-striped table-hover display" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jabatan</th>
                    <th>Kantor</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($duk as $d) {
                  ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d->nip ?></td>
                      <td><?php echo $d->nama ?></td>
                      <td><?php echo $d->tempat_lahir ?></td>
                      <td><?php echo date_indo($d->tanggal_lahir) ?></td>
                      <td><?php echo $d->jabatan ?></td>
                      <td><?php echo $d->nama_kantor ?></td>
                      <td>
                         <?php echo anchor(base_url('ubah_duk/').$d->nip.'/'.$d->unit,'Edit'); ?> |
                         <a data-target="#myModal" data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#myModal">Hapus</a>
                         <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                           <div role="document" class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 id="exampleModalLabel" class="modal-title">Hapus</h4>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                <p>Jika menghapus data pegawai, data riwayat KGB pegawai terkait akan terhapus juga. Apakah anda yakin akan menghapus data <?php echo $d->nip ?> ? </p>
                              </div>
                                <div class="modal-footer">
                                  <button type="button" data-dismiss="modal" class="btn btn-secondary">Tidak</button>
                                  <a href="<?php echo base_url('hapus_duk/').$d->nip.'/'.$d->unit ?>" class="btn btn-primary">Ya</a>
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
