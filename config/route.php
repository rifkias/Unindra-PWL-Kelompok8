<?php 
class phpRouting{
    
    private $npm = "202143500723";
    public function getPath(){
        $url = $_SERVER['REQUEST_URI'];
        // Get Last Path of URI
        $url = preg_replace('~.*/~', '', $url);
        $explode = explode("?",$url);
        $url = $explode[0];
        return $url;
    }

    function getBasename(){
        // return basename($_SERVER['PHP_SELF']);
        return basename(dirname($_SERVER['PHP_SELF']));
    }

    public function getFilename(){
        $path = $this->getPath();
        $filename = "";
        if($path){
            switch ($path) {
                case "login":
                    $filename = "./page/login.php";
                    break;
            }
        }
        return $filename;
    }

    public function getUri(){
        $uri =  (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
        $basePath = $this->getBasename();
        if($basePath <> 'index.php'){
            $uri = $uri."/".$basePath;
        }
        
        return $uri;
    }
    public function requiredAuthPage(){
        $arr = ["error","login",'register'];
        $res = true;
        if(in_array($this->getPath(),$arr)){
            $res = false;
        }else{
            if($_SESSION['isLogin']){
                $res = false;
            }
        }

        return $res;
    }


}
