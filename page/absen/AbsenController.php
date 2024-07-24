<?php 
include('config/validate.php');
class AbsenController {
    protected $koneksi = null;
    protected $tableName = "absensi";
    protected $validator = null;
    protected $perPage = 10;
    protected $page = 1;
    public function __construct(Connection $conn)
    {
        $this->koneksi = $conn;
        $this->validator = new Validation($this->tableName,$conn,'absensi_id');
    }

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
       
        $perPage = $this->perPage;
        $page = $this->page;

        $currentLimit =  ($page > 1) ? ($page * $perPage) - $perPage : "0";
        $query = "SELECT absensi.*,employe.employe_name as employe_name FROM absensi LEFT JOIN employe on absensi.employe_id = employe.employe_id  $where limit $currentLimit , $perPage";
        $res = $this->koneksi->query($query);

        return $res;
    }

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
        $query = "SELECT * FROM location";
        $res = $this->koneksi->query($query);
        $total = $res->num_rows;
        return $total;
    }

    public function addData($params){
        $validate = [
            "name"          =>['required','noDuplicate'],
            "province"      => ['required'],
            "city"          => ['required'],
            "district"      => ['required'],
            "sub_district"  => ['required'],
            "address_1"     => ['required'],
            "zip_code"      => ['required','max:5','numeric'],
        ];
        $res = $this->validator->validate($params,'create',$validate);
        if($res['status']){
            $name           = $params['name'];
            $province       = $params['province'];
            $city           = $params['city'];
            $district       = $params['district'];
            $sub_district   = $params['sub_district'];
            $zip_code       = $params['zip_code'];
            $address_1      = $params['address_1'];
            $address_2      = $params['address_2'];
            $query = "INSERT INTO location (name,province,city,district,sub_district,zip_code,address_1,address_2) VALUES ('$name','$province','$city','$district','$sub_district','$zip_code','$address_1','$address_2');";
            if($this->koneksi->query($query) === TRUE){
                $_SESSION['success_message'] = "Data Berhasil ditambahkan";
            }else{
                $_SESSION['fail_message'] = "Data Gagal Ditambahkan";
                $res['status'] = false;
            }
            return $res;
        }else{
            return $res;
        }
    }

    public function getDetail($id){
        $queryString = "SELECT * FROM location WHERE location_id = $id";
        $res = null;
        $data = null;
        $status = true;
        $query = $this->koneksi->query($queryString);
        if($query->num_rows > 0){
            $data = $query->fetch_assoc();
        }else{
            $status = false;
            $_SESSION['fail_message'] = "Invalid Location Id";
        }

        $res['status'] = $status;
        $res['data'] = $data;
        return $res;


    }

    public function editData($params){
        $validate = [
            "name"          =>['required','noDuplicate'],
            "province"      => ['required'],
            "city"          => ['required'],
            "district"      => ['required'],
            "sub_district"  => ['required'],
            "address_1"     => ['required'],
            "zip_code"      => ['required','max:5','numeric'],
        ];
        $res = $this->validator->validate($params,'update',$validate,'location_id');
        if($res['status']){
            $id           = $params['id'];
            $name           = $params['name'];
            $province       = $params['province'];
            $city           = $params['city'];
            $district       = $params['district'];
            $sub_district   = $params['sub_district'];
            $zip_code       = $params['zip_code'];
            $address_1      = $params['address_1'];
            $address_2      = $params['address_2'];
            $query = "UPDATE location SET name='$name',province='$province',city='$city',district='$district',sub_district='$sub_district',zip_code='$zip_code',address_1='$address_1',address_2='$address_2' WHERE location_id =  $id";
            if($this->koneksi->query($query) === TRUE){
                $_SESSION['success_message'] = "Data Berhasil Diupdate";
            }else{
                $_SESSION['fail_message'] = "Data Gagal Diupdate";
                $res['status'] = false;
            }
            return $res;
        }else{
            return $res;
        }
    }
}