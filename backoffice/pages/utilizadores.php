<?php

    $xcrud = Xcrud::get_instance();
    //chama tabela
    $xcrud->table('login_users');
    $xcrud->table_name('Utilizadores'); 
    $xcrud->relation('nivel','login_levels','level_level','level_name',false,false,true);//campo origem / tabela / destino / destino_nome
    $xcrud->change_type('password', 'password', 'md5');
     $xcrud->change_type('confirmar_password', 'password', 'md5');

   
    // $xcrud->before_insert('format_nivel_insert'); // para nao pedir password no editar user, descomentar e comentar a seguinte. Campo da BD confirmar password nao obrigatorio
    $xcrud->before_insert('format_nivel'); // automatic call of functions.php
    $xcrud->before_update('format_nivel'); // automatic call of functions.php
    $xcrud->columns('username,email,nivel'); 

    
     $xcrud->set_var('nome_tabela','login_users');
    $xcrud->set_var('nome_campo','user_id');
    $xcrud->set_var('accao','editou dados');   
    $xcrud->after_update('inserir_crud'); // automatic call of functions.php



   $xcrud->fields('user_level,id_tabela', true, '222');
    $xcrud->fields('username,email,nivel', false, 'Finance');
    $xcrud->fields('restricted,password,confirmar_password,data_inicio,data_fim', false, 'Acessos');


    //tira o vazio da lista
   //$xcrud->lists_null_opt(false);
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
