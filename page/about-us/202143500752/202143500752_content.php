<?php
    //membaca nilai dari parameter 'page' jika ada
    $page = isset($_GET['page']) ?
    $_GET['page'] : 'home';

    //menampilkan konten berdasarkan halaman yang dipilih
    switch ($page) {
        case 'biodata' :
                include './php/202143500752_biodata.php';
                break;
        case 'helloWorld' :
                include './php/202143500752_helloWorld.php';
                break;
        case 'variable' :
                include './php/202143500752_variabel.php';
                break;
        case 'object' :
                include './php/202143500752_object.php';
                break;
        case 'konstanta' :
                include './php/202143500752_konstanta.php';
                break;
        case 'operatorAritmetika' :
                include './php/202143500752_operatorAritmetika.php';
                break;
        case 'operatorPerbandingan' :
                include './php/202143500752_operatorPerbandingan.php';
                break;
        case 'operatorString' :
                include './php/202143500752_operatorString.php';
                break;
        case 'kondisiIf' :
                include './php/202143500752_kondisiIf.php';
                break;
        case 'kondisiElseIf' :
                include './php/202143500752_kondisiElseIf.php';
                break;
        case 'kondisiSwitch' :
                include './php/202143500752_kondisiSwitch.php';
                break;
        case 'whileLoop' :
                include './php/202143500752_whileLoop.php';
                break;
        case 'doWhileLoop' :
                include './php/202143500752_doWhileLoop.php';
                break;
        case 'forLoop' :
                include './php/202143500752_forLoop.php';
                break;
        case 'forEachLoop' :
                include './php/202143500752_forEachLoop.php';
                break;
        case 'builtInFunctions' :
                include './php/202143500752_builtInFunctions.php';
                break;
        case 'functionSendiri' :
                include './php/202143500752_functionSendiri.php';
                break;
        case 'functionParameter' :
                include './php/202143500752_functionParameter.php';
                break;
        case 'optionalArgument' :
                include './php/202143500752_optionalArgument.php';
                break;
        case 'callByValue' :
                include './php/202143500752_callByValue.php';
                break;
        case 'callByReference' :
                include './php/202143500752_callByReference.php';
                break;
        case 'formBiodata' :
                include './php/202143500752_formBiodata.php';
                break;
        case 'konversiNilai' :
                include './php/202143500752_konversiNilai.php';
                break;
        case 'membuatTabel' :
                include './php/202143500752_membuatTabel.php';
                break;
        default :
            include './php/202143500752_home.php';
            break;
    }
?>