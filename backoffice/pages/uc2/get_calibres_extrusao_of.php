<?php
if (!class_exists('Xcrud')) {
include('../../../config/xcrud/xcrud.php');
}

$id_of=$_GET['id_of'];
$ops = [];
$i=0;

 $db0 = Xcrud_db::get_instance();
        $query0 = 'SELECT id_calibre_extrusao FROM uc2_of where  id_of='.$id_of;
        $db0->query($query0);
        $result0 = $db0->result();
     $id= implode(",", $result0[0]);
    $ids= explode(",",$id );


$ops = [];
$i=0;    
$cont=sizeof($ids);
foreach ($ids as &$value ) {
    $i++;
     
    $db = Xcrud_db::get_instance();
        $query = 'SELECT * FROM uc2_calibres where id_calibre='.$value;
        $db->query($query);
        $result = $db->result();
         foreach ($result as $key => $item){
            $i++;
        $ops[$i]['valid']= $item['id_calibre'];
        $ops[$i]['valdesc']= $item['cod_calibre'];
         $ops[$i]['cont']= $cont;
      // $natureza=$item['id_natureza'];        
        
    }
         }



  echo json_encode($ops);
?>