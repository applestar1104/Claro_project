<?php
// selects

$db4 = Xcrud_db::get_instance();        
$query4 = 'SELECT * FROM  ib_ofs WHERE ib_ofs.activo=1';
$db4->query($query4);
$result4 = $db4->result();
$options="<option value='0'>Selecione O.F.</option>";
foreach ($result4 as $key4 => $item4){

 $id_of=$item4['id_of'];

 if(isset($_GET['id_of']) && $_GET['id_of']==$item4['id_of'])                { 
   $estado="selected"; 
} 
else { 
    $estado="";
}

$options.='<option value="'.$item4['id_of'].'"'.$estado.'>'.$id_of.'</option>'; }

echo '<div > <select class="xcrud-input form-control" id="id_of_select">'.$options.'</select></div><br>';
// fim selects
if(isset($_GET['id_of']))
{
   $id_of=$_GET['id_of'];



$db = Xcrud_db::get_instance();
$query = 'SELECT * FROM `ib_ofs` WHERE id_of='.$id_of;
$db->query($query);
$result = $db->result();
$arquivo= $result[0]['arquivo'];
$nome_of= $result[0]['id_of'];
   echo '<h3>'.$id_of.'</h3>';
if($arquivo==1)
{
    echo '<div id="btn_active" class="alert alert-danger"> <strong><h2>Arquivado</h2></strong></div>';
}
//$id= $result[0]['id_operacao'];
//$ids= explode(",",$id );
 //$op=$id;
 $xcrud = Xcrud::get_instance(); 
  $xcrud->table('ib_ofs');    
  //include('parametros_of.php');

  

    

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




}




       
    

echo '<a href="pages/uc2/arquivar_of.php?id_of='.$id_of.'" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Arquivar</a>';      


?>

<script type="text/javascript">

jQuery(document).on('ready xcrudafterrequest', function(event, container) {

    $('#id_of_select').change(function() {
        of=$('#id_of_select').val();
        window.location.href ='index.php?page=ib/resumo_of&id_of='+of;
    })


});




</script>

