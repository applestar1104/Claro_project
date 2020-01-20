<?php

// function to reloadPage

function reloadPage($primary, $xcrud)
{
echo "<script type='text/javascript'>";
echo "location.reload();";
echo "</script>";
}

function arquivar_of($xcrud)
{ 
   $db = Xcrud_db::get_instance();
        $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query = 'UPDATE ib_of SET `arquivo` = 1, `activo`=0 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query);
    echo "<script>$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);</script>";
 //   echo "<script> Xcrud.show_message(container,'Enviado com sucesso','success')</script>";

}


function download_pdf($value, $fieldname, $primary_key, $row, $xcrud){
  $id=$primary_key;
return "<a href='pages/gestaodocs/download.php?id=$id'>".$value."</a>";
}


function fix_entrada($value, $fieldname, $primary_key, $row, $xcrud)
{

$save="";
$pieces = explode(",", $value);

 
foreach ($pieces as &$value ) {


 $id_op=$row['uc2_op_registo.id_op'];
 $id_of=$row['uc2_op_registo.id_of'];


  $i=0;
  $db0 = Xcrud_db::get_instance();
  $query0 = 'SELECT *  FROM uc2_of where id_of='.$id_of;
  $db0->query($query0);
  $result0 = $db0->result();
  foreach ($result0 as $key => $item){
    $i++;
    $id= $item['id_operacao'];   
    $id_op_materiaprima= $item['id_of_materiaprima'];   
    $ids= explode(",",$id);       

}

if($ids[0]==$id_op){

 

 $query0 = 'SELECT *  FROM uc2_op_registo where id_of='.$id_op_materiaprima;
        $db0->query($query0);
        $result0 = $db0->result();
         foreach ($result0 as $key => $item){
            $i++;
     $op=$item['id_op'];      
    }

}
else{   
$key = array_search($id_op,$ids); // $key = 2;
$key=$key-1;
$op = $ids[$key];

}


//return $op;
  $db = Xcrud_db::get_instance();
  $query = 'SELECT * FROM uc2_etiquetasop'.$op.' where id_etiquetaop'.$op.'='.$value;
  $db->query($query);
  $result = $db->result();

 $save.=$result[0]['cod_etiquetaop'.$op]." ,";     
}
 return  trim($save, ",");


}



function estados_act($value, $fieldname, $primary_key, $row, $xcrud)
{
    if($value==0)
    {

    return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="ativa" data-task="action" data-action="publish" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-remove state-0"></i></a><span class="print">N達o</span>';
    }
    else
    {
 return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="desativa" data-task="action" data-action="unpublish" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-ok state-1"></i></a><span class="print">Sim</span>';
    
    }

}

function estados_act_arquivo($value, $fieldname, $primary_key, $row, $xcrud)
{
    if($value==0)
    {

    return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="Arquivar O.T." data-task="action" data-action="publish_arquivo" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-lock state-0"></i></a><span class="print">Não</span>';
    }
    else
    {
 return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="desativa" data-task="action" data-action="unpublish_arquivo" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-ok state-1"></i></a><span class="print">Sim</span>';
    
    }

}


function boleano($value)
{
  if($value=1)
return "Sim";
else
return "N達o";
  
}



function anexo_url($value, $fieldname, $primary_key, $row, $xcrud)
{
    return '<a href="../uploads/anexos/'.$value.'" target="_BLANK">'.$value.'</a>';

}





function estados_act2($value, $fieldname, $primary_key, $row, $xcrud)
{

    if($value==0)
    {

    return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="ativa" data-task="action" data-action="publish2" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-remove state-0"></i></a><span class="print">N達o</span>';

    }
    else
    {
 return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="desativa" data-task="action" data-action="unpublish2" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-ok state-1"></i></a><span class="print">Sim</span>';
    
    }

}

function estados_act3($value, $fieldname, $primary_key, $row, $xcrud)
{

    if($value==0)
    {

    return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="ativa" data-task="action" data-action="publish3" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-remove state-0"></i></a><span class="print">N達o</span>';

    }
    else
    {
 return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="desativa" data-task="action" data-action="unpublish3" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-ok state-1"></i></a><span class="print">Sim</span>';
    
    }

}


function trimnumero($postdata, $primary){

      $quantidade=$postdata->get('quantidade');
      $quantidade = str_replace(' ', '',  $quantidade);
      $postdata->set('quantidade',  $quantidade);
}

