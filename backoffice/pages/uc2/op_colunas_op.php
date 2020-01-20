<?php
 // operação moldação id=2   
    if($id_op==2){  

$path = 'pages/uc2/previewmoldacao.php';
include($path);


        //preview 
    $xcrud->fields(array('id_of','id_op','data','op2_etiqueta','op2_comprimento1','op2_comprimento2','op2_comprimento3','op2_comprimento4','op2_comprimento5','op2_comprimentomedio','op2_diametro1','op2_diametro2','op2_diametro3','op2_diametro4','op2_diametro5','op2_diametromedio','op2_pesomedio','op2_pesomedio_2','op2_humidademedia','op2_humidademedia_2','quantidade','conforme','naoconforme_razao','observacoes'), false);
    }

    // operação rectificação id=3   
    if($id_op==3){  
     
   
$path = 'pages/uc2/previewtolerancia.php';
include($path);


    $xcrud->fields(array('id_of','id_op','data','op3_etiqueta_entrada','op3_etiqueta','quantidade','conforme','naoconforme_razao','observacoes'), false);
    }

    // operação lavação id=4   
    if($id_op==4){   

        $path = 'pages/uc2/previewtolerancia.php';
include($path);

    $xcrud->fields(array('id_of','id_op','data','op4_etiqueta_entrada','op4_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação escolha id=5   
    if($id_op==5){   

        $path = 'pages/uc2/previewtolerancia.php';
include($path);

    $xcrud->fields(array('id_of','id_op','data','op5_etiqueta_entrada','op5_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação marcação id=6  
    if($id_op==6){  
    $path = 'pages/uc2/previewtolerancia.php';
include($path);

    $path2 = 'pages/uc2/previewmarca.php';
include($path2);

    $xcrud->fields(array('id_of','id_op','data','op6_etiqueta_entrada','op6_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação tratamento superficial id=7   
    if($id_op==7){   
        $path = 'pages/uc2/previewtolerancia.php';
include($path);
    $xcrud->fields(array('id_of','id_op','data','op7_etiqueta_entrada','op7_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação embalagem/contagem id=8   
    if($id_op==8){   
        $path = 'pages/uc2/previewtolerancia.php';
include($path);
    $xcrud->fields(array('id_of','id_op','data','op8_etiqueta_entrada','op8_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação expedição id=9  
    if($id_op==9){  
    $path = 'pages/uc2/previewtolerancia.php';
include($path); 
    $xcrud->fields(array('id_of','id_op','data','op9_etiqueta_entrada','op9_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

?>