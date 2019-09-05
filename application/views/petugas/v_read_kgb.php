<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Kenaikan Gaji Berkala</h2>
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
      <li class="breadcrumb-item active">KGB / <?php echo $k->unit ?></li>
    </ul>
  </div>
  <section class="tables">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
            </div>
            <div class="card-header d-flex align-items-center">

              <h3 class="h4"><?php echo $k->unit;
                  }
                } ?>
              </h3>
            </div>
            <div class="card-body">
              <table id="table"class="table table-striped table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Kantor</th>
                    <th>Riwayat KGB</th>
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
                      <td><?php echo $d->nama_kantor ?></td>
                      <td>
                         <?php echo anchor(base_url('kgb/riwayat/').$d->nip,'Lihat'); ?>
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
