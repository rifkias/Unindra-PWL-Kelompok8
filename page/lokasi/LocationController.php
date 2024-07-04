<?php 
// include('config/koneksi.php');
class LocationController {
    protected $koneksi = null;

    public function __construct($conn)
    {
        $this->koneksi = $conn;
    }

    public function getData(){
        $query = "SELECT * FROM location";
        $res = $this->koneksi->query($query);
        return $res;
    }
}