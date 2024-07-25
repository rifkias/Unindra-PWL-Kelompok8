<?php 
include('../config/koneksi.php');
$con = new Connection();
$where = "";
$datas = [];

if(isset($_GET['type']) && isset($_GET['id'])){
    if($_GET['type'] == 'detail' && $_GET['id'] !== ""){
        $id = $_GET['id'];
        $where = "WHERE employe_id = '$id' limit 1";
    }

    $query = "SELECT * FROM employe $where";
    $res = $con->query($query);
    $datas = $res->fetch_assoc();
}else{
    if(isset($_GET['search'])){
        $like = "'%".$_GET['search']."%'";
        if($where == ""){
            $where .= "WHERE employe_name LIKE ".$like;
        }else{
            $where .= "AND employe_name LIKE ".$like;
        }
    }

    $query = "SELECT * FROM employe $where";
    $res = $con->query($query);

    while ($d = $res->fetch_object()) {
        $datas[] = $d;
    }
}



echo json_encode($datas);

header('Content-Type: application/json; charset=utf-8');