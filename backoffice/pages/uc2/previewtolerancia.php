<?php
if(!class_exists('Xcrud')) {
include('../../../config/xcrud/xcrud.php');
}

if(isset($_GET['id_tolerancia'])){
    $id_tolerancia=$_GET['id_tolerancia'];
 }
    elseif(isset($_GET['id_of']))  {

        $db0 = Xcrud_db::get_instance();
        $query0 = 'SELECT id_toleranciaproducao FROM uc2_of where id_of='.$id_of;
        $db0->query($query0);
        $result0 = $db0->result();
        $id_tolerancia=$result0[0]['id_toleranciaproducao'];
   }

if($id_tolerancia)
{   
     $db = Xcrud_db::get_instance();
        $query = 'SELECT * FROM `uc2_toleranciasproducao` where id_toleranciaproducao='.$id_tolerancia;
        $db->query($query);
        $result = $db->result();
   
	    $comprimento = str_replace("\n", "<br>", $result[0]['comprimento']);
	    $diametro = str_replace("\n", "<br>", $result[0]['diametro']);
	    $chanfre = str_replace("\n", "<br>", $result[0]['chanfre']);
	    $humidade = str_replace("\n", "<br>", $result[0]['humidade']);
	    $peroxidos = str_replace("\n", "<br>", $result[0]['peroxidos']);
	    $forcadeextraccao = str_replace("\n", "<br>", $result[0]['forcadeextraccao']);

$ops[0]['cod_html']='<div class="xcrud-list-container"><table class="xcrud-list table table-striped table-hover table-bordered">

<th>Comprimento</th>
<th>Diâmetro</th> 
<th>Chanfre</th>
<th>Humidade</th>
<th>Peróxidos</th>
<th>Força de extraçcão</th>

<tbody>
  <tr>
     <td>'.$comprimento.'</td>
     <td>'.$diametro.'</td>
     <td>'.$chanfre.'</td>
     <td>'.$humidade.'</td>
     <td>'.$peroxidos.'</td>
     <td>'.$forcadeextraccao.'</td>
  </tr>
</tbody>
</table></div>';
if(isset($_GET['id_tolerancia'])){
   echo json_encode($ops);
 }
 else {
    echo $ops[0]['cod_html'];
 }
}

?>
