<?php
if (!class_exists('Xcrud')) {
	include('../../../config/xcrud/xcrud.php');
}
 $op=$_GET['id_op'];
$ops = [];
$i=0;
$db0 = Xcrud_db::get_instance();
$query0 = 'SELECT * FROM `uc2_of_prioridades`, uc2_of WHERE uc2_of_prioridades.id_op='.$op.' and uc2_of_prioridades.activo=1 and uc2_of.activo=1 and
uc2_of_prioridades.id_of=uc2_of.id_of ORDER BY prioridade';
$db0->query($query0);
$result0 = $db0->result();

foreach ($result0 as $key => $item){
	$ops[$i]['id_of']=$item['id_of'];
	           $ops[$i]['nome_of']=$item['nome_of'];
	            
                	$i++;

	}     

echo json_encode($ops);
?>


        
