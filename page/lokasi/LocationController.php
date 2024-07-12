<?php 
include('config/validate.php');
class LocationController {
    protected $koneksi = null;
    protected $tableName = "location";
    protected $validator = null;
    protected $perPage = 10;
    protected $page = 1;
    public function __construct(Connection $conn)
    {
        $this->koneksi = $conn;
        $this->validator = new Validation($this->tableName,$conn);
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
        $perPage = $this->perPage;
        $page = $this->page;

        $currentLimit =  ($page > 1) ? ($page * $perPage) - $perPage : "0";
        $query = "SELECT * FROM location  $where limit $currentLimit , $perPage";
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
            $query = "INSERT INTO location (name,province,city,district,sub_district,zip_code,address_1,address_2) VALUES (".'"'.$params['name'].'",'.'"'.$params['province'].'",'.'"'.$params['city'].'"'.',"'.$params['district'].'"'.',"'.$params['sub_district'].'"'.','.'"'.$params['zip_code'].'",'.'"'.$params['address_1'].'",'.'"'.$params['address_2'].'");';
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

}