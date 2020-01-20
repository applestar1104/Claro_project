<?php
if (!class_exists('Xcrud')) {
include('../../../config/xcrud/xcrud.php');
}
 

$id_of=$_GET['id_of'];
$id_op=$_GET['id_op'];
$ops = [];
$i=0;
   $k=0;
 $db0 = Xcrud_db::get_instance();
  $db = Xcrud_db::get_instance();
   $query0 = 'SELECT *  FROM uc2_of where id_of='.$id_of;
        $db0->query($query0);
        $result0 = $db0->result();
         foreach ($result0 as $key => $item){
            $i++;
        $id= $item['id_operacao'];   
     $id_op_materiaprima= $item['id_of_materiaprima'];   
	    $ids= explode(",",$id);       
            }



if($ids[0]==$id_op)
{
 $query0 = 'SELECT *  FROM uc2_op_registo where id_of='.$id_op_materiaprima .' and confirmado=1';
        $db0->query($query0);
        $result0 = $db0->result();
         foreach ($result0 as $key => $item){
            $i++;
     $id_op_re=$item['id_op'];      
        $etiqueta=$item['op'.$id_op_re.'_etiqueta']; 

     
$pieces = explode(",", $etiqueta);
foreach ($pieces as &$etiqueta ) {
        $query = 'SELECT * FROM uc2_etiquetasop'.$id_op_re.' where id_etiquetaop'.$id_op_re.'='.$etiqueta;
        $db->query($query);
        $result = $db->result();
         foreach ($result as $key => $item){
       $ops[$i]['valid']= $item['id_etiquetaop'.$id_op_re]; 
        $ops[$i]['valdesc']= $item['cod_etiquetaop'.$id_op_re]; 
    }

}


}
}else{
 
$key = array_search($id_op,$ids); // $key = 2;
$key=$key-1;
$id_op = $ids[$key];

 $query0 = 'SELECT *  FROM uc2_op_registo where id_of='.$id_of.' and id_op='.$id_op .' and confirmado=1';
        $db0->query($query0);
        $result0 = $db0->result();
         foreach ($result0 as $key => $item){
         
        $id_op_re=$item['id_op'];      
        $etiqueta=$item['op'.$id_op_re.'_etiqueta'];   
        $pieces = explode(",", $etiqueta);
foreach ($pieces as &$etiqueta ) {
   $i++;
  if($etiqueta!=""){
        //$query = 'SELECT * FROM uc2_etiquetasop'.$id_op_re.' where id_etiquetaop'.$id_op_re.'='.$etiqueta.' and id_calibres in(12)';
        $query = 'SELECT * FROM uc2_etiquetasop'.$id_op_re.' where id_etiquetaop'.$id_op_re.'='.$etiqueta.'';
        $db->query($query);
        $result = $db->result();
         foreach ($result as $key => $item){
       $ops[$i]['valid']= $item['id_etiquetaop'.$id_op_re]; 
        $ops[$i]['valdesc']= $item['cod_etiquetaop'.$id_op_re]; 
    }
    }
}
}

  
}



echo json_encode($ops);
?>
