<?php 

require ('../../vendor/autoload.php');
require('../../config/koneksi.php');
$con = new Connection();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$where = "";
$params = $_GET;
if(@$params['nama']){
    $like = "'%".$params['nama']."%'";
    if($where == ""){
        $where .= "WHERE employe.employe_name LIKE ".$like;
    }else{
        $where .= "AND employe.employe_name LIKE ".$like;
    }
}
if(@$params['location_id']){
    $location_id = $params['location_id'];
    if($where == ""){
        $where .= "WHERE employe.location_id = '$location_id' ";
    }else{
        $where .= "AND employe.location_id = '$location_id'";
    }
}
if(@$params['nik']){
    $like = "'%".$params['nik']."%'";
    if($where == ""){
        $where .= "WHERE nik LIKE ".$like;
    }else{
        $where .= "AND nik LIKE ".$like;
    }
}
$query = "SELECT employe.* ,location.name as location_name FROM employe LEFT JOIN location on location.location_id = employe.location_id $where";

$data = [];

$res = $con->query($query);

while($d = $res->fetch_assoc()){
    $data[] = $d;

}

// Buat objek spreadsheet baru
$spreadsheet = new Spreadsheet();

// Ambil sheet aktif
$sheet = $spreadsheet->getActiveSheet();

// Isi data di sheet
$sheet->setCellValue('A1', 'Nama');
$sheet->setCellValue('B1', 'Tanggal Lahir');
$sheet->setCellValue('C1', 'Nik');
$sheet->setCellValue('D1', 'Lokasi');
$sheet->setCellValue('E1', 'Role');
$sheet->setCellValue('F1', 'Gaji');
$sheet->setCellValue('G1', 'Aktif');

$no = 2;

if(count($data) > 0){
    foreach($data as $d){
        $sheet->setCellValue('A'.$no, trim($d['employe_name']));
        $sheet->setCellValue('B'.$no, trim($d['date_of_birth']));
        $sheet->setCellValue('C'.$no, trim($d['nik']));
        $sheet->setCellValue('D'.$no, trim($d['location_name']));
        $sheet->setCellValue('E'.$no, trim($d['role']));
        $sheet->setCellValue('F'.$no, trim($d['salary']));
        $sheet->setCellValue('G'.$no, trim($d['is_active'] == "1" ? "Aktif" : "Tidak"));

        $no++;
    }
}
$writer = new Xlsx($spreadsheet);
// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');
$filename = uniqid();
// It will be called file.xls
header('Content-Disposition: attachment; filename="'.$filename.'.xlsx"');

$writer->save('php://output');

exit;