<?php

    $xcrud = Xcrud::get_instance();
    
    $variavel='marca';
    
    // chama tabela
    $xcrud->table('uc2_marcas');
    // nome da tabela
    $xcrud->table_name('Marcas');
    // mostra todos os ids excepto o id=1
    $xcrud->where('id_'.$variavel.' !=',1);
    // nome das label
    $xcrud->label('cod_'.$variavel.'','Código');
    $xcrud->label('nome_'.$variavel.'','Nome');
    $xcrud->label('id_cliente','Cliente');
    $xcrud->label('id_tipodemarcacao','Tipo de Marcação');
    $xcrud->label('id_localdemarcacao','Local de Marcação');
    $xcrud->label('observacoes','Observações');

     $xcrud->set_attr('id_tipodemarcacao',array('id'=>'id_marcacao'));
     $xcrud->set_attr('id_localdemarcacao',array('id'=>'local_marcacao'));
    // upload de imagem
  

   $xcrud->change_type('marca', 'image', '', array('path'=>'../../uploads/marcas','thumbs' => 
    array(
        array(
            'width' => '300'), 
        array(
            'width' => 100,
            'height' => 100,
            'folder' => 'thumbs')
        )));



    // colunas a mostrar na listagem
    $xcrud->columns('cod_'.$variavel.',nome_'.$variavel.',id_cliente,id_tipodemarcacao,id_localdemarcacao,activo');
    // relações
    $xcrud->relation('criado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome  
	$xcrud->relation('id_cliente','uc2_clientes','id_cliente','nome_abreviado','uc2_clientes.activo = 1','id_cliente',false,false);
    $xcrud->relation('id_tipodemarcacao','uc2_tiposdemarcacao','id_tipodemarcacao','nome_tipodemarcacao','uc2_tiposdemarcacao.activo = 1 and uc2_tiposdemarcacao.id_tipodemarcacao!=1',false);
    $xcrud->relation('id_localdemarcacao','uc2_locaisdemarcacao','id_localdemarcacao','nome_localdemarcacao','uc2_locaisdemarcacao.activo = 1 and uc2_locaisdemarcacao.id_localdemarcacao!=1',true);
	
	$xcrud->set_var('nome_tabela','uc2_marcas');
    $xcrud->set_var('nome_campo','id_'.$variavel.'');
    $xcrud->set_var('accao','Inseriu');
	
    // logs e user
    $xcrud->after_insert('inserir_crud'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php

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
		
    echo $xcrud->render();


?>
<script type="text/javascript">
jQuery(document).on("xcrudafterrequest",function(event,container){
    if(Xcrud.current_task == 'save')
    {
        Xcrud.show_message(container,'Enviado com sucesso','success');
    }

valor=$('#id_marcacao').val();

if(valor==3)
{
  $('#local_marcacao').select2();
$("#local_marcacao").select2("readonly", true);


}
    $('#id_marcacao').select2().on("select2-selecting", function(e) {

     if(e.val=="3"){
 $('#local_marcacao').val(2);
  $('#local_marcacao').select2();
$("#local_marcacao").select2("readonly", true);
   }else{
$("#local_marcacao").select2("readonly", false);

   }



        })


});
</script>