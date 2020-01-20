<?php

    $xcrud = Xcrud::get_instance();
    //chama tabela
    $xcrud->table('login_levels');
     $xcrud->table_name('Níveis'); 

     $xcrud->label('level_level','Nível');
     $xcrud->label('level_name','Tipo');
    //remove esses campos
   $xcrud->fields(array('welcome_email'), true);
    $xcrud->columns('level_name,level_level'); 

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