function get_ref($value, $fieldname, $primary, $row, $xcrud)
{


     $db = Xcrud_db::get_instance();
        $query = 'SELECT `id_tiposdeproducao`,`ano`,`semana`,`sequencia`  FROM `uc2_of` where id_of='.$value;
        $db->query($query);
        $result = $db->result();
        foreach ($result as $key => $item){
             $tipo=$item['id_tiposdeproducao'];
             $ano=$item['ano'];
             $semana=$item['semana'];
             $sequencia=$item['sequencia'];
            }


        $db = Xcrud_db::get_instance();
        $query = 'SELECT `cod_tiposdeproducao` FROM `uc2_tiposdeproducao` where id_tiposdeproducao='.$tipo;
        $db->query($query);
        $result = $db->result();
        foreach ($result as $key => $item){
             $tipo=$item['cod_tiposdeproducao'];
            }

        return  $tipo."/".$ano."/".$semana."/".$sequencia;
}


function estados_principal($value, $fieldname, $primary_key, $row, $xcrud)
{
    if($value==0)
    {
    return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="ativa" data-task="action" data-action="principal" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-remove state-0"></i></a>';
    }
    else
    {
 return '<a class="btn btn-default btn-sm xcrud-action" href="#" title="desativa" data-task="action" data-action="notprincipal" data-primary="'.$primary_key.'"> 
    <i class="glyphicon glyphicon-ok state-1"></i></a>';
    
    }

}

function verify_password($postdata, $primary, $xcrud)
{   
   $p1= $postdata->get('password');
   $p2= $postdata->get('confirmar_password');
    if($p1!=$p2){
     $xcrud->set_exception('password','Password nao coincide.','error');
     echo "<script>Xcrud.show_message('.xcrud-ajax','Password nao coincide','error')</script>";
     }

}

function  inserir_anexo($postdata, $primary, $xcrud){
  $id_of= $postdata->get('id_of');
inserir_crud($postdata, $primary,$xcrud);

        $db = Xcrud_db::get_instance();
        $query = 'SELECT `anexos` FROM `uc2_of` where id_of='.$id_of;
        $db->query($query);
        $result = $db->result();
        foreach ($result as $key => $item){
             $anexos=$item['anexos'];
            }
     
$db = Xcrud_db::get_instance();          
 $anexos=$anexos+1;
$query ='UPDATE uc2_of SET `anexos` =  "'.$anexos.'"  WHERE  id_of ='.$id_of;
$db->query($query); 

}

function  inserir_etiquetas($postdata, $primary, $xcrud){
inserir_crud($postdata, $primary,$xcrud);

 $db = Xcrud_db::get_instance();
        $query = 'SELECT `cod_calibre` FROM `uc2_calibres` where id_calibre='.$primary;
        $db->query($query);
        $result = $db->result();
        foreach ($result as $key => $item){
             $codigo_calibre=$item['cod_calibre'];
            }


  $db2 = Xcrud_db::get_instance();       

$data=date('Y-m-d H:i:s');
$user_id=$_SESSION['jigowatt']['user_id'];
for ($x = 1; $x <= 100; $x++) {
$etiqueta="Ext ".$x.' '.$codigo_calibre;
 $query ='INSERT INTO  `uc2_etiquetasop1`
(cod_etiquetaop1,nome_etiquetaop1,id_calibres,criado_por,criado_em,activo) VALUES ("'.$etiqueta.'", "'.$etiqueta.'", "'.$primary.'", "'.$user_id.'","'.$data.'", "1")';
$db2->query($query); 
} 



}

