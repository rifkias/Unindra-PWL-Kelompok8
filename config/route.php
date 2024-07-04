<?php 
class phpRouting{
    
    private $npm = "202143500723";
    public function getPath(){
        $url = $_SERVER['REQUEST_URI'];
        // Get Last Path of URI
        // $url = preg_replace('~.*/~', '', $url);
        $explode = explode("?",$url);
        $url = $explode[0];
        // Check Basename 
        $paths = explode("/",$url);
        foreach($paths as $key => $path){
            if($path == $this->getBasename()){
                array_splice($paths,0,$key+1);
            }
        }

        if(count($paths) == 1){
            $url = $paths[0];
        }else{
            $url = implode("/",$paths);
        }
        // if($path[0] == $this->getBasename()){
        //     array_splice($path,0,1);
        //     $url = implode("/",$path);
        // }
        return $url;
    }

    function getBasename(){
        return basename(dirname($_SERVER['PHP_SELF']));
    }
    function getDirname(){
        return  dirname($_SERVER['PHP_SELF']);
    }
    public function getFilename(){
        $path = $this->getPath();
        if($path == ""){
            $path = "dashboard";
        }
        $filename = "";
        if($path){
            // echo $path;
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
                case "lokasi":
                    $filename = "./page/lokasi/index.php";
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
        $basePath = $this->getDirname();
        if($basePath <> 'index.php'){
            if($basePath == "/"){
                $uri = $uri;
            }else{
                $uri = $uri.$basePath;
            }
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
