$(document).ready(function() {
  //########### CREATE DUK #################

  //konfigurasi tanggal lahir
  $('#tanggal_lahir').datepicker({
    dateFormat:"dd/mm/yy",
    yearRange: "c-60:c+60",
    maxDate:"-20y",
    minDate:"-60y",
    changeMonth: true,
    changeYear: true
  });

  //########### CREATE KBG #################

  // field readonly
  if($('#no_surat').val()==''){
    $('#no_surat').prop('readonly', false);
  }else{
    $('#no_surat').prop('readonly', true);

  }
  $('#tanggal').prop('readonly', true);
  $('#t_gaji_baru').prop('readonly', true);
  $('#t_gaji_lama').prop('readonly', true);

  // field hide
  if($('#no_sk').val()!='lainnya'){
    $('#file').hide();
    $('#nomor_sk').hide();
  }else{
    $('#file').show();
    $('#nomor_sk').show();
  }

  //konfigurasi datepicker tanggal surat

  //konfigurasi datepicker tanggal SKP
  $('#tanggal_sk').datepicker({
    dateFormat:"dd/mm/yy",
    yearRange: "c-2:c+2",
    maxDate:"-2y +6m",
    minDate:"-4y -6m",
    changeMonth: true,
    changeYear: true
  });

  //konfigurasi datepicker tmt pada SKP
  $('#tmt').datepicker({
    dateFormat:"dd/mm/yy",
    yearRange: "c-2:c+2",
    maxDate:"-2y +6m",
    minDate:"-4y -6m",
    changeMonth: true,
    changeYear: true
  });

  //konfigurasi datepicker tmt Mendatang pada SKP
  $('#tmt_baru').datepicker({
    dateFormat:"dd/mm/yy",
    minDate:"-4y -6m",
    maxDate:"+6",
    minDate:"-6",
    changeMonth: true,
    changeYear: true
  });

  //konfigurasi datepicker tmt Mendatang pada KGB
  $('#tmt_mendatang').datepicker({
    dateFormat:"dd/mm/yy",
    maxDate:"+2y +6m",
    minDate:"-6m",
    changeMonth: true,
    changeYear: true
  });

  //autofill datepicker tmt Mendatang berdasarkan tmt
  $('#tmt').change(function(e){
    var tmt = $('#tmt').datepicker('getDate');
    tmt.setYear(tmt.getFullYear()+2);
    $('#tmt_baru').datepicker('setDate',tmt);
    tmt.setYear(tmt.getFullYear()+2);
    $('#tmt_mendatang').datepicker('setDate',tmt);
  });

  //autofill datepicker tmt Mendatang berdasarkan tmt_baru
  $('#tmt_baru').change(function(e){
    var tmt = $('#tmt_baru').datepicker('getDate');
    tmt.setYear(tmt.getFullYear()+2);
    $('#tmt_mendatang').datepicker('setDate',tmt);
  });

  //Terbilang gaji lama
  $('#gaji_lama').keyup(function(e){
    var terbilang = spellRupiah($(this).val());
    $('#t_gaji_lama').val(terbilang);
  });

  $('#gaji_lama').focus(function(e){
    var terbilang = spellRupiah($(this).val());
    $('#t_gaji_lama').val(terbilang);
  });

//Terbilang gaji baru
  $('#gaji_baru').keyup(function(e){
    var terbilang = spellRupiah($(this).val());
    $('#t_gaji_baru').val(terbilang);
  });

  $('#gaji_baru').change(function(e){
    var terbilang = spellRupiah($(this).val());
    $('#t_gaji_baru').val(terbilang);
  });

  //---------masa kerja baru----------
  //tahun
  $('#tahun').change(function(e){
    var tahun = parseInt($(this).val())+2;
    $('#tahun_baru').val(tahun);
  });

  //bulan
  $('#bulan').change(function(e){
    var tahun = $(this).val();
    $('#bulan_baru').val(tahun);
  });

  //berdasarkan no_sk
  $('#no_sk').change(function(e){
    //Jika no_sk kosong atau lainnya maka semua field nilainya kosong
    if ($('#no_sk').val() == '' ){
      $('#file').hide();
      $('#nomor_sk').hide();
      $('#nomor_sk1').val('');
      $('#sk').val('');
      $('#tanggal_sk').val('');
      $('#tahun').val('');
      $('#bulan').val('');
      $('#tmt').val('');
      $('#gaji_lama').val('');
      $('#gaji_baru').val('');
      $('#tahun_baru').val('');
      $('#bulan_baru').val('');
      $('#gol').val('');
      $('#tmt_baru').val('');
      $('#tmt_mendatang').val('');
      $('#t_gaji_baru').val('');
      $('#t_gaji_lama').val('');

      //disable form
      $('#tanggal_sk').prop( "readonly", true );
      $('#tmt').prop( "readonly", true );
      $('#tmt_baru').prop( "readonly", true );
      $('#tmt_mendatang').prop( "readonly", true );
      $('#nomor_sk1').prop( "readonly", true );
      $('#sk').prop( "readonly", true );
      $('#tahun').prop( "readonly", true );
      $('#bulan').prop( "readonly", true );
      $('#gaji_lama').prop( "readonly", true );
      $('#t_gaji_lama').prop( "readonly", true );
      $('#tahun_baru').prop( "readonly", true );
      $('#bulan_baru').prop( "readonly", true );
      $('#gol').prop( "readonly", true );
      $('#gaji_baru').prop( "readonly", true );
      $('#t_gaji_baru').prop( "readonly", true );
    }else
    //Jika no_sk bernilai 'lainnya' maka semua field nilainya kosong
      if ($('#no_sk').val() == 'lainnya'){
        //field file dan nomor sk dimunculkan
        $('#file').show();
        $('#nomor_sk').show();

        //value
        $('#nomor_sk1').val('');
        $('#sk').val('');
        $('#tanggal_sk').val('');
        $('#tahun').val('');
        $('#bulan').val('');
        $('#tmt').val('');
        $('#gaji_lama').val('');
        $('#gaji_baru').val('');
        $('#tahun_baru').val('');
        $('#bulan_baru').val('');
        $('#gol').val('');
        $('#tmt_baru').val('');
        $('#tmt_mendatang').val('');
        $('#t_gaji_baru').val('');
        $('#t_gaji_lama').val('');

        //enable form
        $('#tanggal_sk').prop( "readonly", false );
        $('#tmt').prop( "readonly", false );
        $('#tmt_baru').prop( "readonly", false );
        $('#tmt_mendatang').prop( "readonly", false );
        $('#nomor_sk1').prop( "readonly", false );
        $('#sk').prop( "readonly", false );
        $('#tahun').prop( "readonly", false );
        $('#bulan').prop( "readonly", false );
        $('#gaji_lama').prop( "readonly", false );
        $('#t_gaji_lama').prop( "readonly", false );
        $('#tahun_baru').prop( "readonly", false );
        $('#bulan_baru').prop( "readonly", false );
        $('#gol').prop( "readonly", false );
        $('#gaji_baru').prop( "readonly", false );
        $('#t_gaji_baru').prop( "readonly", false );
      }else{
        //Jika no_sk bernilai nomor sk maka semua field otomatis akan diisi

        //field file dan nomor sk dihide
        $('#file').hide();
        $('#nomor_sk').hide();

        //value
        var no = $(this).val();
         e.preventDefault();
          $.ajax({
            url: "http://localhost/sigab/petugas/c_crud_kgb/getKGBdata/"+no,
            type: "POST",
            data: {'no':no},
            contentType: "application/json; charset=utf-8",
            dataType: "JSON",
            success: function(data) {
              if (data[0] === undefined){
                return;
              }else{
                var tgl = new Date(data[0].tanggal);
                var day_month = ("0" + tgl.getDate()).slice(-2)+ '/' + ("0" + (tgl.getMonth() + 1)).slice(-2);
                var year = tgl.getFullYear();
                $('#tanggal_sk').val(day_month + '/' + (year));

                tgl = new Date(data[0].tmt_baru);
                day_month = ("0" + tgl.getDate()).slice(-2)+ '/' + ("0" + (tgl.getMonth() + 1)).slice(-2);
                year = tgl.getFullYear();
                $('#tmt').val(day_month + '/' + (year));
                $('#tmt_baru').val(day_month + '/' + (year+2));
                $('#tmt_mendatang').val(day_month + '/' + (year+4));
                $('#nomor_sk1').val(data[0].no_surat);
                $('#sk').val('Kepala Dinas Pendidikan, Kebudayaan, Kepemudaan, dan Olahraga Kabupaten Semarang');
                // $('#sk').val(data[0].skp);
                $('#tahun').val(data[0].tahun_mk);
                $('#bulan').val(data[0].bulan_mk);
                $('#gaji_lama').val(data[0].gaji_baru);
                $('#t_gaji_lama').val(data[0].terbilang_gaji_baru);
                $('#tahun_baru').val(parseInt(data[0].tahun_mk)+2);
                $('#bulan_baru').val(data[0].bulan_mk);
                $('#gol').val(data[0].golongan);
                $('#gaji_baru').val(data[1].gaji_pokok);
                var terbilang = spellRupiah(data[1].gaji_pokok);
                $('#t_gaji_baru').val(terbilang);

                //disable form
                $('#tanggal_sk').prop( "readonly", true );
                $('#tmt').prop( "readonly", true );
                $('#tmt_baru').prop( "readonly", true );
                $('#tmt_mendatang').prop( "readonly", true );
                $('#nomor_sk1').prop( "readonly", true );
                $('#sk').prop( "readonly", true );
                $('#tahun').prop( "readonly", true );
                $('#bulan').prop( "readonly", true );
                $('#gaji_lama').prop( "readonly", true );
                $('#t_gaji_lama').prop( "readonly", true );
                $('#tahun_baru').prop( "readonly", true );
                $('#bulan_baru').prop( "readonly", true );
                $('#gol').prop( "readonly", true );
                $('#gaji_baru').prop( "readonly", true );
                $('#t_gaji_baru').prop( "readonly", true );

              }
            },
            error: function(data) {
              alert(data.messages);
           }
          });
      }
  });

  //---------golongan---------------
  $('#gol').change(function(e){
    if(!($('#gol').val() == '') &&  !($('#tahun_baru').val() == '') ){
      var gol = $('#gol').val();
      var mk = $('#tahun_baru').val();
      //
      e.preventDefault();
       $.ajax({
         url: "http://localhost/sigab/petugas/c_crud_kgb/get_golongan/"+gol+"/"+mk,
         type: "POST",
         // data: {'no':no},
         contentType: "application/json; charset=utf-8",
         dataType: "JSON",
         success: function(data) {
           if (data[0] !== undefined){
             $('#gaji_baru').val(data[0].gaji_pokok);
             var terbilang = spellRupiah(data[0].gaji_pokok);
             $('#t_gaji_baru').val(terbilang);
           }else{
             $('#gaji_baru').val("");
             $('#t_gaji_baru').val("");
             alert('Cek tahun masa kerja! apakah sesuai dengan golongan?')
           }
         },
         error: function(data) {
           alert(data.messages);
           // alert('Cek tahun masa kerja! apakah sesuai dengan golongan?')
        }
       });
    }

  });

  $('#tahun_baru').change(function(e){
    if(!($('#gol').val() == '') &&  !($('#tahun_baru').val() == '') ){
      var gol = $('#gol').val();
      var mk = $('#tahun_baru').val();
      //
      e.preventDefault();
       $.ajax({
         url: "http://localhost/sigab/petugas/c_crud_kgb/get_golongan/"+gol+"/"+mk,
         type: "POST",
         contentType: "application/json; charset=utf-8",
         dataType: "JSON",
         success: function(data) {
           if (data[0] !== undefined){
             $('#gaji_baru').val(data[0].gaji_pokok);
             var terbilang = spellRupiah(data[0].gaji_pokok);
             $('#t_gaji_baru').val(terbilang);
           }else{
             $('#gaji_baru').val("");
             $('#t_gaji_baru').val("");
             alert('Cek tahun masa kerja! apakah sesuai dengan golongan?')
           }
         },
         error: function(data) {
           alert('Cek tahun masa kerja! apakah sesuai dengan golongan?')
        }
       });
    }
  });
});

