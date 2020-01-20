<?php

    $xcrud = Xcrud::get_instance();
    
    $variavel='anexo';
    
    // chama tabela
    $xcrud->table('uc2_anexos');
    // nome da tabela
    $xcrud->table_name('Anexos');
    // mostra todos os ids excepto o id=1
    $xcrud->where('id_'.$variavel.' !=',1);
    // nome das label
    $xcrud->label('id_of','O.F.');
    $xcrud->label('nome_'.$variavel.'','Nome do Anexo');
    $xcrud->label('id_tipodeanexo','Tipo de Anexo');
    $xcrud->label('observacoes','Observações');

    $xcrud->set_attr('id_tipodeanexo',array('id'=>'id_anexo'));
    // upload de imagem
  

   $xcrud->change_type('anexo', 'file', '', array('path'=>'../../uploads/anexos','thumbs' => 
    array(
        array(
            'width' => '300'), 
        array(
            'width' => 100,
            'height' => 100,
            'folder' => 'thumbs')
        )));



    // colunas a mostrar na listagem
    $xcrud->columns('id_of,nome_'.$variavel.',id_tipodeanexo,anexo,activo');
    // relações
    $xcrud->relation('criado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome  
	$xcrud->relation('id_of','uc2_of','id_of','nome_of');
	$xcrud->relation('id_tipodeanexo','uc2_tiposdeanexos','id_tipodeanexo','nome_tipodeanexo','id_tipodeanexo!=1 and activo=1'); //campo origem / tabela / destino / destino_nome
	$xcrud->set_attr('id_of',array('id'=>'id_of'));
	
	$xcrud->set_var('nome_tabela','uc2_anexos');
    $xcrud->set_var('nome_campo','id_'.$variavel.'');
    $xcrud->set_var('accao','Inseriu');
	
    // logs e user
    $xcrud->after_insert('inserir_anexo'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php

	$xcrud->column_callback('anexo','anexo_url');
	
	// activar/desactivar
 	$xcrud->column_callback('activo','estados_act');
  	$xcrud->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
  	$xcrud->create_action('unpublish', 'unpublish_action');

  	// gravar dados no momento de criar 
  	$xcrud->pass_var('criado_em', date('Y-m-d H:i:s'),'create');
    $xcrud->pass_var('criado_por', $user_id,'create');
    // gravar dados no momento do actualizar
    $xcrud->pass_var('actualizado_em', date('Y-m-d H:i:s'),'edit');
    $xcrud->pass_var('actualizado_por', $user_id,'edit');

    // estes campos do criar e actualizar nao aparecem no editar nem no criar
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','principal'), true, true, 'edit');
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','principal'), true, true, 'create');
		

if(isset($_GET['id_of']))
{
$id_of=$_GET['id_of'];
echo $xcrud->render('create'); 
echo '<script>id_of='.$id_of.'</script>';
}else{ 
   echo $xcrud->render();
}

?>
<script type="text/javascript">
jQuery(document).on("xcrudafterrequest",function(event,container){
    if(Xcrud.current_task == 'save')
    {
        Xcrud.show_message(container,'Enviado com sucesso','success');
    }


});
if(id_of)
$('#id_of').val(id_of);
</script>