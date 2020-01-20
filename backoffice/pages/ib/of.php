<?php

    $xcrud = Xcrud::get_instance();
    
    $variavel='of';
    
    // chama tabela
    $xcrud->table('ib_ofs');
    // nome da tabela
    $xcrud->table_name('Ordens de Tratamento');
    
    $xcrud->where('arquivo=0');
    // nome das label
    $xcrud->label('id_of','O.T.');
    $xcrud->label('id_cliente','Cliente');
    $xcrud->label('id_calibre','Calibre');
    $xcrud->label('id_qualidade','Qualidade');
    $xcrud->label('embalagens','N.º Sacos/Embalagens');
    $xcrud->label('tca_entrada_cliente_min','TCA Mín Cliente');
    $xcrud->label('tca_entrada_cliente_max','TCA Máx Cliente');  
    $xcrud->label('tca_entrada_empresa_min','TCA Mín Empresa');
    $xcrud->label('tca_entrada_empresa_max','TCA Máx Empresa');
    $xcrud->label('tca_final_min', 'TCA Final Mín');
    $xcrud->label('tca_final_max', 'TCA Final Máx');
    $xcrud->label('observacoes_gerais','Observações');
    $xcrud->column_name('tca_entrada_cliente_min', 'TCA Mín C');
    $xcrud->column_name('tca_entrada_cliente_max', 'TCA Máx C');
    $xcrud->column_name('tca_entrada_empresa_min', 'TCA Mín E');
    $xcrud->column_name('tca_entrada_empresa_max', 'TCA Máx E');
    $xcrud->label('tca_final_min', 'TCA Final Mín');
    $xcrud->label('tca_final_max', 'TCA Final Máx');
    $xcrud->column_tooltip('tca_entrada_cliente_min', 'TCA Mín Cliente');
    $xcrud->column_tooltip('tca_entrada_cliente_max', 'TCA Máx Cliente');
    $xcrud->column_tooltip('tca_entrada_empresa_min', 'TCA Mín Empresa');
    $xcrud->column_tooltip('tca_entrada_empresa_max', 'TCA Máx Empresa');
    $xcrud->pass_default('data',date('Y-m-d H:i:s'));
    //$xcrud->label('observacoes','Observações');
    // colunas a mostrar na listagem
    $xcrud->columns('id_of,id_cliente,id_calibre,id_qualidade,quantidade,observacoes_gerais,tca_entrada_cliente_min,tca_entrada_cliente_max,tca_entrada_empresa_min,tca_entrada_empresa_max,tca_final_min,tca_final_max,data,activo,arquivo');     // relações
    $xcrud->relation('criado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome  
	$xcrud->relation('id_cliente','ib_clientes','id_cliente','nome_cliente','id_cliente!=1 and activo=1');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('id_calibre','ib_calibres','id_calibre','nome_calibre','id_calibre!=1 and activo=1');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('id_qualidade','ib_qualidades','id_qualidade','nome_qualidade','id_qualidade!=1 and activo=1');//campo origem / tabela / destino / destino_nome  
	$xcrud->unset_remove();
	$xcrud->set_var('nome_tabela','ib_ofs');
    $xcrud->set_var('nome_campo','id_'.$variavel.'');
    $xcrud->set_var('accao','Inseriu');
    $xcrud->highlight('tca_entrada_cliente_min', '!=', 0, '#FFA500');
    $xcrud->highlight('tca_entrada_cliente_max', '!=', 0, '#FFA500');
    //$xcrud->highlight('tca_entrada_empresa_min', '!=', 0, 'green');
    //$xcrud->highlight('tca_entrada_empresa_max', '!=', 0, 'green');

    // logs e user
    $xcrud->after_insert('inserir_crud'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php
    
    //$xcrud->after_insert('prioridade_operacoes'); // automatic call of functions.php 
    //$xcrud->after_update('prioridade_operacoes_update'); // automatic call of functions.php 
    // column_callback
    $xcrud->column_callback('quantidade','numero_format');


	// activar/desactivar
 	$xcrud->column_callback('activo','estados_act');
 	
  	$xcrud->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
  	$xcrud->create_action('unpublish', 'unpublish_action');
  	
  	
  	$xcrud->column_callback('arquivo','estados_act_arquivo');
  	$xcrud->create_action('publish_arquivo', 'publish_action_arquivo'); // action callback, function publish_action() in functions.php
  	$xcrud->create_action('unpublish_arquivo', 'unpublish_action_arquivo');

  	// gravar dados no momento de criar 
  	$xcrud->pass_var('criado_em', date('Y-m-d H:i:s'),'create');
    $xcrud->pass_var('criado_por', $user_id,'create');
    // gravar dados no momento do actualizar
    $xcrud->pass_var('actualizado_em', date('Y-m-d H:i:s'),'edit');
    $xcrud->pass_var('actualizado_por', $user_id,'edit');

    // estes campos do criar e actualizar nao aparecem no editar nem no criar
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','arquivo'), true, true, 'edit');
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','tca_final_min','tca_final_max','arquivo'), true, true, 'create');
    
    	// botão para adicionar anexo
    $xcrud->button('index.php?page=ib/anexos&id_of={id_of}', false, 'glyphicon glyphicon-plus');

    
    $xcrud->highlight_row('activo','=','0','#EEE8AA'); // linha amarela se não tiver anexos
    
    $xcrud->sum('quantidade'); // sum row(), receives data from full table (ignores pagination)
    // botão para adicionar anexo
    //$xcrud->button('index.php?page=ib/anexos&id_of={id_of}', false, 'glyphicon glyphicon-plus');
    
// juntar tabela de anexos no view
    $anexos = $xcrud->nested_table('Anexos','id_of','ib_anexos','id_of'); // 2nd level 2
    $anexos->columns('id_tipodeanexo,nome_anexo,anexo');
    $anexos->column_callback('anexo','anexo_url');
    
$xcrud->order_by('id_of','desc');
    	//$xcrud->column_pattern('id_of','<a href="index.php?page=ib/resumo_of&id_of={id_of}">{id_of}</a>');
    
    // nome da tabela
    $anexos->table_name('Anexos');
    // label
    $anexos->label('nome_anexo','Nome do Anexo');
    $anexos->label('id_tipodeanexo','Tipo de Anexo');
    // relações
    $anexos->relation('id_tipodeanexo','ib_tiposdeanexos','id_tipodeanexo','nome_tipodeanexo'); //campo origem / tabela / destino / destino_nome
  $xcrud->fields(array('arquivo'), true);
    // esconder 
    $anexos->unset_add();
    $anexos->unset_edit();
    $anexos->unset_remove();
    $anexos->unset_print();
	$anexos->unset_csv();
	$anexos->unset_numbers();
	$anexos->unset_limitlist();
	$anexos->unset_search();
    
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