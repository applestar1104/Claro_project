<?php

    $xcrud = Xcrud::get_instance();
    
    $variavel='registo';
    
    // chama tabela
    $xcrud->table('ib_registos');
    // nome da tabela
    $xcrud->table_name('Registos');
    // nome das label
    $xcrud->label('id_of','O.F.');
    $xcrud->label('id_cliente','Cliente');
    $xcrud->label('tca','TCA');   
    $xcrud->label('observacoes_gerais','Observações Gerais');
    //$xcrud->label('observacoes','Observações');
    // colunas a mostrar na listagem
    $xcrud->columns('id_of,quantidade_registo,activo');     // relações
    $xcrud->relation('criado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome  
	$xcrud->relation('id_cliente','ib_clientes','id_cliente','nome_cliente');//campo origem / tabela / destino / destino_nome
	
	$xcrud->set_var('nome_tabela','ib_registos');
    $xcrud->set_var('nome_campo','id_'.$variavel.'');
    $xcrud->set_var('accao','Inseriu');
	
    // logs e user
    $xcrud->after_insert('inserir_crud'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php
    
    //$xcrud->after_insert('prioridade_operacoes'); // automatic call of functions.php 
    //$xcrud->after_update('prioridade_operacoes_update'); // automatic call of functions.php 
    // column_callback
    //$xcrud->column_callback('quantidade','numero_format');
$xcrud->relation('id_of','ib_ofs','id_of','id_of','activo=1');

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
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','data_saida'), true, true, 'edit');
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','data_saida'), true, true, 'create');
    
    $xcrud->highlight_row('activo','=','0','#EEE8AA'); // linha amarela se não tiver anexos
    
    $xcrud->sum('quantidade_registo'); // sum row(), receives data from full table (ignores pagination)
    // botão para adicionar anexo
    $xcrud->button('index.php?page=ib/anexos&id_of={id_of}', false, 'glyphicon glyphicon-plus');
    
// juntar tabela de anexos no view
    $anexos = $xcrud->nested_table('Anexos','id_of','uc2_anexos','id_of'); // 2nd level 2
    $anexos->columns('id_tipodeanexo,nome_anexo,anexo');
    $anexos->column_callback('anexo','anexo_url');
    
$xcrud->order_by('id_of','desc');
    	$xcrud->column_pattern('id_of','<a href="index.php?page=ib/resumo_of&id_of={id_of}">{id_of}</a>');
    
    // nome da tabela
    //$anexos->table_name('Anexos');
    // label
    $anexos->label('nome_anexo','Nome do Anexo');
    $anexos->label('id_tipodeanexo','Tipo de Anexo');
    // relações
    $anexos->relation('id_tipodeanexo','uc2_tiposdeanexos','id_tipodeanexo','nome_tipodeanexo'); //campo origem / tabela / destino / destino_nome
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