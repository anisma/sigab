        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Tambah Kantor</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>">Beranda</a></li>
              <li class="breadcrumb-item active">Tambah Kantor</li>
            </ul>
          </div>
          <!-- Forms Section-->
          <section class="forms">
            <div class="container-fluid">
              <div class="row">
                <!-- Basic Form-->
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Tambah Kantor</h3>
                    </div>
                    <div class="card-body">
                      <?php echo form_open_multipart(base_url('proses_tambah_kantor'));?>
                        <div class="form-group row has-danger">
                          <label class="col-sm-3 form-control-label ">Nama kantor</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="kantor" value="<?php if (isset($_POST['kantor'])){
                              echo $_POST['kantor'];
                            } ?>"class="form-control <?php if ((form_error('kantor'))) {echo "is-invalid";}?>" name="kantor">
                            <?php echo form_error('kantor'); ?>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Unit</label>
                          <div class="col-sm-9 select">
                            <select name="unit" class="form-control <?php if (form_error('unit')) echo "is-invalid";?>">
                              <option value="">--Pilih Unit--</option>
                              <option id="emp" class="specialLink" value=1 <?php if(isset($_POST['unit'])){
                                if($_POST['unit']==1){
                                  echo "selected";
                                }
                              } ?>>Disdikbudpora</option>
                              <option id="emp" class="specialLink" value=2 <?php if(isset($_POST['unit'])){
                                if($_POST['unit']==2){
                                  echo "selected";
                                }
                              } ?>>UPTD</option>
                              <option id="emp" class="specialLink" value=3 <?php if(isset($_POST['unit'])){
                                if($_POST['unit']==3){
                                  echo "selected";
                                }
                              } ?>>Sekolah</option>
                            </select>
                            <?php echo form_error('unit'); ?>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-left">Tambah</button>
                        <div class="clearfix"></div>
                        <?php echo form_close();?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
