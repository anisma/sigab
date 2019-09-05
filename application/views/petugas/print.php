<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=".$nama_file.".docx");
require_once 'vendor/autoload.php';

use \PhpOffice\PhpWord\TemplateProcessor;

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new TemplateProcessor(base_url('assets/template/surat_KGB.docx'));
foreach ($kgb as $kgb ){
  $templateProcessor->setValue('tanggal', date_indo(date_format(new DateTime($kgb->tanggal),'Y-m-j')));
  $templateProcessor->setValue('no_kgb', $kgb->no_surat);
  $templateProcessor->setValue('golongan', ' '.$kgb->golongan);
  $templateProcessor->setValue('pangkat', $kgb->pangkat);
  $templateProcessor->setValue('gaji_lama', 'Rp. '. number_format($kgb->gaji_lama,0,'.','.').',- ('.ucfirst($kgb->terbilang_gaji_lama).')');
  $templateProcessor->setValue('gaji_baru', 'Rp. '. number_format($kgb->gaji_baru,0,'.','.').',- ('.ucfirst($kgb->terbilang_gaji_baru).'zkmaklmck k km kfmaksm kama km kadsmla mam akl mal ma malm alm al maflmqa efm e)');
  $templateProcessor->setValue('sk', $kgb->skp);
  $templateProcessor->setValue('tanggal_sk', ' '.date_indo(date_format(new DateTime($kgb->tgl_skp),'Y-m-j')));
  $templateProcessor->setValue('nomor_sk', $kgb->no_skp);
  $templateProcessor->setValue('tmt', date_indo(date_format(new DateTime($kgb->tmt_lama),'Y-m-j')));
  $templateProcessor->setValue('tahun', $kgb->tahun_mk_skp.' ');
  $templateProcessor->setValue('bulan', $kgb->bulan_mk_skp.' ');
  $templateProcessor->setValue('tahun_baru', $kgb->tahun_mk_skp+2);
  $templateProcessor->setValue('bulan_baru', $kgb->bulan_mk);
  $templateProcessor->setValue('tmt_baru', date_indo(date_format(new DateTime($kgb->tmt_baru),'Y-m-j')));
  $templateProcessor->setValue('tmt_mendatang', date_indo(date_format(new DateTime($kgb->tmt_mendatang),'Y-m-j')));
}
foreach($surat as $surat){
  $templateProcessor->setValue('acuhan_gaji', $surat->uu_gaji);
  $templateProcessor->setValue('kepala_dinas', $surat->nama);
  $templateProcessor->setValue('pangkat_kadin', $surat->pangkat);
  $str = $surat->nip;
  $nip_kadin = substr($str, 0, 8) . " " . substr($str,8, 6)." ".substr($str,14,1)." ".substr($str,15);
  $templateProcessor->setValue('nip_kadin', $nip_kadin);
}
foreach ($duk as $duk ){
  // die(json_encode($duk));
  $templateProcessor->setValue('nama', $duk->nama);
  $str = $duk->nip;
  $nip= substr($str, 0, 8) . " " . substr($str,8, 6)." ".substr($str,14,1)." ".substr($str,15);
  $templateProcessor->setValue('nip', $nip);
  $templateProcessor->setValue('tempat_lahir', $duk->tempat_lahir);
  $templateProcessor->setValue('tanggal_lahir', date_indo(date_format(new DateTime($duk->tanggal_lahir),'Y-m-j')));
  $templateProcessor->setValue('jabatan', $duk->jabatan);
  $templateProcessor->setValue('kantor', $duk->nama_kantor);
}
$templateProcessor->saveAs('php://output');
