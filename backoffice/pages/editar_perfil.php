<?php

    $xcrud = Xcrud::get_instance();
    //chama tabela
    $xcrud->table('login_users'); 

   
    $xcrud->change_type('password', 'password', 'md5');
       $xcrud->change_type('confirmar_password', 'password', 'md5');
    //mostra um array de campos
    $xcrud->fields(array('password','confirmar_password'), false);
 
  



    $xcrud->set_var('nome_tabela','login_users');
    $xcrud->set_var('nome_campo','user_id');
    $xcrud->set_var('accao','editou dados');   
    $xcrud->after_update('inserir_crud'); // automatic call of functions.php



$xcrud->before_update('verify_password');
$xcrud->where('user_id =', $user_id);
$xcrud->unset_add();
$xcrud->unset_list();
echo $xcrud->render('edit', $user_id);
?>


</script>