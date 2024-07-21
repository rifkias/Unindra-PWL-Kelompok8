<?php
header("Content-type: application/json");
if (isset($_POST)) {
    $employe_id = $_POST['id'];
    $query = "DELETE FROM employe WHERE employe_id=$employe_id";
    if ($con->query($query) === TRUE) {
        $_SESSION['success_message'] = 'Data Berhasil Dihapus';
    } else {
        $_SESSION['fail_message'] = 'Data Gagal Dihapus';
    }
    header('Location:' . $uri.'/karyawan');
} else {
    $_SESSION['fail_message'] = 'Invalid Method';
    header('Location:' . $uri);
}
// $data = json_decode(file_get_contents("php://input"), TRUE);