function prioridade_operacoes($postdata, $primary, $xcrud){

  $db = Xcrud_db::get_instance();
  $id_op= $postdata->get('id_operacao');
  $id_of= $primary;
    

$ids= explode(",", $id_op);   
foreach ($ids as &$value ) {
$array_user[]=$value;
 $query ='INSERT INTO  `ib_ofs_prioridades`
(id_of,id_op,prioridade) VALUES ("'.$id_of.'", "'.$value.    '", "'.$id_of.'")';
$db->query($query); 
}


$id_ordem= $postdata->get('id_ordem_operacao');
     $db = Xcrud_db::get_instance();
        $query = 'SELECT `id_operacao` FROM `uc2_ordem_operacoes` where id_ordem_operacao='.$id_ordem;
        $db->query($query);
        $result = $db->result();      
        $id= implode(",", $result[0]);
        $array_bd= explode(",",$id );


foreach ($array_bd as &$valor_array_db ) {
if(!in_array($valor_array_db, $array_user)) {
   $array_bd = array_diff($array_bd, array($valor_array_db));
}
}


$ano= $postdata->get('ano');
$semana= $postdata->get('semana');
$tipo= $postdata->get('id_tiposdeproducao');
$sequencia= $postdata->get('sequencia');
$db = Xcrud_db::get_instance();
$query ='INSERT INTO uc2_sequencia
(id_tiposdeproducao,ano,semana,sequencia) 
VALUES ("'.$tipo.'", "'.$ano.    '", "'.$semana.'","'.$sequencia.'")';
$db->query($query); 
      



        $db = Xcrud_db::get_instance();
        $query = 'SELECT `cod_tiposdeproducao` FROM `uc2_tiposdeproducao` where id_tiposdeproducao='.$tipo;
        $db->query($query);
        $result = $db->result();
        foreach ($result as $key => $item){
             $tipo=$item['cod_tiposdeproducao'];
            }


$id_operacao_array= implode(",",$array_bd);
     
$db = Xcrud_db::get_instance();          
$nome_of=$tipo."/".$ano."/".$semana."/".$sequencia;
$query ='UPDATE uc2_of SET `nome_of` =  "'.$nome_of.'", `id_operacao` =  "'.$id_operacao_array.'"  WHERE  id_of ='.$primary;
$db->query($query); 
inserir_crud($postdata, $primary,$xcrud);


}



function prioridade_operacoes_update($postdata, $primary, $xcrud){

  $db = Xcrud_db::get_instance();
  $id_op= $postdata->get('id_operacao');
  $id_of= $primary;

$query ='DELETE  FROM uc2_of_prioridades  WHERE  `id_of` ='.$id_of;
$db->query($query); 

prioridade_operacoes($postdata, $primary, $xcrud);

/*echo "asd";


 $db = Xcrud_db::get_instance();
  $id_op= $postdata->get('id_operacao');
  $id_of= $primary;
      
$ids= explode(",", $id_op);   
foreach ($ids as &$value ) {
 $query ='SELECT * FROM  `uc2_of_prioridades` ';
$db->query($query); 
}

//DELETE FROM uc2_of_prioridades
//WHERE id_op NOT IN($id_of);
    


 $query ='SELECT * FROM  `uc2_of_prioridades` ';
$db->query($query); 

//update_tabela($postdata, $primary,$xcrud);
*/
}



function operacoes($value, $fieldname, $primary, $row, $xcrud)
{

       $ids= explode(",",$value );
       
  
$i=0;
$op="";
foreach ($ids as &$value ) {
    $i++;
    $db = Xcrud_db::get_instance();
    $query = 'SELECT `cod_operacao` FROM `uc2_operacoes` where id_operacao='.$value; 
    $db->query($query); 
    $result = $db->result();
    $op.=" - ". implode(",",$result[0]); 
}

      

    return $op;  

}


