<?php

class Validation
{
    protected $koneksi = null;
    protected $tableName = null;
    protected $primaryKey = null;

    function __construct($tableName, Connection $conn,$primaryKey)
    {
        $this->koneksi = $conn;
        $this->tableName = $tableName;
        $this->primaryKey = $primaryKey;
    }

    public function validate($data, $types, $validation)
    {
        $res = [];
        $status = true;
        $message = null;
        $alert = false;
        $alertMessage = null;
        foreach ($validation as $key => $v) {
            if (count($v) > 0) {
                foreach ($v as $validateType) {
                    $type = $validateType;
                    $check = explode(":", $type);
                    $value = null;
                    if (count($check) > 1) {
                        $type = $check[0];
                        $value = $check[1];
                    }

                    if (isset($data[$key])) {
                        $dataValue = trim($data[$key]);
                        $dataValue = htmlspecialchars($data[$key]);

                        if ($type == 'required') {
                            if (!$this->required($dataValue)) {
                                $status = false;
                                $message[$key][] = ["Field " . ucfirst(str_replace("_", " ", $key)) . " Required"];
                            }
                        }

                        if ($type == 'noDuplicate') {
                            if ($types == 'update') {
                                if (!$this->noDuplicate($dataValue, $key, @$data['id'])) {
                                    $status = false;
                                    $message[$key][] = ["Field " . ucfirst(str_replace("_", " ", $key)) . " Already Exists"];
                                }
                            } else {
                                if (!$this->noDuplicate($dataValue, $key)) {
                                    $status = false;
                                    $message[$key][] = ["Field " . ucfirst(str_replace("_", " ", $key)) . " Already Exists"];
                                }
                            }
                        }

                        if($type == 'max'){
                            if(!$this->max($dataValue,$value)){
                                $status = false;
                                $message[$key][] = ["Field " . ucfirst(str_replace("_", " ", $key)) . " Max $value Digit"];
                            }
                        }

                        if($type == 'numeric'){
                            if(!$this->numeric($dataValue)){
                                $status = false;
                                $message[$key][] = ["Field " . ucfirst(str_replace("_", " ", $key)) . " Must be Numeric"];
                            }
                        }
                    }


                }
            }
        }
        $res['status'] = $status;
        $res['message'] = $message;
        return $res;
    }

    private function required($value)
    {
        $res = true;
        if ($value === "") {
            $res = false;
        }

        return $res;
    }

    private function noDuplicate($value, $key, $id = null)
    {
        $res = true;
        $query = "SELECT $key FROM " . $this->tableName . " WHERE $key = '$value'";
        if ($id) {
            $query .= "AND $this->primaryKey <> $id";
        }
        $check = $this->koneksi->query($query);
        $total = $check->num_rows;
        if ($total > 0) {
            $res = false;
        }
        return $res;
    }

    private function max($value,$limit){
        $res = true;
        if(strlen($value) > $limit){
            $res = false;
        }

        return $res;
    }
    private function numeric($value){
        $res = true;
        if(!is_numeric($value)){
            $res = false;
        }

        return $res;
    }
}
