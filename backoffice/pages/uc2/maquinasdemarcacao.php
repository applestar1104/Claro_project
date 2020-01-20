<?php

    $xcrud = Xcrud::get_instance();
    
    $variavel='maquinademarcacao';
    
    // chama tabela
    $xcrud->table('uc2_maquinasdemarcacao');
    // nome da tabela
    $xcrud->table_name('Máquinas de Marcação');
    // mostra todos os ids excepto o id=1
    $xcrud->where('id_'.$variavel.' !=',1);
    // nome das label
    $xcrud->label('cod_'.$variavel.'','Código');
    $xcrud->label('nome_'.$variavel.'','Nome');
    $xcrud->label('id_cliente','Cliente');
    $xcrud->label('id_tipodemarcacao','Tipo de Marcação');
    $xcrud->label('id_localdemarcacao','Local de Marcação');
    $xcrud->label('observacoes','Observações');

    // colunas a mostrar na listagem
    $xcrud->columns('cod_'.$variavel.',nome_'.$variavel.',id_tipodemarcacao,activo');
    // relações
    $xcrud->relation('criado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_tipodemarcacao','uc2_tiposdemarcacao','id_tipodemarcacao','nome_tipodemarcacao','uc2_tiposdemarcacao.activo = 1 and uc2_tiposdemarcacao.id_tipodemarcacao!=1',false);
    	
	$xcrud->set_var('nome_tabela','uc2_maquinasdemarcacao');
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
});
</script>