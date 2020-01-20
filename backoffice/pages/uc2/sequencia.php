<?php
include('../../../config/xcrud/xcrud.php');
$ano=$_GET['ano'];
 $semana=$_GET['semana'];
$ano=$_GET['ano'];
$tipo=$_GET['tipo'];

if($tipo==2 or  $tipo==3)
{
  $filtro= "(id_tiposdeproducao = 2 or id_tiposdeproducao = 3)";
  $start=6;
}

if($tipo==4 or $tipo==5)
{
  $filtro= "(id_tiposdeproducao = 4 or id_tiposdeproducao = 5 )";
  $start=0;
}

if($tipo==1)
{
  $filtro= "id_tiposdeproducao = 1";

}
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `sequencia` FROM `uc2_sequencia` where '.$filtro.' and ano='.$ano.' and semana='.$semana.' order by id_sequencia DESC LIMIT 1';
        $db->query($query);
        $result = $db->result();
        $count = count($result);
        if($count>0){
       	$seq= $result[0];
       }
       else{
        $seq= array ('sequencia'=>$start);
       }
           

//$arr = array ('item1'=>"I love jquery4u",'item2'=>"You love jQuery4u",'item3'=>"We love jQuery4u");
echo json_encode($seq);
?>
