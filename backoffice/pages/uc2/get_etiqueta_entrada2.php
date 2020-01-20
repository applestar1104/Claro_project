<?php
if (!class_exists('Xcrud')) {
	include('../../../config/xcrud/xcrud.php');
}
$id_of=$_GET['id_of'];
$id_op=$_GET['id_op'];
$ops = [];
$i=0;
$db0 = Xcrud_db::get_instance();
$query0 = 'SELECT op'.$id_op.'_etiqueta_entrada FROM uc2_op_registo where id_of='.$id_of;
$db0->query($query0);
$result0 = $db0->result();
foreach ($result0 as $key => $item){
 $etiqueta= $item['op'.$id_op.'_etiqueta_entrada'];    
	$pieces = explode(",", $etiqueta);
	foreach ($pieces as &$etiqueta ) {
	$i++;
			 $ops[$i]['op_etiqueta_entrada']=  $etiqueta;
	}     

}
echo json_encode($ops);
?>