<?php
header("Content-type: application/json");
if (isset($_POST)) {
    $location_id = $_POST['id'];
    $query = "DELETE FROM lembur WHERE lembur_id=$lembur_id";
    if ($con->query($query) === TRUE) {
        $_SESSION['success_message'] = 'Data Berhasil Dihapus';
    } else {
        $_SESSION['fail_message'] = 'Data Gagal Dihapus';
    }
    header('Location:' . $uri.'/lokasi');
} else {
    $_SESSION['fail_message'] = 'Invalid Method';
    header('Location:' . $uri);
}
// $data = json_decode(file_get_contents("php://input"), TRUE);
