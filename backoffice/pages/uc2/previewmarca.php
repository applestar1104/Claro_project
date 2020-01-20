<?php
if(!class_exists('Xcrud')) {
include('../../../config/xcrud/xcrud.php');
}

$where='';
$ops='';




if(isset($_GET['id_cliente']) and $_GET['id_cliente']!=""){
$id_cliente=$_GET['id_cliente'];
$where= ' and id_cliente='.$id_cliente;
}

    if(isset($_GET['id_marcacao'])){
	$id_marcacao=$_GET['id_marcacao'];
	$local_marcacao=$_GET['local_marcacao'];

       $db = Xcrud_db::get_instance();
  $query = 'SELECT * FROM `uc2_marcas` where id_marca='.$id_marcacao.' and id_localdemarcacao='.$local_marcacao.$where;
    $db->query($query);
    $result = $db->result();
    
    foreach ($result as $key => $item) { 
    $ops[$key]['cod_op'] =$item['id_marca'];   
    $ops[$key]['cod_html']= $item['cod_marca']; 
    $ops[$key]['preview']= $item['marca']; 
    }


   echo json_encode($ops);

    }



    else {
        $db0 = Xcrud_db::get_instance();
        $query0 = 'SELECT id_marca FROM uc2_of where id_of='.$id_of;
        $db0->query($query0);
        $result0 = $db0->result();
     
         $id_marca=$result0[0]['id_marca'];
       
       if($id_marca){
           $db = Xcrud_db::get_instance();
  $query = 'SELECT * FROM `uc2_marcas` where id_marca='.$id_marca;
    $db->query($query);
    $result = $db->result();
    
       echo "<br> <img src=../uploads/marcas/thumbs/".$result [0]['marca']." style='max-width:100%;' />";
}
    }


 



   


?>
