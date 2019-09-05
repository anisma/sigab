<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Kenaikan Gaji Berkala</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <!-- <?php foreach ($duk as $d ) ?> -->
  <!-- <?php foreach ($kgb as $k ) ?> -->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('petugas/');?>">Beranda</a></li>
      <?php foreach ($duk as $duk )
      foreach ($kgb as $kgb )
      foreach ($surat as $surat )?>
      <li class="breadcrumb-item"><a href="<?php echo base_url('kgb/').$duk->unit;?>">KGB</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('kgb/riwayat/').$duk->nip?>"><?php echo $duk->nip;?></a></li>
      <li class="breadcrumb-item active"><?php echo $kgb->no_surat?></li>
    </ul>
  </div>
  <div style="display: inline">
</div>
  <!-- Forms Section-->
  <section class="page">
    <div class="container-fluid">
      <div class="row">
        <!--Documen Header-->
        <div class="col-sm-11">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-3"><img src="<?php echo base_url('assets/img/disdikbudpora.jpg'); ?>" alt="Responsive image" class="img-fluid rounded" ></div>
                <div class="col-sm-8">
                  <h3 class="h3 text-center">PEMERINTAH KABUPATEN SEMARANG</h3>
                  <h1 class="h1 text-center">DINAS PENDIDIKAN, KEBUDAYAAN,</h3>
                  <h1 class="h1 text-center">KEPEMUDAAN DAN OLAHRAGA</h3>
                  <p class="p-1 text-center">Jl. Gatot Subroto No. 20B Komplek Perkantoran Sewakul<br />6921134 - 6922535 Fax. (024) 6921134 Ungaran 50501</p>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="container-fluid">
                <div class="d-flex justify-content-end">
                    <span>Ungaran, <?php echo date_indo(date_format(new DateTime($kgb->tanggal),'Y-m-j'))?></span>
                </div>
                <div class="row">
                  <div class="col-sm-8">
                    <div class="row">
                      <span class="col-sm-3">Nomor</span><span class="col-sm-1">:</span><span><?php echo $kgb->no_surat;?></span>
                    </div>
                    <div class="row">
                      <span class="col-sm-3">Lampiran</span><span class="col-sm-1">:</span>--
                    </div>
                    <div class="row">
                      <span class="col-sm-3">Perihal</span><span class="col-sm-1">:</span>Kenaikan Gaji Berkala
                    </div>
                  </div>
                  <div class="col-sm-4 text-center">
                        <p>Kepada <br />Yth Kepala Badan Keuangan Daerah Kabupaten Semarang <br />di UNGARAN.</p>
                  </div>
                </div>
                <div class="row col-sm-12">
                  <p>
                    Dengan ini diberitahukan bahwa berhubung telah dipenuhinya masa kerja dan syarat-syarat kepada :
                  </p>
                </div>
                <div class="row col-sm-12">
                  <ol class="col-sm-12" type="1">
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Nama</span>:
                        <span class="col-sm-5"><?php echo $duk->nama ?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">NIP</span>:
                        <span class="col-sm-5"><?php $str=$duk->nip;
                        echo substr($str, 0, 8) . " " . substr($str,8, 6)." ".substr($str,14,1)." ".substr($str,15);
                         ?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">tempat, Tanggal lahir</span>:
                        <span class="col-sm-5"><?php echo $duk->tempat_lahir.', '.date_indo(date_format(new DateTime($duk->tanggal_lahir),'Y-m-j')) ?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Pangkat/Golongan</span>:
                        <span class="col-sm-5"><?php echo $kgb->pangkat.', '.$kgb->golongan ?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Jabatan</span>:
                        <span class="col-sm-5"><?php echo $duk->jabatan ?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Kantor</span>:
                        <span class="col-sm-5"><?php echo $duk->nama_kantor ?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Gaji pokok lama</span>:
                        <span class="col-sm-5"><?php echo 'Rp. '. number_format($kgb->gaji_lama,0,".",".").',-'.' ('.$kgb->terbilang_gaji_lama.')'?></span>
                      </div>
                    </li>
                  </ol>
                </div>
                <div class="row col-sm-12">
                  <h5 class="h-5">Berdasarkan:</h6>
                </div>
                <div class="row col-sm-12">
                  <ol class="col-sm-12" type="a">
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Surat Keputusan</span>:
                        <span class="col-sm-5"><?php echo $kgb->skp?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Tanggal/ Nomor</span>:
                        <span class="col-sm-5"><?php echo date_indo(date_format(new DateTime($kgb->tgl_skp),'Y-m-j')).', '.$kgb->no_skp?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Tanggal mulai berlakunya gaji tersebut</span>:
                        <span class="col-sm-5"><?php echo date_indo(date_format(new DateTime($kgb->tmt_lama),'Y-m-j'))?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Masa Kerja</span>:
                        <span class="col-sm-5"><?php echo $kgb->tahun_mk_skp.' tahun '. $kgb->bulan_mk_skp.' bulan'?></span>
                      </div>
                    </li>
                  </ol>
                </div>
                <div class="row">
                  <h5 class="h-5">Diberikan gaji berkala hingga memperoleh:</h6>
                </div>
                  <ol class="col-sm-12" type="1">
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Gaji pokok baru</span>:
                        <span class="col-sm-5"><?php echo 'Rp. '. number_format($kgb->gaji_baru,0,".",".").',- ('.$kgb->terbilang_gaji_baru.')'?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Berdasarkan Masa Kerja</span>:
                        <span class="col-sm-5"><?php echo ($kgb->tahun_mk).' tahun '. $kgb->bulan_mk.' bulan'?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Dalam golongan</span>:
                        <span class="col-sm-5"><?php echo $kgb->golongan?></span>
                    </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">Tanggal mulai</span>:
                        <span class="col-sm-5"><?php echo date_indo(date_format(new DateTime($kgb->tmt_baru),'Y-m-j'))?></span>
                      </div>
                    </li>
                    <li>
                      <div class="row col-sm-12">
                        <span class="col-sm-6">TMT yang akan datang</span>:
                        <span class="col-sm-5"><?php echo date_indo(date_format(new DateTime($kgb->tmt_mendatang),'Y-m-j'))?></span>
                      </div>
                    </li>
                  </ol>
                </div>
                <div class="row col-sm-12">
                  <p>
                    Diharapkan agar sesuai dengan <?php echo $surat->uu_gaji; ?> kepada pegawai tersebut dapat dibayar
                    penghasilannya berdasarkan gaji pokok baru.
                  </p>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                  <span>TEMBUSAN: Kepada Yth.</span>
                    <ol type="1">
                      <li>Menteri Dalam Negeri;</li>
                      <li>Gubernur Jawa Tengah;</li>
                      <li>Kepala Biro TUK BKN Jakarta;</li>
                      <li>Kepala Kan Reg I BKN Yogyakarta;</li>
                      <li>Inspektur Inspektorat Kabupaten Semarang;</li>
                      <li>Kepala Kantor PT TASPEN (Persero) Cab Uama Semarang;</li>
                      <li>Kepala BKD Kabupaten Semarang;</li>
                      <li>Kepala Dinas Kearsipan dan Perpustakaan Kabupaten Semarang;</li>
                      <li>PNS a.n <?php echo $duk->nama;?>;</li>
                      <li>Arsip.</li>
                    </ol>

                  </div>
                  <div class="col sm-1">
                  </div>
                  <div class=" col-sm-5">
                    <div class=" text-center d-flex align-items-center">
                      <p><br  />Kepala Dinas Pendidikan, Kebudayaan,<br /> Kepemudaan dan Olahraga <br />Kabupaten Semarang
                        <br /><br /><br /><br /><br />
                        <?php echo $surat->nama."<br />"?>
                        <?php echo $surat->pangkat."<br />"?>
                        <?php $str=$surat->nip;
                        echo "NIP. ".substr($str, 0, 8) . " " . substr($str,8, 6)." ".substr($str,14,1)." ".substr($str,15);?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
