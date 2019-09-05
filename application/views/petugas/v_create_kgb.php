<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Tambah Kenaikan Gaji Berkala</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('petugas/');?>">Beranda</a></li>
      <li class="breadcrumb-item active">Tambah KGB</li>
    </ul>
  </div>
  <!-- Forms Section-->
  <section class="forms">
    <div class="container-fluid">
      <div class="row">
        <!-- Basic Form-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">KGB</h3>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url('proses_tambah_kgb/').$nip);?>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Nomor Surat</label>
                  <div class="col-sm-3">
                    <input id="no_surat" type="text" value="<?php echo $no_surat?>" class="form-control <?php if (form_error('no_kgb')){echo "is-invalid";}?>" name="no_kgb">
                    <?php echo form_error('no_kgb'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Tanggal Surat</label>
                  <div class="col-sm-3">
                    <input id="tanggal" type="text" value="<?php if(isset($_POST['tanggal'])){
                      echo $_POST['tanggal'];
                    }else{
                      echo date("d/m/Y");
                    } ?>" class="form-control <?php if (form_error('tanggal')) {echo "is-invalid";}?> datepicker" name="tanggal">
                    <?php echo form_error('tanggal'); ?>
                  </div>
                </div>
            </div>
          </div>
        </div>


        <div class="col-lg-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Berdasarkan SKP</h3>
            </div>
            <div class="card-body">
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Nomor SKP</label>
                  <div class="col-sm-6 select">
                    <select id="no_sk" name="no_sk" class="form-control <?php if (form_error('no_sk')) echo "is-invalid";?>">
                      <option value="">--Pilih SKP--</option>
                      <?php foreach ($no_sk as $no_sk) {?>
                      <option id="emp" class="specialLink" value=<?php echo '"'.$no_sk->id.'"';
                        if(isset($_POST['no_sk'])){
                          if($_POST['no_sk'] == $no_sk->id){
                            echo 'selected';
                          }
                        }
                        ?>
                      >
                      <?php echo $no_sk->no_surat.' - tanggal '.date_indo($no_sk->tanggal); ?>
                    </option>
                  <?php } ?>
                      <option id="emp" class="specialLink" value="lainnya" <?php if (isset($_POST['no_sk'])){
                        if($_POST['no_sk'] == "lainnya"){
                          echo 'selected';
                        }
                      } ?>
                      >Lainnya</option>
                    </select>
                    <?php echo form_error('no_sk'); ?>
                  </div>
                </div>
                <div id="nomor_sk">
                  <div class="form-group row has-danger">
                    <label class="col-sm-3 form-control-label">Sebutkan Nomor SKP</label>
                    <div class="col-sm-6">
                      <input id="nomor_sk1" type="text" value="<?php if(isset($_POST['nomor_sk'])){
                        echo $_POST['nomor_sk'];
                      }
                      ?>"class="form-control <?php if (form_error('nomor_sk')) echo "is-invalid";?>"name="nomor_sk">
                      <?php echo form_error('nomor_sk'); ?>
                    </div>
                  </div>
                </div>
                <div id="file">
                  <div  class="form-group row has-danger">
                    <label class="col-sm-3 form-control-label">File SKP</label>
                    <div class="col-sm-6">
                      <input type="file" class="form-control <?php if (form_error('file_sk')) echo "is-invalid";?>" name="file_sk">
                      <small class="help-block-none">*format file: .jpg/.jpeg/.png/.pdf (max 2mb)</small>
                      <?php echo form_error('file_sk'); ?>
                      <?php if($this->session->flashdata('upload_error')){
                        echo $this->session->flashdata('upload_error');
                      }?>

                    </div>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">SKP dikeluarkan oleh</label>
                  <div class="col-sm-6">
                    <input id="sk" type="text" value="<?php if(isset($_POST['sk'])){
                      echo $_POST['sk'];
                    }
                    ?>"class="form-control <?php if (form_error('sk')) echo "is-invalid";?>" name="sk">
                    <?php echo form_error('sk'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Tanggal SKP</label>
                  <div class="col-sm-3">
                    <input id="tanggal_sk" type="text" value="<?php if(isset($_POST['tanggal_sk'])){
                      echo $_POST['tanggal_sk'];
                    }
                    ?>"class="form-control <?php if (form_error('tanggal_sk')) echo "is-invalid";?> datepicker" data-date-format="dd/mm/yyyy" name="tanggal_sk">
                    <?php echo form_error('tanggal_sk'); ?>
                  </div>
                </div>

                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">TMT</label>
                  <div class="col-sm-3">
                    <input id="tmt" type="text" value="<?php if(isset($_POST['tmt'])){
                      echo $_POST['tmt'];
                    }
                    ?>"class="form-control <?php if (form_error('tmt')) echo "is-invalid";?> datepicker" data-date-format="dd/mm/yyyy" name="tmt">
                    <?php echo form_error('tmt'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Masa Kerja</label>
                  <div class="col-lg-1">
                    <select id="tahun" name="tahun" class="form-control <?php if (form_error('tahun')) echo "is-invalid";?>">
                      <option value=""></option>
                      <?php $i = 0;
                      for($i=0;$i<=33;$i++){?>
                        <option id="emp" class="specialLink" value=<?php echo '"'.$i.'"';
                        if(isset($_POST['tahun'])){
                          if($_POST['tahun']==$i){
                            echo "selected";
                          }
                        }
                        ?>
                        >
                        <?php echo $i;
                      }?></option>';
                    </select>
                    <?php echo form_error('tahun'); ?>
                  </div>
                  <span>thn</span>
                  <div class="col-sm-1">
                    <select id="bulan" name="bulan" class="form-control <?php if (form_error('bulan')) echo "is-invalid";?>">
                      <option value=""></option>
                      <?php $i = 0;
                      for($i=0;$i<=11;$i++){?>
                        <option id="emp" class="specialLink" value=<?php echo '"'.$i.'"';
                        if(isset($_POST['bulan'])){
                          if($_POST['bulan']==$i){
                            echo "selected";
                          }
                        }
                        ?>
                        >
                        <?php echo $i;
                      }?></option>';
                    </select>
                    <?php echo form_error('bulan'); ?>
                  </div>
                  <span>bln</span>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Gaji Pokok Lama</label>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <span class="input-group-addon">Rp</span>
                      <input id="gaji_lama" type="number" value="<?php if(isset($_POST['gaji_lama'])){
                        echo $_POST['gaji_lama'];
                      }
                      ?>" class="form-control <?php if (form_error('gaji_lama')) echo "is-invalid";?>" name="gaji_lama">
                      <span class="input-group-addon">,-</span>
                    </div>
                    <?php echo form_error('gaji_lama'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Terbilang</label>
                  <div class="col-sm-6">
                    <input id="t_gaji_lama" type="text" value="<?php if(isset($_POST['t_gaji_lama'])){
                      echo $_POST['t_gaji_lama'];
                    }
                    ?>" class="form-control <?php if (form_error('t_gaji_lama')) echo "is-invalid";?>" name="t_gaji_lama">
                    <?php echo form_error('t_gaji_lama'); ?>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Diberikan gaji berkala hingga memperoleh</h3>
            </div>
            <div class="card-body">
              <div class="form-group row has-danger">
                <label class="col-sm-3 form-control-label">Berdasarkan Masa Kerja</label>
                <div class="col-sm-1">
                  <select id="tahun_baru" name="tahun_baru" class="form-control <?php if (form_error('tahun_baru')) echo "is-invalid";?>">
                    <option value=""></option>
                    <?php $i = 0;
                    for($i=0;$i<=33;$i++){?>
                      <option id="emp" class="specialLink" value=<?php echo '"'.$i.'"';
                      if(isset($_POST['tahun_baru'])){
                        if($_POST['tahun_baru']==$i){
                          echo "selected";
                        }
                      }?>
                      >
                      <?php echo $i;
                    }?></option>';
                  </select>
                  <?php echo form_error('tahun_baru'); ?>
                </div>
                <span>thn</span>
                <div class="col-sm-1">
                  <select id="bulan_baru" name="bulan_baru" class="form-control <?php if (form_error('bulan_baru')) echo "is-invalid";?>">
                    <option value=""></option>
                    <?php $i = 0;
                    for($i=0;$i<=11;$i++){?>
                      <option id="emp" class="specialLink" value=<?php echo '"'.$i.'"';
                      if(isset($_POST['bulan_baru'])){
                        if($_POST['bulan_baru']==$i){
                          echo "selected";
                        }
                      }?>
                      >
                      <?php echo $i;
                    }?></option>';
                  </select>
                  <?php echo form_error('bulan_baru'); ?>
                </div>
                <span>bln</span>
              </div>
              <div  class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Golongan</label>
                  <div class="col-sm-3 select">
                    <select id="gol" name="golongan" class="form-control <?php if (form_error('golongan')) echo "is-invalid";?>">
                      <option value="">--Pilih Golongan--</option>
                      <?php foreach($golongan as $row) {?>
                        <option id="emp" class="specialLink" value=<?php echo '"'.$row->id.'"';
                        if(isset($_POST['golongan'])){
                          if($_POST['golongan']==$row->id){
                            echo "selected";
                          }
                        }
                        ?>
                        >
                        <?php echo $row->golongan;
                      }?>
                    </select>
                    <?php echo form_error('golongan'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">TMT</label>
                  <div class="col-sm-6">
                    <input id="tmt_baru" type="text" value="<?php if(isset($_POST['tmt_baru'])){
                      echo $_POST['tmt_baru'];
                    }
                    ?>"class="form-control <?php if (form_error('tmt_baru')) echo "is-invalid";?> datepicker" data-date-format="dd/mm/yyyy" name="tmt_baru">
                    <?php echo form_error('tmt_baru'); ?>
                  </div>
                </div>
                <div class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">TMT yang akan datang</label>
                  <div class="col-sm-6">
                    <input id="tmt_mendatang" type="text" value="<?php if(isset($_POST['tmt_mendatang'])){
                      echo $_POST['tmt_mendatang'];
                    }
                    ?>"class="form-control <?php if (form_error('tmt_mendatang')) echo "is-invalid";?> datepicker" data-date-format="dd/mm/yyyy" name="tmt_mendatang">
                    <?php echo form_error('tmt_mendatang'); ?>
                  </div>
                </div>
                <div  class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Gaji Pokok Baru</label>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <span class="input-group-addon">Rp</span>
                      <input id="gaji_baru" type="number" value="<?php if(isset($_POST['gaji_baru'])){
                        echo $_POST['gaji_baru'];
                      }
                      ?>"class="form-control <?php if (form_error('gaji_baru')) echo "is-invalid";?>" name="gaji_baru" >
                      <span class="input-group-addon">,-</span>
                    </div>
                    <?php echo form_error('gaji_baru'); ?>
                  </div>
                </div>
                <div  class="form-group row has-danger">
                  <label class="col-sm-3 form-control-label">Terbilang</label>
                  <div class="col-sm-6">
                    <input id="t_gaji_baru" type="text" value="<?php if(isset($_POST['t_gaji_baru'])){
                      echo $_POST['t_gaji_baru'];
                    }
                    ?>"class="form-control <?php if (form_error('t_gaji_baru')) echo "is-invalid";?>" name="t_gaji_baru">
                    <?php echo form_error('t_gaji_baru'); ?>
                  </div>
                </div>
                <a data-target="#myModal" data-toggle="modal" class="btn btn-primary pull-left" id="MainNavHelp" href="#myModal">Tambah</a>

                <!-- ############# Confirmation modal #################### -->
                <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                  <div role="document" class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h4 id="exampleModalLabel" class="modal-title">Tambah</h4>
                       <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                     </div>
                     <div class="modal-body">
                       <p>Pastikan data yang dimasukkan sudah <b>benar</b>.<br />
                         Anda yakin akan menambahkan data tersebut?</p>
                     </div>
                       <div class="modal-footer">
                         <button type="button" data-dismiss="modal" class="btn btn-secondary">Tidak</button>
                         <button type="submit" name="tambah" class="btn btn-primary">Ya</button>
                       </div>
                     </div>
                   </div>
                 </div>

                <div class="clearfix"></div>
                <?php echo form_close();?>
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
