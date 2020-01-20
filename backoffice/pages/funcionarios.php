<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table('funcionarios');
    $xcrud->table_name('Funcionários');
    $xcrud->relation('id_empresa','empresas','id_empresa','nome_abreviado','empresas.activo = 1',false,true);
    $xcrud->relation('criado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('lingua','linguas','id_lingua','cod_lingua');//campo origem / tabela / destino / destino_nome
    $xcrud->label('id_empresa','Empresa');
    $xcrud->label('nif','NIF');
    $xcrud->label('pais','País');
    $xcrud->label('codigo','Código');
    $xcrud->label('nome_abreviado','Nome');
    $xcrud->label('codigo_postal','Código Postal');
    $xcrud->label('lingua','Língua');
    $xcrud->label('telemovel','Telemóvel');
    $xcrud->label('observacoes','Observacões');
    $xcrud->label('observacoes_internas','Observacões Internas');
   	$xcrud->columns('codigo,nome_abreviado,id_empresa,activo');  
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
    $xcrud->change_type('password', 'password', 'md5');
    
    $xcrud->set_var('level','a:1:{i:0;s:1:\"'.$funcionario.'\";}');
    $xcrud->set_var('nivel',$funcionario);
    $xcrud->set_var('level_read','a:1:{i:0;s:1:\"'.$funcionarioread.'\";}');
    $xcrud->set_var('nivel_read',$funcionarioread);
  
    $xcrud->set_var('nome_tabela','funcionarios');
    $xcrud->set_var('nome_campo','id_fornecedor');
    $xcrud->after_insert('inserir_tabela'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php


 $xcrud->column_callback('activo','estados_act');  
 $xcrud->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
 $xcrud->create_action('unpublish', 'unpublish_action');

if(!protectThis("1"))
$xcrud->hide_button('remove');
    //imprime tudo
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
