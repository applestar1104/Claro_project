<?php
if (!class_exists('Xcrud')) {
include('../../../config/xcrud/xcrud.php');
}

if(isset($_GET['id_extrusao'])){
    $id_extrusao=$_GET['id_extrusao'];
 }
    elseif(isset($_GET['id_of']))  {

        $db0 = Xcrud_db::get_instance();
        $query0 = 'SELECT id_especificacaoproducaoextrusao FROM uc2_of where id_of='.$id_of;
        $db0->query($query0);
        $result0 = $db0->result();
        $id_extrusao=$result0[0]['id_especificacaoproducaoextrusao'];
   }

if($id_extrusao)
{ 


        $db = Xcrud_db::get_instance();
        $query = 'SELECT * FROM `uc2_especificacoesproducaoextrusao` where id_especificacaoproducaoextrusao='.$id_extrusao;
        $db->query($query);
        $result = $db->result();

	    $humidadedamistura = str_replace("\n", "<br>", $result[0]['humidadedamistura']);
	    $temperaturasdasmaquinas = str_replace("\n", "<br>", $result[0]['temperaturasdasmaquinas']);
	    $velocidadedasmaquinas = str_replace("\n", "<br>", $result[0]['velocidadedasmaquinas']);
	    $comprimentodosbastoescorpos = str_replace("\n", "<br>", $result[0]['comprimentodosbastoescorpos']);
	    $densidade= str_replace("\n", "<br>", $result[0]['densidade']);
	
$ops[0]['cod_html']='<div class="xcrud-list-container"><table class="xcrud-list table table-striped table-hover table-bordered">
<thead>
<tr class="xcrud-th">
<th>Humidade da mistura</th>
<th>Temperaturas das máquinas</th> 
<th>Velocidade das máquinas</th>
<th>Comprimento dos bastões/corpos</th>
<th>Densidade</th>
</tr>
 </thead>
<tbody>
  <tr>
     <td>'.$humidadedamistura.'</td>
     <td>'.$temperaturasdasmaquinas.'</td>
     <td>'.$velocidadedasmaquinas.'</td>
     <td>'.$comprimentodosbastoescorpos.'</td>
     <td>'.$densidade.'</td>
  </tr>
</tbody>
</table></div>';
if(isset($_GET['id_extrusao']))
{
   echo json_encode($ops);
 }
 else
 {
    echo $ops[0]['cod_html'];
 }
}

?>