$(document).ready(function() {
    $('#table').DataTable({
      "autoWidth": false,
      "scrollX": true,
      "scrollY": false
   });

  } );


// Show the failed modal
$(window).on('load',function(){
  $('#modalGagal').modal('show');
});

// Show the success modal
$(window).on('load',function(){
  $('#modalSukses').modal('show');
});

$(document).ready(function() {
  var bulan = new Date().getMonth()+1;
  var tahun = new Date().getFullYear();
  show_kgb_by_month(bulan,tahun);
  
  $('#jadwalbulan').change(function(e){
    bulan = $(this).val();
    tahun = $('#jadwaltahun').val();
    $('#tJadwal').dataTable().fnClearTable();
    $('#tJadwal').dataTable().fnDestroy();
    show_kgb_by_month(bulan,tahun);
  });

  $('#jadwaltahun').change(function(e){
    tahun = $(this).val();
    bulan = $('#jadwalbulan').val();
    $('#tJadwal').dataTable().fnClearTable();
    $('#tJadwal').dataTable().fnDestroy();
    show_kgb_by_month(bulan,tahun);
  });
});

//Fungsi menampilkan jadwal pengajuan kgb
function show_kgb_by_month(bulan, tahun){
  var t = $('#tJadwal').DataTable( {
      "ajax": {
                "url": "http://localhost/sigab/petugas/c_crud_kgb/getKGBByMonth/"+bulan+"/"+tahun,
                "dataSrc": ""
              },
        "columns" : [
            { "data" : "id" },
            { "data" : "tmt_mendatang"},
            { "data" : "nip" },
            { "data" : "nama" },
            { "data" : "nama_kantor" },
            { "data" : "nip",
              "render": function(data, type, row, meta){
                         data = '<a href="http://localhost/sigab/kgb/riwayat/' + data + '">Lihat</a>';
                        return data;
                        }
            }
        ],
        "order": [[ 1, 'asc' ]]
    });



    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
}

