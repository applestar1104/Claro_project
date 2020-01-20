<?php

$xcrud = Xcrud::get_instance();
    //chama tabela
$xcrud->table('clientes'); 

    //faz as realações com outras tabelas
    $xcrud->relation('id_empresa','empresas','id_empresa','nome_abreviado','empresas.activo = 1 ',false,true);
    //relation ( field, target_table, target_id, target_name, where, main_table, order, multiple)
    $xcrud->relation('criado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('lingua','linguas','id_lingua','cod_lingua', false, ' case when id_lingua =1 then 1 else 0 end, cod_lingua ASC');//campo origem / tabela / destino / destino_nome  
   // $xcrud->relation('lingua','lingua','id_lingua','cod_lingua',false,'cod_lingua');//campo origem / tabela / destino / destino_nome, where, order
 $xcrud->relation('id_tipodemarcacao','uc2_tiposdemarcacao','id_tipodemarcacao','nome_tipodemarcacao','uc2_tiposdemarcacao.activo = 1','where id!=1',false);
 $xcrud->relation('id_tipodemarcacao','uc2_tiposdemarcacao','id_tipodemarcacao','nome_tipodemarcacao','uc2_tiposdemarcacao.activo = 1 and uc2_tiposdemarcacao.id_tipodemarcacao!=1',false);
    $xcrud->set_attr('lingua_obs',array('id'=>'lingua_obs'));

   $xcrud->set_attr('lingua',array('id'=>'lingua'));

    //label muda o nome que vem da base dados para o nome a apresentar
    $xcrud->label('id_empresa','Empresa');
    $xcrud->label('id_cliente','ID');
    $xcrud->label('codigo','Código');
    $xcrud->label('nome_abreviado','Nome');
    $xcrud->label('nif','NIF');
    $xcrud->label('pais','País');
    $xcrud->label('codigo_postal','Código Postal');
    $xcrud->label('lingua','Língua');
    $xcrud->label('telemovel','Telemóvel');
    $xcrud->label('observacoes','Observacões');
    $xcrud->label('lingua_obs','Língua Obs*');

   // $xcrud->fields('codigo,nome_abreviado,nif,pais,telemovel', false, 'USER');
  //  $xcrud->fields('id_empresa,observacoes,observacoes_internas,Site', false, 'DAdos');
   // $xcrud->fields('tipo,lingua,login_activo,activo', false, 'Acessos');

    $xcrud->change_type('password', 'password', 'md5');


    $xcrud->label('observacoes_internas','Observacões Internas');
    //ordem e colunas que aparecem na lista
    $xcrud->columns('id_cliente,codigo,nome_abreviado,id_empresa,activo'); 
    //campos obrigatórios
    $xcrud->validation_required('codigo'); 
    $xcrud->validation_pattern('nif', '[a-zA-Z1-9]');
   
    $xcrud->validation_required('nome_abreviado'); 
   //	$xcrud->validation_required('email'); 
    $xcrud->validation_required('id_empresa'); 
    //validação email
    //$xcrud->validation_required('campo',3); o 3 é que tem que ter 3 carateres
    //$xcrud->validation_pattern('campo', '[a-zA-Z]{3,14}'); letras de a-z minimo 3 maximo14
    $xcrud->validation_pattern('email','email');  
    

    //esconde um campo
    //$xcrud->fields('login_activo', true); 
    
    //esconde um array de campos
   // $xcrud->fields(array('login_activo','tipo','vip'), true);

    //criação da data só no meomento do criar
    $xcrud->pass_var('criado_em', date('Y-m-d H:i:s'),'create');
    $xcrud->pass_var('criado_por', $user_id,'create');

       //atualização  da data só no meomento do atualizar
    $xcrud->pass_var('actualizado_em', date('Y-m-d H:i:s'),'edit');
    $xcrud->pass_var('actualizado_por', $user_id,'edit');

    //pesquisa o criado em
    $xcrud->search_columns('criado_em');
    //estes campos do criar e atualizar nao aparecem no editar nem no criar

   
    //tira o vazio da lista
    $xcrud->lists_null_opt(false);

    //mostra id na tabela
    $xcrud->show_primary_ai_column(true);
    //mostra id na view
    $xcrud->show_primary_ai_field(true);

    //ordena descrescente pelo id
    $xcrud->order_by('id_cliente','desc');

    //coloca o vazio da lista
    $xcrud->lists_null_opt(true);


     // $xcrud->alert('email','terra.ivan@gmail.com','Password changed','Your new password is {password}');

    //default
    //retirar  /*
    $db = Xcrud_db::get_instance();
    $query = 'SELECT `id_lingua` FROM `linguas` WHERE `principal`= 1';
    $db->query($query); 
    $result = $db->result();
    $id_default=$result[0]['id_lingua'];
    $xcrud->pass_default('lingua',$id_default);


    //passar um dado por defeito
    $xcrud->pass_default('id_empresa',3);
    //retirar */

    //passar tabela e user
   $xcrud->before_update('verify_lingua');
   $xcrud->before_insert('verify_lingua_insert');
   $xcrud->set_var('level','a:1:{i:0;s:1:\"'.$cliente.'\";}');
   $xcrud->set_var('nivel',$cliente);

    //nome das tabelas para guardar n bd dos user, de ondem veio o user 
   $xcrud->set_var('nome_tabela','clientes');
   $xcrud->set_var('nome_campo','id_cliente');

     //logs e user
   $xcrud->after_insert('inserir_tabela'); // automatic call of functions.php
   $xcrud->after_update('update_tabela'); // automatic call of functions.php


   $xcrud->column_callback('activo','estados_act');
   $xcrud->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
   $xcrud->create_action('unpublish', 'unpublish_action');



  if(protectThis($cliente) and !protectThis($admin)) : 
    $xcrud->where('id_cliente =', $linha_tabela);
//esconde 
  $xcrud->unset_add();
  $xcrud->unset_list();
//esonde campos
  $xcrud->fields(array('login_activo','tipo','vip','observacoes_internas','activo','id_empresa', 'criado_por','actulizado_por'), true);
  echo $xcrud->render('view', $linha_tabela);
  endif;

//para esoncer o remove botao
  if(!protectThis("1"))
    $xcrud->hide_button('remove');
  

  if(protectThis("1"))
      //imprime tudo
    echo $xcrud->render();


  ?>

  <script type="text/javascript">
   /* jQuery(document).on("xcrudafterrequest",function(event,container){
      if(Xcrud.current_task == 'save')
      {
        Xcrud.show_message(container,'Enviado com sucesso','success');
      }


    });*/



jQuery(document).on("ready xcrudafterrequest", function(event, container) {
if($("#lingua").val()!=1)
$('#lingua_obs').parent().parent().hide();

$("#lingua").change(function() {
 if($("#lingua").val()==1)
 {
   $('#lingua_obs').parent().parent().show();

 }
 else
 {
  $('#lingua_obs').parent().parent().hide();
 }
});


});






  </script>
