<?php

    $xcrud = Xcrud::get_instance();
    //chama tabela
    $xcrud->table('login_settings');
     $xcrud->table_name('Configurações Login'); 

  $xcrud->fields(array('login_activo','tipo','vip'), true);

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