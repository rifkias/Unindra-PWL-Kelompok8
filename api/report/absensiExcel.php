<?php 

require ('../../vendor/autoload.php');
require('../../config/koneksi.php');
$con = new Connection();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$where = "";
$params = $_GET;
if(@$params['karyawan_id']){
    $like = $params['karyawan_id'];
    if($where == ""){
        $where .= "WHERE absensi.employe_id = '$like'";
    }else{
        $where .= "AND absensi.employe_id  = '$like'";
    }
}

if(@$params['absenDate']){
    $dates = rawurldecode($params['absenDate']);
    $dateExplode = explode("-",$dates);
    $date1 = date("Y-m-d",strtotime(trim(str_replace("/","-",$dateExplode[0]))));
    $date2 = date("Y-m-d",strtotime(trim(str_replace("/","-",$dateExplode[1]))));
    // echo str_replace("/","-",$dateExplode[1]);
    $params = "BETWEEN '$date1' AND '$date2'";
    // $like = $params['karyawan_id'];
    if($where == ""){
        $where .= "WHERE absensi.absensi_date $params";
    }else{
        $where .= "AND absensi.absensi_date $params";
    }
}

$query = "SELECT absensi.*,employe.employe_name as employe_name FROM absensi LEFT JOIN employe on absensi.employe_id = employe.employe_id $where";

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
$sheet->setCellValue('B1', 'Tanggal Absen');
$sheet->setCellValue('C1', 'Check In');
$sheet->setCellValue('D1', 'Check Out');

$no = 2;

if(count($data) > 0){
    foreach($data as $d){
        $sheet->setCellValue('A'.$no, trim($d['employe_name']));
        $sheet->setCellValue('B'.$no, trim($d['absensi_date']));
        $sheet->setCellValue('C'.$no, trim($d['check_in']));
        $sheet->setCellValue('D'.$no, trim($d['check_out']));
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