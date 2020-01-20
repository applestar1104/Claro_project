<?php protect("1"); ?>

<?php

    $xcrud = Xcrud::get_instance();
    //chama tabela
    $xcrud->table('log_crud'); 
     $xcrud->table_name('Logs'); 
    $xcrud->label('id_user','Username');
    //faz as realações com outras tabelas

    $xcrud->relation('id_user','login_users','user_id','username');//campo origem / tabela / destino / destino_nome
  
  //ordena descrescente pelo id
    $xcrud->order_by('id','desc');
$xcrud->hide_button('remove');
$xcrud->hide_button('edit');
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
