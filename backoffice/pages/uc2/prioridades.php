<?php
include('../../../config/xcrud/xcrud.php');

$prioridade=$_GET['prioridade'];  
$id=$_GET['id'];  
//$id_op=$_GET['id_op'];   

        $db = Xcrud_db::get_instance();
       echo $query1 = 'UPDATE uc2_of_prioridades SET `prioridade` ='.$prioridade .' where id_prioridade='.$id;
        $db->query($query1);


?>
