<?php 
class phpRouting{
    private $npm = "202143500723";
    function getPath(){
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
                case "variable":
                    $filename = "./content/".$this->npm."_variable.php";
                    break;
                case "object":
                    $filename = "./content/".$this->npm."_object.php";
                    break;
                case "konstanta":
                    $filename = "./content/".$this->npm."_konstanta.php";
                    break;
                case "aritmatika":
                    $filename = "./content/".$this->npm."_aritmatika.php";
                    break;
                case "perbandingan":
                    $filename = "./content/".$this->npm."_perbandingan.php";
                    break;
                case "string":
                    $filename = "./content/".$this->npm."_string.php";
                    break;
                case "kondisiIf":
                    $filename = "./content/".$this->npm."_if.php";
                    break;
                case "kondisiIfElse":
                    $filename = "./content/".$this->npm."_ifElse.php";
                    break;
                case "switch":
                    $filename = "./content/".$this->npm."_switch.php";
                    break;
                case "whileLoop":
                    $filename = "./content/".$this->npm."_whileLoop.php";
                    break;
                case "doWhile":
                    $filename = "./content/".$this->npm."_doWhile.php";
                    break;
                case "forLoop":
                    $filename = "./content/".$this->npm."_forLoop.php";
                    break;
                case "foreachLoop":
                    $filename = "./content/".$this->npm."_foreachLoop.php";
                    break;
                case "biodata":
                    $filename = "./content/".$this->npm."_biodata.php";
                    break;
                case "function":
                    $filename = "./content/".$this->npm."_function.php";
                    break;
                case "functionParameter":
                    $filename = "./content/".$this->npm."_functionParameter.php";
                    break;
                case "optionalArugment":
                    $filename = "./content/".$this->npm."_optionalArugment.php";
                    break;
                case "callByValue":
                    $filename = "./content/".$this->npm."_callByValue.php";
                    break;
                case "callByReference":
                    $filename = "./content/".$this->npm."_callByReference.php";
                    break;
                case "formBiodata":
                    $filename = "./content/".$this->npm."_formBiodata.php";
                    break;
                case "formTable":
                    $filename = "./content/".$this->npm."_formTable.php";
                    break;
                case "convertNilai":
                    $filename = "./content/".$this->npm."_convertNilai.php";
                    break;
                default:
                $filename = "./content/".$this->npm."_helloworld.php";
            }
            // if($path )
        }else{
            $filename = "./content/".$this->npm."_helloworld.php";
        }
        return $filename;
    }



}
