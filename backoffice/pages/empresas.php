<?php

    $xcrud = Xcrud::get_instance();
    $xcrud->table('empresas'); 
   	//$xcrud->columns('nome_completo,observacoes', true);  
   	$xcrud->relation('criado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome
    $xcrud->label('nif','NIF');
    $xcrud->label('codigo','Código');
    $xcrud->label('nome_abreviado','Nome');
    $xcrud->label('pais','País');
    $xcrud->label('codigo_postal','Código Postal');
    $xcrud->label('lingua','Língua');
    $xcrud->label('telemovel','telemóvel');
    $xcrud->label('observacoes','Observações');
    $xcrud->label('observacoes_internas','Observacões Internas');
    $xcrud->columns('codigo,nome_abreviado,activo');
    $xcrud->validation_required('codigo'); 
   	$xcrud->validation_required('nome_abreviado'); 
   	$xcrud->validation_required('email'); 
   	$xcrud->validation_pattern('email','email');  
   	$xcrud->pass_var('criado_em', date('Y-m-d H:i:s'),'create');
    $xcrud->pass_var('criado_por', $user_id,'create');
   	$xcrud->pass_var('actualizado_em', date('Y-m-d H:i:s'),'edit');
    $xcrud->pass_var('actualizado_por', $user_id,'edit');
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por'), true, true, 'edit');
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por'), true, true, 'create');
 

    $xcrud->set_var('nome_tabela','empresas');
    $xcrud->set_var('nome_campo','id_empresa');
    $xcrud->set_var('accao','Inseriu');
    
    //logs e user
    $xcrud->after_insert('inserir_crud'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php

    $xcrud->column_callback('activo','estados_act');

    $xcrud->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
    $xcrud->create_action('unpublish', 'unpublish_action');

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
