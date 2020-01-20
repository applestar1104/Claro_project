<?php
// selects

$db4 = Xcrud_db::get_instance();        
$query4 = 'SELECT * FROM  uc2_of WHERE  uc2_of.activo=1';
$db4->query($query4);
$result4 = $db4->result();
$options="<option value='0'>Selecione O.F.</option>";
foreach ($result4 as $key4 => $item4){

 $nome_of=$item4['nome_of'];

 if(isset($_GET['id_of']) && $_GET['id_of']==$item4['id_of'])                { 
   $estado="selected"; 
} 
else { 
    $estado="";
}

$options.='<option value="'.$item4['id_of'].'"'.$estado.'>'.$nome_of.'</option>'; }

echo '<div > <select class="xcrud-input form-control" id="id_of_select">'.$options.'</select></div><br>';
// fim selects
if(isset($_GET['id_of']))
{
   $id_of=$_GET['id_of'];



$db = Xcrud_db::get_instance();
$query = 'SELECT * FROM `uc2_of` WHERE id_of='.$id_of;
$db->query($query);
$result = $db->result();
$arquivo= $result[0]['arquivo'];
$nome_of= $result[0]['nome_of'];
   echo '<h3>'.$nome_of.'</h3>';
if($arquivo==1)
{
    echo '<div id="btn_active" class="alert alert-danger"> <strong><h2>Arquivado</h2></strong></div>';
}
$id= $result[0]['id_operacao'];
$ids= explode(",",$id );
 $op=$id;
 $xcrud = Xcrud::get_instance(); 
  $xcrud->table('uc2_of');    
  include('parametros_of.php');

  

    if($op==1){
   
        $xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre_extrusao,uc2_of.id_qualidade_extrusao, uc2_of.id_linha_extrusao, uc2_of.id_especificacaoproducaoextrusao, uc2_of.extrusao_alteracoesespecificacoes'); 

        }
        
        // Operação Moldação
       elseif($op==2){

        $xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre_moldacao,uc2_of.id_qualidade_moldacao, uc2_of.id_especificacaoproducaomoldacao, uc2_of.id_especificacaoproducaomoldacao,uc2_of.moldacao_alteracoesespecificacoes'); 
        //$xcrud->before_list('get_moldacao');      
        }
        else
        {
              $xcrud->columns('uc2_of.nome_of'); 

        }
   

    

  $xcrud->where('id_of =',  $id_of);
  $xcrud->unset_add();
    $xcrud->unset_edit();
    $xcrud->unset_remove();
    $xcrud->unset_print();
    $xcrud->unset_csv();
    $xcrud->unset_numbers();
    $xcrud->unset_limitlist();
    $xcrud->unset_search();
echo $xcrud->render();

 if($op==1)           
    include('pages/uc2/previewextrusao.php');

  if($op==2)           
    include('pages/uc2/previewmoldacao.php');
 $entrou=0;

foreach ($ids as &$value ) {
if(($value==3 || $value==4 || $value==5 || $value==6 || $value==7 || $value==8) and $entrou==0){ 
     $entrou=1;          
    include('pages/uc2/previewtolerancia.php');
}
if($value==6)  
    include('pages/uc2/previewmarca.php');

}

foreach ($ids as &$value ) {


        $db2 = Xcrud_db::get_instance();
          $query2 = 'SELECT `id_operacao`,`cod_operacao` FROM `uc2_operacoes` where id_operacao='.$value;
        $db2->query($query2);
        $result2 = $db2->result();

        foreach ($result2 as $key => $item){     
        $titulo_tabela= $item['cod_operacao'];
       }

    $op=$value;
   
    
    include('pages/uc2/get_registos_op_of.php');
} 
echo '<a href="pages/uc2/arquivar_of.php?id_of='.$id_of.'" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Arquivar</a>';      
}

?>

<script type="text/javascript">

jQuery(document).on('ready xcrudafterrequest', function(event, container) {

    $('#id_of_select').change(function() {
        of=$('#id_of_select').val();
        window.location.href ='index.php?page=uc2/resumo_of&id_of='+of;
    })


});




</script>

