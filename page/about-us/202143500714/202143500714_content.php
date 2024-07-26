<?php
    //membaca nilai dari parameter 'page' jika ada
    $page = isset($_GET['page']) ?
    $_GET['page'] : 'home';

    //menampilkan konten berdasarkan halaman yang dipilih
    switch ($page) {
        case 'biodata' :
                include './php/202143500714_biodata.php';
                break;
        case 'helloWorld' :
                include './php/202143500714_helloWorld.php';
                break;
        case 'variable' :
                include './php/202143500714_variabel.php';
                break;
        case 'object' :
                include './php/202143500714_object.php';
                break;
        case 'konstanta' :
                include './php/202143500714_konstanta.php';
                break;
        case 'operatorAritmetika' :
                include './php/202143500714_operatorAritmetika.php';
                break;
        case 'operatorPerbandingan' :
                include './php/202143500714_operatorPerbandingan.php';
                break;
        case 'operatorString' :
                include './php/202143500714_operatorString.php';
                break;
        case 'kondisiIf' :
                include './php/202143500714_kondisiIf.php';
                break;
        case 'kondisiElseIf' :
                include './php/202143500714_kondisiElseIf.php';
                break;
        case 'kondisiSwitch' :
                include './php/202143500714_kondisiSwitch.php';
                break;
        case 'whileLoop' :
                include './php/202143500714_whileLoop.php';
                break;
        case 'doWhileLoop' :
                include './php/202143500714_doWhileLoop.php';
                break;
        case 'forLoop' :
                include './php/202143500714_forLoop.php';
                break;
        case 'forEachLoop' :
                include './php/202143500714_forEachLoop.php';
                break;
        case 'builtInFunctions' :
                include './php/202143500714_builtInFunctions.php';
                break;
        case 'functionSendiri' :
                include './php/202143500714_functionSendiri.php';
                break;
        case 'functionParameter' :
                include './php/202143500714_functionParameter.php';
                break;
        case 'optionalArgument' :
                include './php/202143500714_optionalArgument.php';
                break;
        case 'callByValue' :
                include './php/202143500714_callByValue.php';
                break;
        case 'callByReference' :
                include './php/202143500714_callByReference.php';
                break;
        case 'formBiodata' :
                include './php/202143500714_formBiodata.php';
                break;
        case 'konversiNilai' :
                include './php/202143500714_konversiNilai.php';
                break;
        case 'membuatTabel' :
                include './php/202143500714_membuatTabel.php';
                break;
        default :
            include './php/202143500714_home.php';
            break;
    }
?>