<?php
if (!class_exists('Xcrud')) {
	include('../../../config/xcrud/xcrud.php');
}
$db = Xcrud_db::get_instance();          
$query ='UPDATE uc2_of SET `arquivo`=1, `activo`=0 WHERE  id_of ='.$_GET['id_of'];
$db->query($query); 
header('Location: ../../index.php?page=uc2/resumo_of&id_of='.$_GET['id_of']);

?>