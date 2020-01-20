<style type="text/css">
  
    .xcrud-overlay2 
    {
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

<div  id="btn_active" style="display:none" class="alert alert-success">
<strong>Alterado</strong> Com sucesso.
  </div>




<div id="of_form">

<div class="xcrud-overlay2" style="display:none;" ></div>

<?php

    $xcrud = Xcrud::get_instance();
        $xcrud->table('uc2_of');    
 include('pages/uc2/parametros_of.php');
  $xcrud->where('arquivo=0');
  	$xcrud->column_pattern('nome_of','<a href="index.php?page=uc2/resumo_of&id_of={id_of}">{nome_of}</a>');

	// juntar tabela de anexos no view
    $anexos = $xcrud->nested_table('Anexos','id_of','uc2_anexos','id_of'); // 2nd level 2
    $anexos->columns('id_tipodeanexo,nome_anexo,anexo');
    $anexos->column_callback('anexo','anexo_url');

    // nome da tabela
    $anexos->table_name('Anexos');
    // label
    $anexos->label('nome_anexo','Nome do Anexo');
    $anexos->label('id_tipodeanexo','Tipo de Anexo');
    // relações
    $anexos->relation('id_tipodeanexo','uc2_tiposdeanexos','id_tipodeanexo','nome_tipodeanexo'); //campo origem / tabela / destino / destino_nome
  $xcrud->fields(array('arquivo'), true);
    // esconder 
    $anexos->unset_add();
    $anexos->unset_edit();
    $anexos->unset_remove();
    $anexos->unset_print();
	$anexos->unset_csv();
	$anexos->unset_numbers();
	$anexos->unset_limitlist();
	$anexos->unset_search();
	// juntar outra tabela $xcrud->join('id_of','uc2_anexos','id_anexo'); // on profile.token_id = tokens.id
 	// highlught 
 	$xcrud->highlight_row('anexos','=','0','#EEE8AA'); // linha amarela se não tiver anexos

 	// voilá
    echo $xcrud->render();

?>
<div id="update"></div>
<script type="text/javascript">


jQuery(document).on('ready xcrudafterrequest', function(event, container) {

 if (container) { 
 
moldacaocall();
previewcall();
toleranciaproducaocall();
extrusaocall();


  tipocall($('#tipo').val());

//view



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
milhares=$('#milhares');
milhares.live('keyup', function(){
  $(this).val(format.call($(this).val().split(' ').join(''),' ','.'));
});

if(milhares.val())
milhares.val(format.call(milhares.val().split(' ').join(''),' ','.'));

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
  
 
 if($("#esconde_id_operacao").length != 0) {
  hideonview();

}


  

if(Xcrud.current_task == 'create'){
// Returns the ISO week of the date.
Date.prototype.getWeek = function() {
  var date = new Date(this.getTime());
   date.setHours(0, 0, 0, 0);
  // Thursday in current week decides the year.
  date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
  // January 4 is always in week 1.
  var week1 = new Date(date.getFullYear(), 0, 4);
  // Adjust to Thursday in week 1 and count number of weeks from date to week1.
  return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000
                        - 3 + (week1.getDay() + 6) % 7) / 7);
}


var weekNumber = (new Date()).getWeek();
$('#semana').val(weekNumber)


$('#ano').val((new Date).getFullYear())
}

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
  $.getJSON('pages/uc2/previewmoldacao.php?id_moldacao='+moldacao , function(data) {        
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
$('#preview_marca').html('');
$('#id_marca').append("<option value=''>- Selecione -</option>");
$('#id_marca').select2();

  $.getJSON('pages/uc2/previewmarca.php?id_cliente='+cliente+'&id_marcacao='+id_marcacao+'&local_marcacao='+local_marcacao , function(data) {     
  $('#id_marca').empty();
    $('#id_marca').append("<option value=''>- Selecione -</option>");
  $.each( data, function( key, val ) {
if($('#id_marca_db').val()==val.cod_op){
$('#id_marca').append("<option value='" + val.cod_op+ "' selected>" + val.cod_html + "</option>");
if(val.preview!=""){
$('#preview_marca').html('<img style="max-width:100%;" class="imagem_preview" id="imagem_'+val.cod_op+'" src="../uploads/marcas/thumbs/'+val.preview+'" ></div>');
}

}else{
$('#id_marca').append("<option value='" + val.cod_op+ "'>" + val.cod_html + "</option>");
if(val.preview!=""){
$('#preview_marca').append('<img style="display:none; max-width:100%;" class="imagem_preview" id="imagem_'+val.cod_op+'" src="../uploads/marcas/thumbs/'+val.preview+'" ></div>');
}
//selected
}


$('#id_marca').select2();

  }); 
});

  $('#id_marca').select2();
}
$('#id_marca').select2();

if($('#id_marca').val()==""){
   $('#preview_marca img').hide();
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
  $.getJSON('pages/uc2/previewtolerancia.php?id_tolerancia='+tolerancia , function(data) {        
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
  $.getJSON('pages/uc2/previewextrusao.php?id_extrusao='+extrusao , function(data) {        
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
///fim de  each data
 });



$(".xcrud-overlay").hide();
$('.xcrud-overlay2').hide();
 $('.datepicker').datetimepicker();
$('select').select2();
 $('.md-checkbox').change(function(){  
 calldesc(this.id);
 });

$('#select_dois').select2().on("select2-selecting", function(e) {
   $("#id_calibres_corpos").val(e.val);
        })
// fim opção 2 Extrusão/Moldação

//opção 3
 $("#obs_3").change(function() {
 $("#obs_op3_db").val($("#obs_3").val());
  }); 

//$('#poncar,#topejar,#chanfrar').bootstrapSwitch();
$('#poncar').on('switchChange.bootstrapSwitch', function(event, state) {
if(state==true){
    $('#poncar_input').show(); 
    $('#poncar_db').val(1); 
 
}
 else{
   $('#poncar_input').hide();  
    $('#poncar_db').val(0); 
 }
 $("#poncar_input").change(function() {
 $("#poncar_input_db").val($("#poncar_input_val").val());

  }); 
});


$('#topejar').on('switchChange.bootstrapSwitch', function(event, state) {
if(state==true){
    $('#topejar_input').show(); 
    $('#topejar_db').val(1); 
}
 else{
   $('#topejar_input').hide();  
    $('#topejar_db').val(0); 
 }
 $("#topejar_input").change(function() {
 $("#topejar_input_db").val($("#topejar_input_val").val());
  }); 
}); 


$('#chanfrar').on('switchChange.bootstrapSwitch', function(event, state) {
if(state==true){
    $('#chanfrar_input').show(); 
    $('#chanfrar_db').val(1); 
}
 else{
   $('#chanfrar_input').hide();  
    $('chanfrar_db').val(0); 
 }
 $("#chanfrar_input").change(function() {
 $("#chanfrar_input_db").val($("#chanfrar_input_val").val());
  }); 
}); 

// fim opção 3 Rectificação


//opção 4 lavaçao
 $("#obs_4").change(function() {
 $("#obs_op4_db").val($("#obs_4").val());
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
 $("#obs_op5_db").val($("#obs_5").val());
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
 $("#obs_op6_db").val($("#obs_6").val());
  }); 


 $('#id_marcacao').select2().on("select2-selecting", function(e) {

   $("#id_marcacao_db").val(e.val);
    $("#local_marcacao_db").val($("#local_marcacao").val()); 
    $("#id_marca_db").val($("#id_marca").val());  


   if(e.val=="3"){
 $('#local_marcacao').val(2);
  $('#local_marcacao').select2();
 $('#local_marcacao').prop('disabled', true);
   $(".id_marca").show();
   }else   {
 $('#local_marcacao').prop('disabled', false);
   }

 $(".local_marcacao").show(); 

        })

 $('#local_marcacao').select2().on("select2-selecting", function(e) {
  $(".id_marca").show();
    $("#local_marcacao_db").val(e.val);     
})

  $('#id_marca').select2().on("select2-selecting", function(e) {
    $("#id_marca_db").val(e.val);     
})


// fim opção  6  marcaç



// opção 7 tratamento superfecioal

 $("#obs_7").change(function() {
 $("#obs_op7_db").val($("#obs_7").val());
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
 $("#obs_op8_db").val($("#obs_8").val());
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
 $("#obs_op9_db").val($("#obs_9").val());
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

///isto é para o editar
traingIds=$("#id_operacao").val();
if(traingIds!=""){
var iddb= traingIds.split(',');
$.each(iddb, function(index, value) { 
$("#checkbox"+value ).prop( "checked", true );
$("#obs_3").val($("#obs_op3_db").val());
$("#obs_4").val($("#obs_op4_db").val());
$("#obs_5").val($("#obs_op5_db").val());
$("#obs_6").val($("#obs_op6_db").val());
$("#obs_7").val($("#obs_op7_db").val());
$("#obs_8").val($("#obs_op8_db").val());
$("#obs_9").val($("#obs_op9_db").val());
$("#poncar_input_val").val($("#poncar_input_db").val());
$("#topejar_input_val").val($("#topejar_input_db").val());
$("#chanfrar_input_val").val($("#chanfrar_input_db").val());
$("#id_lavacao").val($("#id_lavacao_db").val());
$("#id_maquina_lavacao").val($("#id_maquina_lavacao_db").val());
$("#id_escolha").val($("#id_escolha_db").val());
$("#id_escolha_ordem").val($("#id_escolha_ordem_db").val());
$("#id_marcacao").val($("#id_marcacao_db").val());
$("#id_marca").val($("#id_marcacao_db").val());
$("#local_marcacao").val($("#local_marcacao_db").val());
$("#id_produto").val($("#id_produto_db").val());
$("#quantidade_produtom1").val($("#quantidade_produtom1_db").val());
$("#quantidade_produtom2").val($("#quantidade_produtom2_db").val());
$("#sacos").val($("#sacos_db").val());
$("#paletes").val($("#paletes_db").val());
$("#caixas").val($("#caixas_db").val());
$("#rafia").val($("#rafia_db").val());
$("#data_expedicao").val($("#data_expedicao_db").val());
$("#tolerancias").val($("#tolerancias_db").val());  
$('.local_marcacao').show();
$('.id_marca').show();
  marcaop=$('#id_marcacao_db').val();
if($("#poncar_db").val()==1){
  $("#poncar").prop( "checked", true );
  $('#poncar_input').show(); 
}

if($("#topejar_db").val()==1){
  $("#topejar").prop( "checked", true );
  $('#topejar_input').show(); 
}

if($("#chanfrar_db").val()==1){
  $("#chanfrar").prop( "checked", true );
  $('#chanfrar_input').show(); 
}

$("#poncar").val($("#poncar_db").val());



calldesc(value);
moldacaocall();
marcascall();
previewcall();
toleranciaproducaocall();
extrusaocall();



 //alert(marcaop);
     $('#imagem_'+marcaop).show();



});
}
$('#poncar,#topejar,#chanfrar').bootstrapSwitch();
$('select').select2();

$("#id_lavacao_db").val($('#id_lavacao').val());
$("#id_maquina_lavacao_db").val($('#id_lavacao').val());

});


//fim de  iftipo ou clinete
}

//fim checks
 }



function tipocall(tipoval){

   //cliente
 if(tipoval==3) {
 // $('.xcrud-overlay2').show();
  $('#ordem').val(1);
  $('#ordem').select2();
getchecks();
$('.linha_id_cliente').slideDown();
$('.linha_doc_cliente').slideDown();
$('.linha_activo_materiaprima').slideUp();
}
else{
  $('.linha_id_cliente').slideUp();
  $('.linha_doc_cliente').slideUp();
  $('.linha_activo_materiaprima').slideDown();
 }
 //stock
 if(tipoval==2){
  $('.xcrud-overlay2').show();
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

}




function hideonview()
{
$('.table .linha_ordem_escolha').hide();
$('.table .linha_nome_of').show();

traingIds=$("#esconde_id_operacao").val();
if(traingIds!=""){
var iddb= traingIds.split(',');
$.each(iddb, function(index, value) { 

tipoproducao=$("#esconde_id_tiposdeproducao").val();


if(tipoproducao=='Produção para Cliente')
{
$(".linha_id_calibre, .linha_id_qualidade, .linha_quantidade, .linha_id_cliente, .linha_doc_cliente, .linha_id_of_materiaprima, .linha_info_materiaprima, .linha_id_toleranciaproducao, .linha_producao_alteracoestolerancias").show();
}

if(tipoproducao=='Produção para Stock')
{
$(".linha_id_calibre, .linha_id_qualidade, .linha_quantidade, .linha_id_of_materiaprima, .linha_info_materiaprima, .linha_id_toleranciaproducao, .linha_producao_alteracoestolerancias").show();
}

if(value==1){
//mostra cenas do 1

$(".linha_id_calibre").hide();
$(".linha_id_calibre_extrusao, .linha_id_qualidade_extrusao, .linha_id_linha_extrusao, .linha_id_especificacaoproducaoextrusao, .linha_extrusao_alteracoesespecificacoes").show();
}


if(value==2){
//mostra cenas do 2
$(".linha_id_calibre").hide();
$(".linha_id_calibre_moldacao, .linha_id_qualidade_moldacao, .linha_id_especificacaoproducaomoldacao, .linha_moldacao_alteracoesespecificacoes").show();
}



if(value==3){
//mostra cenas do 3
$(".linha_poncar, .linha_poncar_input, .linha_topejar, .linha_topejar_input, .linha_chanfrar, .linha_chanfrar_input, linha_obs_op3").show();
}


if(value==4){
//mostra cenas do 4
$(".linha_id_lavacao, .linha_id_maquina_lavacao, .linha_obs_op4").show();
}


if(value==5){
//mostra cenas do 5
$(".linha_id_escolha, .linha_ordem_escolha, .linha_obs_op5").show();
}


if(value==6){
//mostra cenas do 6
$(".linha_id_marcacao, .linha_local_marcacao, .linha_id_marca, .linha_obs_op6").show();
}


if(value==7){
//mostra cenas do 7
$(".linha_id_produto, .linha_quantidade_produtom1, .linha_quantidade_produtom2, .linha_obs_op7").show();
}


if(value==8){
//mostra cenas do 8
$(".linha_sacos, .linha_caixas, .linha_paletes, .linha_rafia, .linha_obs_op8").show();
}

if(value==9){
//mostra cenas do 8
$(".linha_data_expedicao, .linha_obs_op9").show();
}

//acho que faltam aqui campos em algumas opçoes

})


}
}
jQuery(document).on("xcrudafterrequest",function(event,container){
    if(Xcrud.current_task == 'save')
    {
        Xcrud.show_message(container,'Enviado com sucesso','success');
    }
});
</script>
</div>