<?php
if (!class_exists('Xcrud')) {
	include('../../../config/xcrud/xcrud.php');
}

$id_of=$_GET['id_of'];
$id_op=$_GET['id_op'];
$id_calibre=$_GET['id_calibre'];
$ops = [];
$i=0;
$ops[$i]['valid']= ""; 
$ops[$i]['valdesc']= "- Seleccione -";
$db0 = Xcrud_db::get_instance();
$query0 = 'SELECT op'.$id_op.'_etiqueta FROM uc2_op_registo where id_of='.$id_of;


$query0 = 'SELECT *  FROM   uc2_etiquetasop'.$id_op.' where id_calibres in ('.$id_calibre.')';
$db0->query($query0);
$result0 = $db0->result();

foreach ($result0 as $key => $item){
	$i++;
	$etiqueta= $item['id_etiquetaop'.$id_op];    
    $ops[$i]['valid']= $item['id_etiquetaop'.$id_op]; 
    $ops[$i]['valdesc']= $item['cod_etiquetaop'.$id_op]; 
	
}



echo json_encode($ops);
?>