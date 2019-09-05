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
      <li class="breadcrumb-item active">Jadwal Pengajuan KGB</li>
    </ul>
  </div>
  <!-- Table Section-->
  <section class="tables">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">TMT KGB Bulan </h3>
              <div class="col-sm-2 select">
                <select id="jadwalbulan" name="bulan" class="form-control">
                  <?php $i = 1;
                  for($i=1;$i<=12;$i++){?>
                    <option id="emp" class="specialLink" value=<?php echo '"'.$i.'"';
                    if(date('m')==$i){
                      echo "selected";
                    }

                    ?>
                    >
                    <?php echo bulan($i);
                  }?></option>';
                </select>
              </div>
              <div class="col-sm-2 select">
                <select id="jadwaltahun" name="tahun" class="form-control">
                  <option class="specialLink" value="<?php echo date("Y")-1; ?>"><?php echo date("Y")-1; ?></option>;
                  <option selected class="specialLink" value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>;
                  <option class="specialLink" value="<?php echo date("Y")+1; ?>"><?php echo date("Y")+1; ?></option>;
                </select>
              </div>
            </div>
            <div class="card-body">
              <table id="tJadwal" class="table table-striped table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>TMT</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Kantor</th>
                    <th>Riwayat KGB</th>
                  </tr>
                </thead>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
