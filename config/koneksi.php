<?php 

class Connection{
    protected $host = 'localhost'; 
    protected $username = 'root'; 
    protected $password = '[password]'; 
    protected $database = 'db_payroll'; 

    function conn(){
        $conn = mysqli_connect($this->host,$this->username,$this->password,$this->database);

        return $conn;
    }

    public function checkConnection(){
        $conn = $this->conn();

        if(!$conn){
            echo "Connection Error";
        }else{
            echo "Connection Safe";
        }

        mysqli_close($conn);
    }

    public function query($query){
        $conn = $this->conn();

        $sql = $conn->query($query);
        mysqli_close($conn);
        
        return $sql;
    }
}