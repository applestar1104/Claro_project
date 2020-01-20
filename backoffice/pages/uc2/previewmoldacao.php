<?php
if(!class_exists('Xcrud')) {
include('../../../config/xcrud/xcrud.php');
}

if(isset($_GET['id_moldacao'])){
    $id_moldacao=$_GET['id_moldacao'];
 }
    elseif(isset($_GET['id_of']))  {

        $db0 = Xcrud_db::get_instance();
        $query0 = 'SELECT id_especificacaoproducaomoldacao FROM uc2_of where id_of='.$id_of;
        $db0->query($query0);
        $result0 = $db0->result();
        $id_moldacao=$result0[0]['id_especificacaoproducaomoldacao'];
   }


if($id_moldacao)
{ 
        $db = Xcrud_db::get_instance();
        $query = 'SELECT * FROM `uc2_especificacoesproducaomoldacao` where id_especificacaoproducaomoldacao='.$id_moldacao;
        $db->query($query);
        $result = $db->result();

	    $mistura = str_replace("\n", "<br>", $result[0]['mistura']);
	    $humidade = str_replace("\n", "<br>", $result[0]['humidade']);
	    $referenciacola = str_replace("\n", "<br>", $result[0]['referenciacola']);
	    $temperaturas = str_replace("\n", "<br>", $result[0]['temperaturas']);
	    $velocidadeciclo = str_replace("\n", "<br>", $result[0]['velocidadeciclo']);
	    $prensagem = str_replace("\n", "<br>", $result[0]['prensagem']);
	    $densidadecorpos = str_replace("\n", "<br>", $result[0]['densidadecorpos']);

$ops[0]['cod_html']='<div class="xcrud-list-container"><table class="xcrud-list table table-striped table-hover table-bordered">

<th>Mistura</th>
<th>Humidade</th>
<th>Referência da cola</th>
<th>Temperaturas</th>
<th>Velocidade de ciclo</th>
<th>Prensagem</th>
<th>Densidade</th>
 
<tbody>
  <tr>
     <td>'.$mistura.'</td>
     <td>'.$humidade.'</td>
     <td>'.$referenciacola.'</td>
     <td>'.$temperaturas.'</td>
     <td>'.$velocidadeciclo.'</td>
     <td>'.$prensagem.'</td>
     <td>'.$densidadecorpos.'</td>
  </tr>
</tbody>
</table></div>';


if(isset($_GET['id_moldacao']))
{
   echo json_encode($ops);
 }
 else
 {
    echo $ops[0]['cod_html'];
 }

}

?>