//Spell rupiah
function spellRupiah(bilangan) {
  bilangan = bilangan.replace(/,/g,"");
  var kalimat="";
  var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
  var kata    = new Array('','satu ','dua ','tiga ','empat ','lima ','enam ','tujuh ','delapan ','sembilan ');
  var tingkat = new Array('','ribu ','juta ','milyar ','triliun ');
  var panjang_bilangan = bilangan.length;

  /* pengujian panjang bilangan */
  if(panjang_bilangan > 15){
      kalimat = "Diluar Batas";
  }else{
      /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
      for(i = 1; i <= panjang_bilangan; i++) {
          angka[i] = bilangan.substr(-(i),1);
      }

      var i = 1;
      var j = 0;

      /* mulai proses iterasi terhadap array angka */
      while(i <= panjang_bilangan){
          subkalimat = "";
          kata1 = "";
          kata2 = "";
          kata3 = "";

          /* untuk Ratusan */
          if(angka[i+2] != "0"){
              if(angka[i+2] == "1"){
                  kata1 = "seratus ";
              }else{
                  kata1 = kata[angka[i+2]] + "ratus ";
              }
          }

          /* untuk Puluhan atau Belasan */
          if(angka[i+1] != "0"){
              if(angka[i+1] == "1"){
                  if(angka[i] == "0"){
                      kata2 = "sepuluh ";
                  }else if(angka[i] == "1"){
                      kata2 = "sebelas ";
                  }else{
                      kata2 = kata[angka[i]] + "belas ";
                  }
              }else{
                  kata2 = kata[angka[i+1]] + "puluh ";
              }
          }

          /* untuk Satuan */
          if (angka[i] != "0"){
              if (angka[i+1] != "1"){
                  kata3 = kata[angka[i]];
              }
          }

          /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
          if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")){
              subkalimat = kata1+kata2+kata3+tingkat[j];
          }

          /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
          kalimat = subkalimat + kalimat;
          i = i + 3;
          j = j + 1;
      }

      /* mengganti Satu Ribu jadi Seribu jika diperlukan */
      if ((angka[5] == "0") && (angka[6] == "0")){
          kalimat = kalimat.replace("satu ribu","seribu");
      }
      if(!kalimat==''){
        kalimat = kalimat + "rupiah"
      }
  }
 return kalimat;
}
