<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet align-items-center"><i class="icon-user align-items-center"></i></div>
                    <div class="title"><span>Data<br>Umum<br>Kepegawaian</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $count_duk['a']; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Kenaikan<br>Gaji<br>Berkala</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $count_kgb; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>Jadwal<br>Pengajuan<br>KGB</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $count_jadwal['a']; ?></strong></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Dashboard Header Section    -->
          <section class="dashboard-header">
            <div class="container-fluid">
              <div class="row">
                <!-- Statistics -->
                <div class="statistics col-lg-3 col-12">
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-red"><i class="icon-user"></i></div>
                    <div class="text"><strong><?php echo $count_duk['d'].' '; ?></strong> <span>pegawai</span><br><small>Disdikbudpora</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="icon-user"></i></div>
                    <div class="text"><strong><?php echo $count_duk['u'].' '; ?></strong><span>pegawai</span><br><small>UPTD</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-orange"><i class="icon-user"></i></div>
                    <div class="text"><strong><?php echo $count_duk['s'].' '; ?></strong><span>pegawai</span><br><small>Sekolah</small></div>
                  </div>
                </div>
                <!-- Recent Updates-->
                <div class="col-lg-6">
                  <div class="recent-updates card">
                    <div class="card-close">
                    </div>
                    <div class="card-header">
                      <h3 class="h4">Pengajuan KGB Bulan <?php echo bulan(date('m')); ?></h3>
                    </div>
                    <div class="card-body no-padding">
                      <!-- Item-->
                      <div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                          <div class="icon"><i class="fa fa-file-text-o"></i></div>
                          <div class="title">
                            <h5>Pegawai Disdikbudpora</h5>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p> -->
                          </div>
                        </div>
                        <div class="date text-right"><strong><?php echo $count_jadwal['d']; ?></strong><span>Orang</span></div>
                      </div>
                      <!-- Item-->
                      <div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                          <div class="icon"><i class="fa fa-file-text-o"></i></div>
                          <div class="title">
                            <h5>Pegawai UPTD</h5>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p> -->
                          </div>
                        </div>
                        <div class="date text-right"><strong><?php echo $count_jadwal['u']; ?></strong><span>Orang</span></div>
                      </div>
                      <!-- Item        -->
                      <div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                          <div class="icon"><i class="fa fa-file-text-o"></i></div>
                          <div class="title">
                            <h5>Pegawai Sekolah</h5>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p> -->
                          </div>
                        </div>
                        <div class="date text-right"><strong><?php echo $count_jadwal['s']; ?></strong><span>Orang</span></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="chart col-lg-3 col-12"> -->
                  <!-- Numbers-->
                  <!-- <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                    <div class="text"><strong>99.9%</strong><br><small>Success Rate</small></div>
                  </div>
                </div>
              </div> -->
            </div>
          </section>