function principal_action($xcrud)
{ 

    if ($xcrud->get('primary'))
    {
     $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
   $db = Xcrud_db::get_instance();
    $query = 'SELECT `activo` FROM '.$tabela.' WHERE '.$campo.' = ' . (int)$xcrud->get('primary'); 
    $db->query($query); 
    $result = $db->result();
    $activo_result=$result[0]['activo']; 

    if($activo_result==0)   {
     $xcrud->set_exception('password','Your password is too simple.','error');
     echo "<script>Xcrud.show_message('.xcrud-ajax','Ative o item antes de o predefenir','error')</script>";
    }
    
    }

    if ($xcrud->get('primary') and $activo_result==1)
    {
      
        $db = Xcrud_db::get_instance();
        $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query1 = 'UPDATE '.$tabela.' SET `principal` = 0';
        $query2 = 'UPDATE '.$tabela.' SET `principal` = 1 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query1);
        $db->query($query2);

/*log db*/
$db = Xcrud_db::get_instance();
$accao="default";
$tabela = "linguas";
$primary=$xcrud->get('primary');
$date=date("Y-m-d H:i:s");
$user_id=$_SESSION['jigowatt']['user_id'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$cidade=$details->city;
$pais=$details->country; 
$local=$cidade.'('.$pais.')';
$maquina= $_SESSION['jigowatt']['maquina'];
$query ='INSERT INTO log_crud
( 
id_user,
formulario,
accao,
id_tabela,
local,
ip,
maquina,
data) 
VALUES 
("'.$user_id.'", 
"'.$tabela.'", 
"'.$accao.'",
"'.$primary.'",
"'.$local.'",
"'.$ip.'",
"'.$maquina.'",
"'.$date.'"
)';
$db->query($query); 
/*log db*/


    }
}


function publish_action2($xcrud)
{ 
   $db = Xcrud_db::get_instance();
        $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query = 'UPDATE '.$tabela.' SET `activo_materiaprima` = 1 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query);
    echo "<script>$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);</script>";
 //   echo "<script> Xcrud.show_message(container,'Enviado com sucesso','success')</script>";

}

function unpublish_action2($xcrud)
{ 
   $db = Xcrud_db::get_instance();
        $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query = 'UPDATE '.$tabela.' SET `activo_materiaprima` = 0 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query);
           echo "<script>$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);</script>";

}

function publish_action3($xcrud)
{ 
   $db = Xcrud_db::get_instance();
        $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query = 'UPDATE '.$tabela.' SET `confirmado` = 1 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query);
    echo "<script>$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);</script>";
 //   echo "<script> Xcrud.show_message(container,'Enviado com sucesso','success')</script>";

}

function unpublish_action3($xcrud)
{ 
   $db = Xcrud_db::get_instance();
        $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query = 'UPDATE '.$tabela.' SET `confirmado` = 0 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query);
           echo "<script>$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);</script>";

}

function publish_action($xcrud)
{ 
   
    if ($xcrud->get('primary'))
    {
    
        $db = Xcrud_db::get_instance();
        $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query = 'UPDATE '.$tabela.' SET `activo` = 1 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query);

 echo "<script>$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);</script>";
        /*log db*/
$db = Xcrud_db::get_instance();
$accao="Activo";
$primary=$xcrud->get('primary');
$date=date("Y-m-d H:i:s");
$user_id=$_SESSION['jigowatt']['user_id'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$cidade=$details->city;
$pais=$details->country; 
$local=$cidade.'('.$pais.')';
$maquina= $_SESSION['jigowatt']['maquina'];
$query ='INSERT INTO log_crud
( 
id_user,
formulario,
accao,
id_tabela,
local,
ip,
maquina,
data) 
VALUES 
("'.$user_id.'", 
"'.$tabela.'", 
"'.$accao.'",
"'.$primary.'",
"'.$local.'",
"'.$ip.'",
"'.$maquina.'",
"'.$date.'"
)';
$db->query($query); 
/*log db*/

    }
}



function unpublish_action($xcrud)
{
   
    if ($xcrud->get('primary'))
    {
       
        $db = Xcrud_db::get_instance();
         $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query = 'UPDATE '.$tabela.' SET `activo` = 0 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query);
 echo "<script>$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);</script>";
          /*log db*/
$db = Xcrud_db::get_instance();
$accao="Inactivo";
$primary=$xcrud->get('primary');
$date=date("Y-m-d H:i:s");
$user_id=$_SESSION['jigowatt']['user_id'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$cidade=$details->city;
$pais=$details->country; 
$local=$cidade.'('.$pais.')';
$maquina= $_SESSION['jigowatt']['maquina'];
$query ='INSERT INTO log_crud
( 
id_user,
formulario,
accao,
id_tabela,
local,
ip,
maquina,
data) 
VALUES 
("'.$user_id.'", 
"'.$tabela.'", 
"'.$accao.'",
"'.$primary.'",
"'.$local.'",
"'.$ip.'",
"'.$maquina.'",
"'.$date.'"
)';
$db->query($query); 
/*log db*/
    }
}

function exception_example($postdata, $primary, $xcrud)
{
    $xcrud->set_exception('ban_reason', 'Lol!', 'error');
    $postdata->set('ban_reason', 'lalala');
}




function numero_format($value, $fieldname, $primary, $row, $xcrud)
{
   $numero_format = number_format($value, 0, ',', ' ');
    return $numero_format;
}


function teste($xcrud)
{
    echo '- nice!';
}

function test_column_callback($value, $fieldname, $primary, $row, $xcrud)
{
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $xcrud)
{
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if ($ext != 'pdf' && $field == 'uploads.simple_upload')
    {
        unlink($file_path);
        $xcrud->set_exception('simple_upload', 'This is not PDF', 'error');
    }
}

function date_example($postdata, $primary, $xcrud)
{
    $created = $postdata->get('datetime')->as_datetime();
    $postdata->set('datetime', $created);
}

function movetop($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != 0)
            {
                array_splice($result, $key - 1, 0, array($item));
                unset($result[$key + 1]);
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function movebottom($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != $count - 1)
            {
                unset($result[$key]);
                array_splice($result, $key + 1, 0, array($item));
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}



function format_nivel($postdata, $primary){
$value2="";
$array = $postdata->get('nivel');
$b= explode(",", $array);
$contagem = count($b);
$i=0;

foreach ($b as &$value) {
  if($value<9){
    $s=1;
  }
  else
    $s=2;
$value2.= 'i:'.$i.';s:'.$s.':'.'"'.$value.'";';
$i++;
}

$begin='a:'.$contagem.':{';
$meiofim=$begin.$value2."}";
$postdata->set('user_level', $meiofim);

}
function format_nivel_insert($postdata, $primary,$xcrud){
format_nivel($postdata, $primary, $xcrud);
verify_password($postdata, $primary, $xcrud);
}

// Clientes
function inserir_tabela($postdata, $primary,$xcrud ){
$db = Xcrud_db::get_instance();

$user = $postdata->get('nif');
$email = $postdata->get('email');

$readonly=$postdata->get('read-only');
$lingua=$postdata->get('lingua');
$name=$postdata->get('nome_abreviado');

if($xcrud){
$level=$xcrud->get_var('level');
$nivel=$xcrud->get_var('nivel');

$data_inicio=$xcrud->get_var('data_inicio');
$data_fim=$xcrud->get_var('data_fim');
if($readonly==1)
{
$level=$xcrud->get_var('level_read');
$nivel=$xcrud->get_var('nivel_read');  
}
$tabela = $xcrud->get_var('nome_tabela');
}


$password = md5($postdata->get('password'));
$accao = 'Inseriu';
$date=date("Y-m-d H:i:s");
$user_id=$_SESSION['jigowatt']['user_id'];
$restricted = $postdata->get('login_activo');

if($restricted==0)
{

    $restricted=1;
}
else
{
    $restricted=0;
}
$query ="INSERT INTO login_users 
(
restricted,
user_level,
username,
name,
email,
password,
nivel,
lingua,
tabela,
id_tabela,
data_inicio,
data_fim
) 
VALUES 
(
'".$restricted."',
'".$level."', 
'".$user."', 
'".$name."', 
'".$email."',
'".$password."',
'".$nivel."',
'".$lingua."',
'".$tabela."',
'".$primary."',
'".$data_inicio."',
'".$data_fim."'
)";
$db->query($query);     


$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$cidade=$details->city;
$pais=$details->country; 
$local=$cidade.'('.$pais.')';
$maquina= $_SESSION['jigowatt']['maquina'];
$query ='INSERT INTO log_crud
( 
id_user,
formulario,
accao,
id_tabela,
local,
ip,
maquina,
data) 
VALUES 
("'.$user_id.'", 
"'.$tabela.'", 
"'.$accao.'",
"'.$primary.'",
"'.$local.'",
"'.$ip.'",
"'.$maquina.'",
"'.$date.'"
)';
$db->query($query); 

}




function update_tabela($postdata, $primary, $xcrud ){

$db = Xcrud_db::get_instance();


$user = $postdata->get('nif');
$email = $postdata->get('email');
$lingua=$postdata->get('lingua');
$name=$postdata->get('nome_abreviado');
$readonly=$postdata->get('read-only');

if($xcrud){
$level=$xcrud->get_var('level');
$nivel=$xcrud->get_var('nivel');
$nome=$xcrud->get_var('nivel');

if($readonly==1)
{
$level=$xcrud->get_var('level_read');
$nivel=$xcrud->get_var('nivel_read');  
}
$tabela = $xcrud->get_var('nome_tabela');
}



$accao = 'Editou';
$date=date("Y-m-d H:i:s");
$user_id=$_SESSION['jigowatt']['user_id'];
$restricted = $postdata->get('login_activo');

if($restricted==1)
{

    $restricted=0;
}
else
{
    $restricted=0;
}

if($postdata->get('password')!="")
{
$password = md5($postdata->get('password'));
$query ="UPDATE login_users SET restricted='$restricted', username='$user', email='$email', lingua='$lingua', password = '$password' Where tabela='$tabela' and id_tabela='$primary'";
}else{
$query ="UPDATE login_users SET restricted='$restricted', username='$user', email='$email', name='$name', lingua='$lingua' Where tabela='$tabela' and id_tabela='$primary'";

}

$db->query($query);   

$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$cidade=$details->city;
$pais=$details->country; 
$local=$cidade.'('.$pais.')';
$maquina= $_SESSION['jigowatt']['maquina'];
$query ='INSERT INTO log_crud
( 
id_user,
formulario,
accao,
id_tabela,
local,
ip,
maquina,
data) 
VALUES 
("'.$user_id.'", 
"'.$tabela.'", 
"'.$accao.'",
"'.$primary.'",
"'.$local.'",
"'.$ip.'",
"'.$maquina.'",
"'.$date.'"
)';
$db->query($query); 

}






function inserir_crud($postdata, $primary,$xcrud ){
$db = Xcrud_db::get_instance();

$accao=$xcrud->get_var('accao');
$tabela = $xcrud->get_var('nome_tabela');

$date=date("Y-m-d H:i:s");
$user_id=$_SESSION['jigowatt']['user_id'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$cidade=$details->city;
$pais=$details->country; 
$local=$cidade.'('.$pais.')';
$maquina= $_SESSION['jigowatt']['maquina'];
$query ='INSERT INTO log_crud
( 
id_user,
formulario,
accao,
id_tabela,
local,
ip,
maquina,
data) 
VALUES 
("'.$user_id.'", 
"'.$tabela.'", 
"'.$accao.'",
"'.$primary.'",
"'.$local.'",
"'.$ip.'",
"'.$maquina.'",
"'.$date.'"
)';
$db->query($query); 

}


function verify_lingua($postdata, $primary, $xcrud)
{   
   $p1=$postdata->get('lingua');
 
    if($p1=="1")
    {
     $xcrud->set_exception('lingua_obs','Defina o nome da lingua.','error');   
     }else
     {
     echo "<script>  Xcrud.show_message(container,'Enviado com sucesso','success')</script>";
     }

}

function verify_lingua_insert($postdata, $xcrud)
{   
  $p1=$postdata->get('lingua');
 
    if($p1=="1")
    {
     $xcrud->set_exception('lingua_obs','Defina o nome da lingua.','error');   
     }else
     {
     echo "<script>  Xcrud.show_message(container,'Enviado com sucesso','success')</script>";
     }

}

function publish_action_arquivo($xcrud)
{ 
   
    if ($xcrud->get('primary'))
    {
    
        $db = Xcrud_db::get_instance();
        $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query = 'UPDATE '.$tabela.' SET `arquivo` = 1, `activo` = 0 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query);

 echo "<script>$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);</script>";
        /*log db*/
$db = Xcrud_db::get_instance();
$accao="Activo";
$primary=$xcrud->get('primary');
$date=date("Y-m-d H:i:s");
$user_id=$_SESSION['jigowatt']['user_id'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$cidade=$details->city;
$pais=$details->country; 
$local=$cidade.'('.$pais.')';
$maquina= $_SESSION['jigowatt']['maquina'];
$query ='INSERT INTO log_crud
( 
id_user,
formulario,
accao,
id_tabela,
local,
ip,
maquina,
data) 
VALUES 
("'.$user_id.'", 
"'.$tabela.'", 
"'.$accao.'",
"'.$primary.'",
"'.$local.'",
"'.$ip.'",
"'.$maquina.'",
"'.$date.'"
)';
$db->query($query); 
/*log db*/

    }
}



function unpublish_action_arquivo($xcrud)
{
   
    if ($xcrud->get('primary'))
    {
       
        $db = Xcrud_db::get_instance();
         $tabela = $xcrud->get_var('nome_tabela');
        $campo=$xcrud->get_var('nome_campo');
        $query = 'UPDATE '.$tabela.' SET `activo` = 0 WHERE '.$campo.' = ' . (int)$xcrud->get('primary');
        $db->query($query);
 echo "<script>$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);</script>";
          /*log db*/
$db = Xcrud_db::get_instance();
$accao="Inactivo";
$primary=$xcrud->get('primary');
$date=date("Y-m-d H:i:s");
$user_id=$_SESSION['jigowatt']['user_id'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$cidade=$details->city;
$pais=$details->country; 
$local=$cidade.'('.$pais.')';
$maquina= $_SESSION['jigowatt']['maquina'];
$query ='INSERT INTO log_crud
( 
id_user,
formulario,
accao,
id_tabela,
local,
ip,
maquina,
data) 
VALUES 
("'.$user_id.'", 
"'.$tabela.'", 
"'.$accao.'",
"'.$primary.'",
"'.$local.'",
"'.$ip.'",
"'.$maquina.'",
"'.$date.'"
)';
$db->query($query); 
/*log db*/
    }
}




