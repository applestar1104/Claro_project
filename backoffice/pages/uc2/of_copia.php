<style type="text/css">
  .xcrud-overlay2 {
   position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  background: #fff 50% 50% no-repeat url(../config/xcrud/themes/bootstrap/loading.gif);
  opacity: 0.5;
  z-index: 999;
  width: 100%;
  height: 100%
}

</style>
<div id="of_form">
<div class="xcrud-overlay2" style="display:none;" ></div>
<?php

    $xcrud = Xcrud::get_instance();
    //chama tabela
    $xcrud->table('uc2_of'); 
    $xcrud->relation('id_ordem_operacao','uc2_ordem_operacoes','id_ordem_operacao','nome_ordem_operacao');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_tiposdeproducao','uc2_tiposdeproducao','id_tiposdeproducao','nome_tiposdeproducao','id_tiposdeproducao!=1 and activo=1','id_tiposdeproducao');//campo origem / tabela / destino / destino_nome  
    $xcrud->set_attr('id_ordem_operacao',array('id'=>'ordem'));
    $xcrud->set_attr('semana',array('id'=>'semana'));
    $xcrud->set_attr('ano',array('id'=>'ano'));
    $xcrud->set_attr('sequencia',array('id'=>'seq'));
    $xcrud->set_attr('id_tiposdeproducao',array('id'=>'tipo'));
    //$xcrud->after_insert('update_seq');   
    $xcrud->after_insert('prioridade_operacoes'); // automatic call of functions.php 
    $xcrud->relation('id_calibre','uc2_calibres','id_calibre','nome_calibre','id_calibre!=1 and activo=1');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_cliente','clientes','id_cliente','nome_abreviado','activo=1');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_qualidade','uc2_qualidades','id_qualidade','nome_qualidade','id_qualidade!=1 and activo=1');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_especificacaoproducaoextrusao','uc2_especificacoesproducaoextrusao','id_especificacaoproducaoextrusao','cod_especificacaoproducaoextrusao');//campo origem / tabela / destino / destino_nome  
    $xcrud->set_attr('id_especificacaoproducaoextrusao',array('id'=>'id_extrusao'));
    $xcrud->set_attr('id_especificacaoproducaomoldacao',array('id'=>'id_moldacao'));
    $xcrud->set_attr('id_toleranciaproducao',array('id'=>'id_tolerancia'));
    $xcrud->relation('id_qualidade_moldacao','uc2_qualidades','id_qualidade','nome_qualidade');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_especificacaoproducaomoldacao','uc2_especificacoesproducaomoldacao','id_especificacaoproducaomoldacao','cod_especificacaoproducaomoldacao');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_linha_extrusao','uc2_linhasdeextrusao','id_linhadeextrusao','nome_linhadeextrusao');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_calibre_extrusao','uc2_calibres','id_calibre','nome_calibre',false,false,true);//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_qualidade_extrusao','uc2_qualidades','id_qualidade','nome_qualidade');//campo origem / tabela / destino / destino_nome  

    $xcrud->relation('id_toleranciaproducao','uc2_toleranciasproducao','id_toleranciaproducao','cod_toleranciaproducao');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_of_materiaprima','uc2_of','id_of','nome_of','id_tiposdeproducao!=3 and activo_materiaprima!=0');//campo origem / tabela / destino / destino_nome  

    $xcrud->label('id_ordem_operacao','Ordem Operação');
   // $xcrud->fields(array('obs_op1','obs_op2','obs_op3','obs_op4','obs_op5','obs_op6','obs_op7','obs_op8','obs_op9','obs_op10'), true);
    $xcrud->set_attr('id_cliente',array('id'=>'id_cliente'));
    //1
    $xcrud->set_attr('id_operacao',array('id'=>'id_operacao'));
  //  $xcrud->validation_pattern('quantidade', 'numeric');
    $xcrud->set_attr('quantidade', array('id'=>'milhares'));
    $xcrud->set_attr('obs_op1',array('id'=>'obs_op1'));
    $xcrud->set_attr('id_calibres_corpos',array('id'=>'id_calibres_corpos'));
    $xcrud->set_attr('poncar',array('id'=>'poncar_bd'));
    $xcrud->set_attr('poncar_input',array('id'=>'poncar_input_bd'));

    //2
  
    $xcrud->set_attr('topejar',array('id'=>'topejar_bd'));
    $xcrud->set_attr('topejar_input',array('id'=>'topejar_input_bd'));

    //3
    $xcrud->set_attr('obs_op3',array('id'=>'obs_op3'));
    $xcrud->set_attr('chanfrar',array('id'=>'chanfrar_bd'));
    $xcrud->set_attr('chanfrar_input',array('id'=>'chanfrar_input_bd'));    

    //4
    $xcrud->set_attr('obs_op4',array('id'=>'obs_op4'));
    $xcrud->set_attr('id_lavacao',array('id'=>'id_lavacao_db'));
    $xcrud->set_attr('id_maquina_lavacao',array('id'=>'id_maquina_lavacao_db'));


    //5
    $xcrud->set_attr('obs_op5',array('id'=>'obs_op5'));
    $xcrud->set_attr('id_escolha',array('id'=>'id_escolha_db'));
    $xcrud->set_attr('ordem_escolha',array('id'=>'id_escolha_ordem_db'));

    //6
    $xcrud->set_attr('obs_op6',array('id'=>'obs_op6'));
    $xcrud->set_attr('id_marcacao',array('id'=>'id_marcacao_db'));
    $xcrud->set_attr('id_marca',array('id'=>'id_marca_db'));
    $xcrud->set_attr('local_marcacao',array('id'=>'local_marcacao_db'));

    //7
    $xcrud->set_attr('obs_op7',array('id'=>'obs_op7'));
    $xcrud->set_attr('id_produto',array('id'=>'id_produto_db'));
    $xcrud->set_attr('quantidade_produtom1',array('id'=>'quantidade_produtom1_db'));
     $xcrud->set_attr('quantidade_produtom2',array('id'=>'quantidade_produtom2_db'));
     
    //8
    $xcrud->set_attr('sacos',array('id'=>'sacos_db'));
    $xcrud->set_attr('paletes',array('id'=>'paletes_db'));
    $xcrud->set_attr('rafia',array('id'=>'rafia_db'));
    $xcrud->set_attr('caixas',array('id'=>'caixas_db'));
    $xcrud->set_attr('obs_op8',array('id'=>'obs_op8'));

    //9
    $xcrud->set_attr('obs_op9',array('id'=>'obs_op9'));
    $xcrud->set_attr('data_expedicao',array('id'=>'data_expedicao_db'));

    //10
    $xcrud->set_attr('tolerancias',array('id'=>'tolerancias_db'));

    $xcrud->set_attr('obs_op10',array('id'=>'obs_op10'));

    $xcrud->label('id_tiposdeproducao','Tipo P.');
    $xcrud->label('sequencia','Seq.');
    $xcrud->label('semana','Sem.');

    $xcrud->label('id_especificacaoproducaomoldacao','Esp.Producao Moldação');
    $xcrud->label('id_especificacaoproducaoextrusao','Esp.Producao Extrusão');

    $xcrud->label('id_calibre_extrusao','Calibre Extrusão');
    $xcrud->label('id_qualidade_extrusao','Qualidade Extrusão');


    $xcrud->relation('criado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome  
  
  
    $xcrud->set_var('nome_tabela','uc2_of');
    $xcrud->set_var('nome_campo','id_of');
    $xcrud->set_var('accao','Inseriu');

    // logs e user
   // $xcrud->after_insert('inserir_nomeof'); // automatic call of functions.php
   // $xcrud->after_insert('inserir_crud'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php

     $xcrud->before_insert('trimnumero'); // automatic call of functions.php
     $xcrud->before_update('trimnumero'); // automatic call of functions.php
  // activar/desactivar
    $xcrud->column_callback('activo','estados_act');
    $xcrud->column_callback('activo_materiaprima','estados_act2');


    $xcrud->column_callback('quantidade','numero_format');
  

    $xcrud->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
    $xcrud->create_action('unpublish', 'unpublish_action');


    $xcrud->create_action('publish2', 'publish_action2'); // action callback, function publish_action() in functions.php
    $xcrud->create_action('unpublish2', 'unpublish_action2');

    // gravar dados no momento de criar 
    $xcrud->pass_var('criado_em', date('Y-m-d H:i:s'),'create');
    $xcrud->pass_var('criado_por', $user_id,'create');
    // gravar dados no momento do actualizar
    $xcrud->pass_var('actualizado_em', date('Y-m-d H:i:s'),'edit');
    $xcrud->pass_var('actualizado_por', $user_id,'edit');

    // estes campos do criar e actualizar nao aparecem no editar nem no criar
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','principal'), true, true, 'edit');
    $xcrud->fields(array('criado_por','criado_em','actualizado_em','actualizado_por','principal'), true, true, 'create');

    echo $xcrud->render();


?>
<div id="update"></div>
<script type="text/javascript">


jQuery(document).on('ready xcrudafterrequest', function(event, container) {


 
 if (container) { 


// tipocall($('#tipo').val());
//$('.xcrud-overlay2').show();
$('#tipo').select2().on("select2-selecting", function(e) {
tipoval=e.val;
 tipocall(tipoval);
})

function format(comma, period) {
  comma = comma || ',';
  period = period || '.';
  var split = this.toString().split('.');
  var numeric = split[0];
  var decimal = split.length > 1 ? period + split[1] : '';
  var reg = /(\d+)(\d{3})/;
  while (reg.test(numeric)) {
    numeric = numeric.replace(reg, '$1' + comma + '$2');
  }
  return numeric + decimal;
}

$('#milhares').live('keyup', function(){
  $(this).val(format.call($(this).val().split(' ').join(''),' ','.'));
});



$('.linha_id_ordem_operacao').after('<div id="lista_ops"></div>');
$('.linha_id_especificacaoproducaoextrusao').after('<div id="extrusao_obs" class="clear"></div>');
$('.linha_id_especificacaoproducaomoldacao').after('<div id="moldacao_obs" class="clear"></div>');
$('.linha_id_toleranciaproducao').after('<div id="tolerancia_obs" class="clear"></div>');



$('#id_cliente').change(function() {
marcascall()
  }); 

$('#id_moldacao').change(function() {
  moldacaocall();
  }); 


$('#id_extrusao').change(function() {
  extrusaocall();
  }); 

$('#id_tolerancia').change(function() {
  toleranciaproducaocall();
  }); 


$('#ordem').change(function() {
getchecks();
});
  
 

 Date.prototype.getWeek = function() {
 var onejan = new Date(this.getFullYear(), 0, 1);
return Math.ceil((((this - onejan) / 86400000) + onejan.getDay() + 1) / 7);
    }
var weekNumber = (new Date()).getWeek();


$('#semana').val(weekNumber)

$('#ano').val((new Date).getFullYear())
  }

$('#semana, #ano, #tipo').change(function() {
  getsequencia();
});

$('#seq').prop('readonly', true);
//document.getElementById('seq').readOnly = true;
 //$('#seq').prop('disabled', true);


function getsequencia(){
  tipo=$('#tipo').val();
  ano=$('#ano').val();
  semana=$('#semana').val();

  if(tipo!="") {
$.getJSON('pages/uc2/sequencia.php?ano='+ano+'&semana='+semana+'&tipo='+tipo+'' , function(data) {        
  $.each( data, function( key, val ) {  
   var seq = parseInt(val) +1;
 $('#seq').val(seq);

  });});

  }}



});


function moldacaocall(){

  moldacao=$('#id_moldacao').val();

if(moldacao!=""){ 
  $.getJSON('pages/uc2/moldacao.php?id_moldacao='+moldacao , function(data) {        
  $.each( data, function( key, val ) {
$('#moldacao_obs').html('<div class="clearfix"><label class="control-label col-sm-2" style="margin-left:-10px;" >Especificações</label><div class="col-sm-10" style="margin-left:-1px;margin-bottom:6px;">'+val.cod_html+'</div>');
$('#moldacao_obs').slideDown();
  }); 
});
}
else{
 $('#moldacao_obs').slideUp();
}
}

function marcascall(){
  cliente=$('#id_cliente').val();
  id_marcacao=$('#id_marcacao').val();
  local_marcacao=$('#local_marcacao').val();
//cliente!="" &&


if(id_marcacao!="" && local_marcacao!=""){ 
  $('#id_marca').empty();
  $('#id_marca').append("<option value=''>- Selecione -</option>");
  $.getJSON('pages/uc2/marcacao.php?id_cliente='+cliente+'&id_marcacao='+id_marcacao+'&local_marcacao='+local_marcacao , function(data) {        
  $.each( data, function( key, val ) {
$('#id_marca').append("<option value='" + val.cod_op+ "'>" + val.cod_html + "</option>");

if(val.preview!=""){
$('#preview_marca').html('<img style="display:none; max-width:100%;" class="imagem_preview" id="imagem_'+val.cod_op+'" src="../uploads/marcas/thumbs/'+val.preview+'" ></div>');
}

$('#id_marca').select2();

  }); 
});
}

 $("#id_marca").change(function() {
previewcall(this.value);
  }); 
}

function previewcall(valorid){
  $('.imagem_preview').hide();
  $('#imagem_'+valorid).show();
}

function toleranciaproducaocall(){

  tolerancia=$('#id_tolerancia').val();

if(tolerancia!=""){ 
  $.getJSON('pages/uc2/tolerancia.php?id_tolerancia='+tolerancia , function(data) {        
  $.each( data, function( key, val ) {
 $('#tolerancia_obs').html('<div class="clearfix"><label class="control-label col-sm-2" style="margin-left:-10px;" >Especificações</label><div class="col-sm-10" style="margin-left:-1px; margin-bottom:6px; margin-bottom:10px;">'+val.cod_html+'</div>');
$('#tolerancia_obs').slideDown();
  }); 
});
}
else{
 $('#extrusao_obs').slideUp();
}
}


function extrusaocall()
{
  extrusao=$('#id_extrusao').val();

if(extrusao!=""){ 
  $.getJSON('pages/uc2/extrusao.php?id_extrusao='+extrusao , function(data) {        
  $.each( data, function( key, val ) {
 $('#extrusao_obs').html('<div class="clearfix"><label class="control-label col-sm-2" style="margin-left:-10px;" >Especificações</label><div class="col-sm-10" style="margin-left:-1px; margin-bottom:6px; margin-bottom:10px;">'+val.cod_html+'</div>');
$('#extrusao_obs').slideDown();
  }); 
});
}
else{
 $('#extrusao_obs').slideUp();
}

}

//checks
function getchecks() {
  key=$('#ordem').val();
$('#lista_ops').html(''); 
if(key==4){
$('#id_operacao').val(1);
}
if(key==3){
$('#id_operacao').val(2);
}



if(key!="" && key!=4 && key!=3){ 
var id_ops= [];
//alert($("#id_operacao").val());
  $(".xcrud-overlay").show();
  $.getJSON('pages/uc2/ordem.php?id_ordem='+key , function(data) {        
  $.each( data, function( key, val ) {
 $('#lista_ops').append('<div class="form-group clearfix"><label class="control-label col-sm-2">'+val.cod_op+'</label><div class="col-sm-10" style="margin-left:-1px; margin-top:6px; margin-bottom:10px;"><div class="md-checkbox" id="'+val.id_op+'"> <input type="checkbox" id="checkbox'+val.id_op+'" value="'+val.id_op+'" class="md-check"> <label for="checkbox'+val.id_op+'"> <span></span> <span class="check"></span> <span class="box"></span> </label> </div></div>'+val.cod_html+'</div>');
$(".xcrud-overlay").hide();
$('select').select2();



 $('.md-checkbox').change(function(){  
 calldesc(this.id);
 });


  $('.datepicker').datetimepicker();



$('#select_dois').select2().on("select2-selecting", function(e) {
   $("#id_calibres_corpos").val(e.val);
        })
// fim opção 2 Extrusão/Moldação


//opção 3
 $("#obs_3").change(function() {
 $("#obs_op3").val($("#obs_3").val());
  }); 

$('#poncar,#topejar,#chanfrar').bootstrapSwitch();
$('#poncar').on('switchChange.bootstrapSwitch', function(event, state) {
if(state==true){
    $('#poncar_input').show(); 
    $('#poncar_bd').val(1); 
}
 else{
   $('#poncar_input').hide();  
    $('#poncar_bd').val(0); 
 }
 $("#poncar_input").change(function() {
 $("#poncar_input_bd").val($("#poncar_input_val").val());

  }); 
}); 


$('#topejar').on('switchChange.bootstrapSwitch', function(event, state) {
if(state==true){
    $('#topejar_input').show(); 
    $('#topejar_bd').val(1); 
}
 else{
   $('#topejar_input').hide();  
    $('#topejar_bd').val(0); 
 }
 $("#topejar_input").change(function() {
 $("#topejar_input_bd").val($("#topejar_input_val").val());
  }); 
}); 


$('#chanfrar').on('switchChange.bootstrapSwitch', function(event, state) {
if(state==true){
    $('#chanfrar_input').show(); 
    $('#chanfrar_bd').val(1); 
}
 else{
   $('#chanfrar_input').hide();  
    $('chanfrar_bd').val(0); 
 }
 $("#chanfrar_input").change(function() {
 $("#chanfrar_input_bd").val($("#chanfrar_input_val").val());
  }); 
}); 

// fim opção 3 Rectificação

$("#id_lavacao_db").val($('#id_lavacao').val());
$("#id_maquina_lavacao_db").val($('#id_lavacao').val());
//opção 4 lavaçao
 $("#obs_4").change(function() {
 $("#obs_op4").val($("#obs_4").val());
 }); 

 $('#id_lavacao').select2().on("select2-selecting", function(e) {
   $("#id_lavacao_db").val(e.val);

  }); 

  $('#id_maquina_lavacao').select2().on("select2-selecting", function(e) {
   $("#id_maquina_lavacao_db").val(e.val);

  }); 





// fim opção 3  lavaçao

//opção 5  escolha

 $("#obs_5").change(function() {
 $("#obs_op5").val($("#obs_5").val());
  }); 

$('#id_escolha').select2().on("select2-selecting", function(e) {
   $("#id_escolha_db").val(e.val);

   if(e.val==4){
       $(".desc2").show(); 
   }else{
  
    $(".desc2").hide(); 
   }
        })
$('#id_escolha_ordem').select2().on("select2-selecting", function(e) {
    $("#id_escolha_ordem_db").val(e.val);     
})

// fim opção  5 escolha



//opção 6  marcação
 $("#obs_6").change(function() {
 $("#obs_op6").val($("#obs_6").val());
  }); 


 $('#id_marcacao').select2().on("select2-selecting", function(e) {

   $("#id_marcacao_db").val(e.val);
    $("#local_marcacao_db").val($("#local_marcacao").val()); 
    $("#id_marca_db").val($("#id_marca").val());  


   if(e.val=="3"){
 $('#local_marcacao').val(2);
  $('#local_marcacao').select2();
 $('#local_marcacao').prop('disabled', true);
   }else   {
 $('#local_marcacao').prop('disabled', false);
   }

 $(".local_marcacao").show(); 
$(".id_marca").show();


        })

 $('#local_marcacao').select2().on("select2-selecting", function(e) {
    $("#local_marcacao_db").val(e.val);     
})

  $('#id_marca').select2().on("select2-selecting", function(e) {
    $("#id_marca_db").val(e.val);     
})


// fim opção  6  marcaç



// opção 7 tratamento superfecioal

 $("#obs_7").change(function() {
 $("#obs_op7").val($("#obs_7").val());
  }); 

$('#id_produto').select2().on("select2-selecting", function(e) {
  $("#id_produto_db").val(e.val);
     })



$("#quantidade_produtom1").change(function() {
 $("#quantidade_produtom1_db").val($("#quantidade_produtom1").val());
  }); 

$("#quantidade_produtom2").change(function() {
 $("#quantidade_produtom2_db").val($("#quantidade_produtom2").val());
  }); 



 //fim 7

//op8 Operação Embalagem/Contagem
 $("#obs_8").change(function() {
 $("#obs_op8").val($("#obs_8").val());
  }); 
  $("#sacos").change(function() {
 $("#sacos_db").val($("#sacos").val());
  }); 

   $("#caixas").change(function() {
 $("#caixas_db").val($("#caixas").val());
  }); 

 $("#paletes").change(function() {
 $("#paletes_db").val($("#paletes").val());
  }); 


  $("#rafia").change(function() {
 $("#rafia_db").val($("#rafia").val());
  }); 
//fim op 8 Operação Embalagem/Contagem

// op 10
 $("#obs_9").change(function() {
 $("#obs_op9").val($("#obs_9").val());
  }); 


 $("#data_expedicao").change(function() {
 $("#data_expedicao_db").val($("#data_expedicao").val());
  }); 




$(".spin_input").TouchSpin({          
               buttondown_class: 'btn green',
            buttonup_class: 'btn green',
            decimals: 2,
             step: 0.01,
             min: -1000000000,
            max: 1000000000,
              boostat: 5,
            maxboostedstep: 10000000
        }); 

  });





function calldesc(checkid){
    if($('#checkbox'+checkid).is(":checked")) {
id_ops.push($('#checkbox'+checkid).val());
$('#checkbox'+checkid).parent().parent().next(".desc").show();
     } 
     else {
id_ops.splice( $.inArray($('#checkbox'+checkid).val(),id_ops ), 1 );
$('#checkbox'+checkid).parent().parent().next(".desc").hide();
     }   
  $("#id_operacao").val(id_ops);
 }

traingIds=$("#id_operacao").val();
alert(traingIds);
var iddb= traingIds.split(',');
$.each(iddb, function(index, value) { 
$( "#checkbox"+value ).prop( "checked", true );
calldesc(value);
});

});


//Aqui

} }

//fim checks

function tipocall(tipoval){

   //cliente
 if(tipoval==3) {
  $('#ordem').val(1);
  $('#ordem').select2();
// getchecks();
$('.linha_id_cliente').slideDown();
$('.linha_doc_cliente').slideDown();
$('.linha_activo_materiaprima').slideUp();
}
else{
  $('.linha_id_cliente').slideUp();
  $('.linha_doc_cliente').slideUp();
}
 
 //stock
 if(tipoval==2){
$('#ordem').val(2);
$('#ordem').select2();
getchecks();
 }

 //cliente ou stock
if(tipoval==2 || tipoval==3) 
$('.linha_id_calibre, .linha_id_qualidade,.linha_quantidade,.linha_id_ordem_operacao,#lista_ops,.linha_id_toleranciaproducao,.linha_producao_alteracoestolerancias,#tolerancia_obs,.linha_id_of_materiaprima, .linha_info_materiaprima').slideDown();
else
$('.linha_id_calibre, .linha_id_qualidade,.linha_quantidade,.linha_id_ordem_operacao, #lista_ops,.linha_id_toleranciaproducao,.linha_producao_alteracoestolerancias,#tolerancia_obs,.linha_id_of_materiaprima, .linha_info_materiaprima').slideUp();  

//extrusão
 if(tipoval==5) {
$('#ordem').val(4);$('#id_operacao').val(1);$('.linha_id_calibre_extrusao,.linha_id_qualidade_extrusao,.linha_id_linha_extrusao,.linha_id_especificacaoproducaoextrusao,.linha_extrusao_alteracoesespecificacoes,#extrusao_obs').slideDown();
}else
$('.linha_id_calibre_extrusao,.linha_id_qualidade_extrusao,.linha_id_linha_extrusao,.linha_id_especificacaoproducaoextrusao,.linha_extrusao_alteracoesespecificacoes,#extrusao_obs').slideUp();

//moldacao
 if(tipoval==4){ 
$('#ordem').val(3);$('#id_operacao').val(2);$('.linha_id_qualidade_moldacao, .linha_id_calibre_moldacao,.linha_id_especificacaoproducaomoldacao,.linha_moldacao_alteracoesespecificacoes,#moldacao_obs').slideDown();
}else
$('.linha_id_qualidade_moldacao, .linha_id_calibre_moldacao,.linha_id_especificacaoproducaomoldacao,.linha_moldacao_alteracoesespecificacoes,#moldacao_obs').slideUp();

$('.xcrud-overlay2').hide();
}

</script>
</div>