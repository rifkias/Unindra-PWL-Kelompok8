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
        $where .= "WHERE name LIKE ".$like;
    }else{
        $where .= "AND name LIKE ".$like;
    }
}
if(@$params['provinsi']){
    $like = "'%".$params['provinsi']."%'";
    if($where == ""){
        $where .= "WHERE province LIKE ".$like;
    }else{
        $where .= "AND province LIKE ".$like;
    }
}
if(@$params['city']){
    $like = "'%".$params['city']."%'";
    if($where == ""){
        $where .= "WHERE city LIKE ".$like;
    }else{
        $where .= "AND city LIKE ".$like;
    }
}
$query = "SELECT * FROM location $where";

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
$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Province');
$sheet->setCellValue('C1', 'City');
$sheet->setCellValue('D1', 'District');
$sheet->setCellValue('E1', 'Sub District');
$sheet->setCellValue('F1', 'Zip Code');
$sheet->setCellValue('G1', 'Address 1');
$sheet->setCellValue('H1', 'Address 2');

$no = 2;

if(count($data) > 0){
    foreach($data as $d){
        $sheet->setCellValue('A'.$no, trim($d['name']));
        $sheet->setCellValue('B'.$no, trim($d['province']));
        $sheet->setCellValue('C'.$no, trim($d['city']));
        $sheet->setCellValue('D'.$no, trim($d['district']));
        $sheet->setCellValue('E'.$no, trim($d['sub_district']));
        $sheet->setCellValue('F'.$no, trim($d['zip_code']));
        $sheet->setCellValue('G'.$no, trim($d['address_1']));
        $sheet->setCellValue('H'.$no, trim($d['address_2']));

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