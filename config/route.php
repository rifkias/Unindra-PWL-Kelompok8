<?php
class phpRouting
{

    private $npm = "202143500723";
    private $isProd = false;
    public function getPath()
    {
        $url = $_SERVER['REQUEST_URI'];
        // Get Last Path of URI
        // $url = preg_replace('~.*/~', '', $url);
        $explode = explode("?", $url);
        $url = $explode[0];
        // Check Basename 
        $paths = explode("/", $url);
        foreach ($paths as $key => $path) {
            if ($path == $this->getBasename()) {
                array_splice($paths, 0, $key + 1);
            }
        }

        if (count($paths) == 1) {
            $url = $paths[0];
        } else {
            $url = implode("/", $paths);
        }
        // if($path[0] == $this->getBasename()){
        //     array_splice($path,0,1);
        //     $url = implode("/",$path);
        // }
        return $url;
    }

    function getBasename()
    {
        return basename(dirname($_SERVER['PHP_SELF']));
    }
    function getDirname()
    {
        return  dirname($_SERVER['PHP_SELF']);
    }
    public function getFilename()
    {
        $path = $this->getPath();
        if ($path == "") {
            $path = "dashboard";
        }
        /**
         * URI Segment Can't Greated Than 3
         * 1. Current Path
         * 2. Action 
         * 3. Params ex:id
         */

        if ($this->checkUriSegment($path) == 'params') {
            $path = $this->reBuildUri($path);
        }
        $filename = "";
        if ($path) {
            // echo $path;
            switch ($path) {
                case "dashboard":
                    $filename = "./page/dashboard/dashboard.php";
                    break;
                case "about-us":
                    $filename = "./page/about-us/aboutUs.php";
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
                case "lokasi/add":
                    $filename = "./page/lokasi/create.php";
                    break;
                case "lokasi/detail":
                    $filename = "./page/lokasi/detail.php";
                    break;
                case "lokasi/edit":
                    $filename = "./page/lokasi/edit.php";
                    break;
                case "lokasi/delete":
                    $filename = "./page/lokasi/delete.php";
                    break;
                case "karyawan":
                    $filename = "./page/karyawan/index.php";
                    break;
                case "karyawan/add":
                    $filename = "./page/karyawan/create.php";
                    break;
                case "karyawan/detail":
                    $filename = "./page/karyawan/detail.php";
                    break;
                case "karyawan/edit":
                    $filename = "./page/karyawan/edit.php";
                    break;
                case "karyawan/delete":
                    $filename = "./page/karyawan/delete.php";
                    break;
                case "lembur":
                    $filename = "./page/lembur/index.php";
                    break;
                case "lembur/add":
                    $filename = "./page/lembur/create.php";
                    break;
                case "lembur/detail":
                    $filename = "./page/lembur/detail.php";
                    break;
                case "lembur/edit":
                    $filename = "./page/lembur/edit.php";
                    break;
                case "lembur/delete":
                    $filename = "./page/lembur/delete.php";
                    break;
                case "absensi":
                    $filename = "./page/absen/index.php";
                    break;
                case "absensi/add":
                    $filename = "./page/absen/create.php";
                    break;
                case "absensi/detail":
                    $filename = "./page/absen/detail.php";
                    break;
                case "absensi/edit":
                    $filename = "./page/absen/edit.php";
                    break;
                case "absensi/delete":
                    $filename = "./page/absen/delete.php";
                    break;
                case "error":
                    $filename = "./page/errors/errorPage.php";
                    break;
                default:
                    http_response_code(404);
                    $filename = "./page/errors/notFoundPage.php";
            }
        }
        return $filename;
    }

    private function checkUriSegment($path)
    {
        $res = 'normal';
        $check = explode('/', $path);
        $count = count($check);
        if ($count > 3) {
            header('Location:' . $this->getUri() . '/not-found');
        }

        if ($count == 3) {
            $res = 'params';
        }

        return $res;
    }

    private function reBuildUri($path)
    {
        $uri = $path;

        $exploded = explode("/", $path);
        unset($exploded[2]);

        $uri = implode("/", $exploded);

        return $uri;
    }

    public function getParams()
    {
        $uri = $this->getPath();
        $exploded = explode("/", $uri);
        if (count($exploded) === 3) {
            return $exploded[2];
        } else {
            return null;
        }
    }

    public function getUri()
    {
        $uri =  $this->checkHttps(). "://$_SERVER[HTTP_HOST]";
        $basePath = $this->getDirname();
        if ($basePath <> 'index.php') {
            if ($basePath == "/") {
                $uri = $uri;
            } else {
                $uri = $uri . $basePath;
            }
        }

        return $uri;
    }

    function checkHttps(){
        if($this->isProd){
            return 'https';
        }else{
            return empty($_SERVER['HTTPS']) ? 'http' : 'https';
        }
    }
    public function checkAuth()
    {
        $res = false;
        if (isset($_SESSION['isLogin'])) {
            $res = true;
        }
        return $res;
    }
    public function requiredAuthPage()
    {
        $arr = ["error", "login", 'register', 'lokasi/delete'];
        $res = true;
        if (in_array($this->getPath(), $arr)) {
            $res = false;
        }
        return $res;
    }
}
