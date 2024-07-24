<?php 
class DashboardController {
    protected $koneksi = null;
    protected $userId = null;
    public function __construct(Connection $conn)
    {
        $this->koneksi = $conn;
        $this->userId = $_SESSION['userId'];
    }

    public function getData(){

        $res = [];
        $res['totalEmploye'] = $this->getTotalEmploye();
        $res['totalLembur'] = $this->getTotalLembur();
        $res['totalLokasi'] = $this->getTotalLocation();
        $res['dataAbsen'] = $this->getCurrentAbsen();
        $res['totalAbsen'] = $this->getCurrentMonthAttendance();

        return $res;
    }

    private function getTotalEmploye(){
        $query = "SELECT * FROM employe";
        $res = $this->koneksi->query($query);
        $total = $res->num_rows;
        return $total;
    }

    private function getTotalLembur(){
        $userId = $this->userId;
        $query = "SELECT * FROM lembur l LEFT JOIN absensi a ON l.absensi_id = a.absensi_id WHERE a.employe_id = '$userId'";
        $res = $this->koneksi->query($query);
        $total = $res->num_rows;
        return $total;
    }

    private function getTotalLocation(){
        $userId = $this->userId;
        $query = "SELECT * FROM location";
        $res = $this->koneksi->query($query);
        $total = $res->num_rows;
        return $total;
    }

    private function getCurrentAbsen(){
        $userId = $this->userId;
        $query = "SELECT * FROM absensi WHERE employe_id='$userId' AND (check_out IS NULL OR DATE(absensi_date) = DATE(NOW()))  LIMIT 1";
        $res = $this->koneksi->query($query);
        $data = $res->fetch_assoc();
        return $data;
    }

    private function getCurrentMonthAttendance(){
        $userId = $this->userId;
        $monthName = date("F");
        $query = " SELECT * FROM absensi WHERE employe_id = '$userId' AND MONTHNAME(absensi_date) = '$monthName';";
        $res = $this->koneksi->query($query);
        $total = $res->num_rows;
        return $total;
    }
}