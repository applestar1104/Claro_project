<?php

    $xcrud = Xcrud::get_instance();
    
    // chama tabela
    $xcrud->table('uc2_calibres');
    // nome da tabela
    $xcrud->table_name('Calibres');
    // mostra todos os ids excepto o id=1
    $xcrud->where('id_calibre !=',1);
    // nome das label
    $xcrud->label('cod_calibre','Código');
    $xcrud->label('nome_calibre','Nome');
    $xcrud->label('observacoes','Observações');
    // colunas a mostrar na listagem
    $xcrud->columns('cod_calibre,nome_calibre,activo');
    
    
    
    $xcrud->relation('criado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome  
	$xcrud->set_var('nome_tabela','uc2_calibres');
    $xcrud->set_var('nome_campo','id_calibre');
    $xcrud->set_var('accao','Inseriu');
	
    //logs e user
    $xcrud->after_insert('inserir_etiquetas'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php


 	$xcrud->column_callback('principal','estados_principal');
    $xcrud->create_action('principal', 'principal_action'); // action callback, function publish_action() in functions.php


 	$xcrud->column_callback('activo','estados_act');
  	$xcrud->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
  	$xcrud->create_action('unpublish', 'unpublish_action');



  	$xcrud->pass_var('criado_em', date('Y-m-d H:i:s'),'create');
    $xcrud->pass_var('criado_por', $user_id,'create');
       //atualização  da data só no meomento do atualizar
    $xcrud->pass_var('actualizado_em', date('Y-m-d H:i:s'),'edit');
    $xcrud->pass_var('actualizado_por', $user_id,'edit');

    //estes campos do criar e atualizar nao aparecem no editar nem no criar
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