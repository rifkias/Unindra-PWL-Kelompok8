<?php 
include('config/validate.php');
class lemburController {
    protected $koneksi = null;
    protected $tableName = "lembur";
    protected $validator = null;
    protected $perPage = 10;
    protected $page = 1;
    protected $where= "";
    public function __construct(Connection $conn)
    {
        $this->koneksi = $conn;
        $this->validator = new Validation($this->tableName,$conn,'lembur_id');
    }

    //fungsi Search
    public function getData($params){
        $where = "";
        if(@$params['perPage']){
            $this->perPage = $params['perPage'];
        }
        if(@$params['page']){
            $this->page = $params['page'];
        }
        if(@$params['karyawan_id']){
            $like = $params['karyawan_id'];
            if($where == ""){
                $where .= "WHERE a.employe_id = '$like'";
            }else{
                $where .= "AND a.employe_id  = '$like'";
            }
        }
        if(@$params['bulanLembur']){
            $explode = explode(" ",@$params['bulanLembur']);
            if(count($explode) > 0){
                $month = $explode[0];
                $year = $explode[1];

                if($where == ""){
                    $where .= "WHERE MONTHNAME(a.absensi_date) = '$month' AND YEAR(a.absensi_date) = '$year'";
                }else{
                    $where .= "AND (MONTHNAME(a.absensi_date) = '$month' AND YEAR(a.absensi_date) = '$year')";
                }

            }
        }
        $perPage = $this->perPage;
        $page = $this->page;

        $this->where = $where;
        
        $currentLimit =  ($page > 1) ? ($page * $perPage) - $perPage : "0";
        // $query = "SELECT * FROM location  $where limit $currentLimit , $perPage";
        $query = "SELECT MONTHNAME(a.absensi_date) AS nameMonth, e.employe_name AS employe_name,e.employe_id AS employe_id, COUNT(l.lembur_id) AS total_lembur, 200000 AS cost_overtime, COUNT(l.lembur_id) * 200000 AS amount_overtime FROM lembur l LEFT JOIN absensi a ON l.absensi_id = a.absensi_id LEFT JOIN employe e ON a.employe_id = e.employe_id $where GROUP BY nameMonth, e.employe_name, e.employe_id limit $currentLimit , $perPage";
        $res = $this->koneksi->query($query);
        return $res;
    }

    //pengaturan halaman
    public function getPagination(){
        $res = [];
        $countRow = $this->countData();
        $res['currentNumber'] = ($this->page > 1) ? ($this->page * $this->perPage) - $this->perPage : "0";
        $res['totalRow'] = $countRow;
        $res['totalPage'] = ceil($countRow/$this->perPage);
        $res['currentPage'] = $this->page;
        $res['params'] = $this->getParameter();
        return $res;
    }

    function getParameter(){
        $uri = $_SERVER["QUERY_STRING"];
        parse_str($uri, $queryArray);

        if(count($queryArray) > 0){
            $removedParams = "";
            foreach($queryArray as $key => $val){
                if($key !== 'page'){
                    if($removedParams == ""){
                        $removedParams .= "?".$key."=".$val;
                    }else{
                        $removedParams .= "&".$key."=".$val;
                    }
                }
            }
            $uri = $removedParams;
        }
        return $uri;
    }
    public function countData(){
        //$query = "SELECT * FROM lembur";
        $where = $this->where;
        $query = "SELECT MONTHNAME(a.absensi_date) AS nameMonth, e.employe_name AS employe_name,e.employe_id AS employe_id, COUNT(l.lembur_id) AS total_lembur, 200000 AS cost_overtime, COUNT(l.lembur_id) * 200000 AS amount_overtime FROM lembur l LEFT JOIN absensi a ON l.absensi_id = a.absensi_id LEFT JOIN employe e ON a.employe_id = e.employe_id $where GROUP BY nameMonth, e.employe_name, e.employe_id";
        $res = $this->koneksi->query($query);
        $total = $res->num_rows;
        return $total;
    }

    public function addData($params){

        $validate = [
            "employe_id"          => ['required', 'numeric'],
            "tanggalLembur"        => ['required', 'date'],
            "lembur"      => ['required'],
        ];
        $res = $this->validator->validate($params,'create',$validate);
        if($res['status']){
            $employe           = $params['employe_id'];
            $tanggalAbsen = $params['tanggalLembur'];
            $absensiData = $this->getAbsensiId($employe,$tanggalAbsen);
            if($absensiData){
                $absensiId = $absensiData['absensi_id'];
                $explodeLembur = explode("-",$params['lembur']);

                if(count($explodeLembur) > 0){
                    $start = str_replace("/","-",trim($explodeLembur[0]));
                    $end = str_replace("/","-",trim($explodeLembur[1]));
                    $requestFrom = $_SESSION['userId'];
                    $created_by = $_SESSION['employe_name'];
                    $query = "INSERT INTO lembur (absensi_id,start_date,end_date,request_from,created_by) VALUES ('$absensiId','$start','$end','$requestFrom','$created_by');";

                    if($this->koneksi->query($query) === TRUE){
                        $_SESSION['success_message'] = "Data Berhasil ditambahkan";
                    }else{
                        $_SESSION['fail_message'] = "Data Gagal Ditambahkan";
                        $res['status'] = false;
                    }
                }else{
                    $_SESSION['fail_message'] = "Invalid Lembur Date";
                    $res['message']['lembur'][] = ['Invalid Lembur Date'];
                    $res['status'] = false;        
                }

            }else{
                $_SESSION['fail_message'] = "Invalid Lembur Date";
                $res['message']['tanggalLembur'][] = ['Invalid Lembur Date'];
                $res['status'] = false;
            }
            return $res;
        }else{
            return $res;
        }
    }

    public function getDetail($id,$month){
        $queryString = "SELECT l.lembur_id AS lembur_id, a.absensi_date AS absensi_date, e.employe_name AS employe_name, e.employe_id AS employe_id, l.start_date AS start_overtime, l.end_date AS end_overtime, i.employe_name AS submitted_by, l.created_at AS created_at, l.created_by AS created_by FROM lembur l LEFT JOIN absensi a ON l.absensi_id = a.absensi_id LEFT JOIN employe e ON a.employe_id =  e.employe_id LEFT JOIN employe i on i.employe_id = l.request_from WHERE MONTHNAME(a.absensi_date) = '$month' AND a.employe_id = '$id' GROUP BY l.lembur_id";
        $res = null;
        $data = null;
        $status = true;

        $query = $this->koneksi->query($queryString);
        if($query->num_rows > 0){
            $data = $query;
        }else{
            $status = false;
            $_SESSION['fail_message'] = "Invalid Lembur Id";
        }

        $res['status'] = $status;
        $res['data'] = $data;
        return $res;
    }


   private function getAbsensiId($employeId,$date){
    $query = "SELECT * FROM absensi WHERE employe_id = '$employeId' AND absensi_date = '$date' LIMIT 1";
    $res = $this->koneksi->query($query);
    $datas = $res->fetch_assoc();


    return $datas;
   }
}