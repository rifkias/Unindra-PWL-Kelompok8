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
        if($path == ""){
            $path = "dashboard";
        }
        $filename = "";
        if($path){
            switch ($path) {
                case "dashboard":
                    $filename = "./page/dashboard.php";
                    break;
                case "login":
                    $filename = "./page/login.php";
                    break;
                case "logout":
                    $filename = "./page/logout.php";
                    break;
                case "error":
                    $filename = "./page/errors/errorPage.php";
                    break;
                default:
                    $filename = "./page/errors/notFoundPage.php";
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
    public function checkAuth(){
        $res = false;
        if(isset($_SESSION['isLogin'])){
            $res = true;
        }
        return $res;
    }
    public function requiredAuthPage(){
        $arr = ["error","login",'register'];
        $res = true;
        if(in_array($this->getPath(),$arr)){
            $res = false;
        }
        return $res;
    }


}
