

<?php
     //Xcrud_config::$editor_url = dirname($_SERVER["SCRIPT_NAME"]).'../../config/xcrud/editors/ckeditor/ckeditor.js'; // can be set in config

    $xcrud = Xcrud::get_instance();
    
    // chama tabela
    $xcrud->table('docs_templates');
    // nome da tabela
    $xcrud->table_name('Templates');

    $xcrud->label('nome_template','Nome');
    $xcrud->label('conteudo_template','Conteúdo'); 
    $xcrud->label('id_tipodedocumento','Tipo de Documento');
    $xcrud->label('id_header','Header');
    $xcrud->label('id_footer','Footer');
    // colunas a mostrar na listagem
    $xcrud->columns('id_template,id_tipodedocumento,versao_template,activo');


    $xcrud->relation('id_tipodedocumento','docs_tiposdedocumentos','id_tipodedocumento','nome_tipodedocumento','activo=1');
    $xcrud->relation('id_header','docs_headers','id_header','nome_header');

    $db = Xcrud_db::get_instance();
    $query = 'SELECT `id_header` FROM `docs_headers` WHERE `principal`= 1';
    $db->query($query); 
    $result = $db->result();
    $id_default=$result[0]['id_header'];
    $xcrud->pass_default('id_header',$id_default);

    $xcrud->relation('id_footer','docs_footers','id_footer','nome_footer');
    
    $db = Xcrud_db::get_instance();
    $query = 'SELECT `id_footer` FROM `docs_footers` WHERE `principal`= 1';
    $db->query($query); 
    $result = $db->result();
    $id_default=$result[0]['id_footer'];
    $xcrud->pass_default('id_footer',$id_default);

    $xcrud->relation('criado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome  
    $xcrud->set_var('nome_tabela','docs_templates');
    $xcrud->set_var('nome_campo','id_template');
    $xcrud->set_var('accao','Inseriu');
    
    //logs e user
    $xcrud->after_insert('inserir_crud'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php
    $xcrud->load_view('create','my_custom.php'); 
    $xcrud->load_view('edit','my_custom.php'); 

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
<script>
</script>
<script type="text/javascript">

    $(".xcrud-fix").on('click',".btn-danger", function() { 
        var txt = confirm("All variables are deleted with this template");
        var OY = $(this).parent().parent().parent().find("td").eq(1).html();
        if (txt == true) {
            $.ajax({
                dataType: 'json',
                url: "../backoffice/pages/templatevariabledel.php",
                type: "POST",
                data: { "OY" : OY },
                }).done(function(data){ 
                    var slot = data['slot']; 
                }); 
        } 
    });

</script>
