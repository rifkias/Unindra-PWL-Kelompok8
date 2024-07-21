<?php 
include('config/validate.php');
class KaryawanController {
    protected $koneksi = null;
    protected $tableName = "employe";
    protected $validator = null;
    protected $perPage = 10;
    protected $page = 1;
    public function __construct(Connection $conn)
    {
        $this->koneksi = $conn;
        $this->validator = new Validation($this->tableName,$conn,'employe_id');
    }

    public function getData($params){
        $where = "";
        if(@$params['perPage']){
            $this->perPage = $params['perPage'];
        }
        if(@$params['page']){
            $this->page = $params['page'];
        }
        if(@$params['nama']){
            $like = "'%".$params['nama']."%'";
            if($where == ""){
                $where .= "WHERE name LIKE ".$like;
            }else{
                $where .= "AND name LIKE ".$like;
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
        $perPage = $this->perPage;
        $page = $this->page;

        $currentLimit =  ($page > 1) ? ($page * $perPage) - $perPage : "0";
        $query = "SELECT employe.* ,location.name as location_name FROM employe LEFT JOIN location on location.location_id = employe.location_id $where limit $currentLimit , $perPage";
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
            "employe_name"  =>['required'],
            "date_of_birth" => ['required','date'],
            "nik"           => ['required'],
            "username"      => ['required','noDuplicate'],
            "password"      => ['required'],
            "location_id"   => ['required','numeric'],
            "salary"        => ['required','numeric'],
            "role"          => ['required'],
            "is_active"     => ['required'],
        ];
        $res = $this->validator->validate($params,'create',$validate);
        if($res['status']){
            $employe_name       = $params['employe_name'];
            $date_of_birth      = $params['date_of_birth'];
            $nik                = $params['nik'];
            $username           = $params['username'];
            $password           = hash("sha256",$params['password']);
            $location_id        = $params['location_id'];
            $salary             = $params['salary'];
            $role               = $params['role'];
            $is_active          = $params['is_active'];
            $query = "INSERT INTO employe (employe_name,date_of_birth,nik,username,password,location_id,salary,role,is_active) VALUES ('$employe_name','$date_of_birth','$nik','$username','$password','$location_id','$salary','$role','$is_active')";
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
        $queryString = "SELECT employe.*,location.name as location_name FROM employe LEFT JOIN location on location.location_id = employe.location_id  WHERE employe.employe_id = $id";
        $res = null;
        $data = null;
        $status = true;
        $query = $this->koneksi->query($queryString);
        if($query->num_rows > 0){
            $data = $query->fetch_assoc();
        }else{
            $status = false;
            $_SESSION['fail_message'] = "Invalid Employe Id";
        }

        $res['status'] = $status;
        $res['data'] = $data;
        return $res;


    }

    public function editData($params){
        $validate = [
            "employe_name"  =>['required'],
            "date_of_birth" => ['required','date'],
            "nik"           => ['required'],
            "username"      => ['required','noDuplicate'],
            "location_id"   => ['required','numeric'],
            "salary"        => ['required','numeric'],
            "role"          => ['required'],
            "is_active"     => ['required'],
        ];
        $res = $this->validator->validate($params,'update',$validate,'employe_id');
        if($res['status']){ 
            
            $id                 = $params['id'];
            $employe_name       = $params['employe_name'];
            $date_of_birth      = $params['date_of_birth'];
            $nik                = $params['nik'];
            $username           = $params['username'];
            $password           = hash("sha256",$params['password']);
            $location_id        = $params['location_id'];
            $salary             = $params['salary'];
            $role               = $params['role'];
            $is_active          = $params['is_active'];
            $query = "UPDATE employe SET employe_name='$employe_name',date_of_birth='$date_of_birth',nik='$nik',username='$username',location_id='$location_id',salary='$salary',role='$role',is_active='$is_active' ";

            if($params['password'] !== ""){
                $query .= ",password='$password' ";
            }

            $query .= "WHERE employe_id =  $id";

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