<style type="text/css">
.btn_fix
{
  padding: 4px;
 font-size: 12px;
}
.btn_fix > i
{
  font-size: 12px;
}
</style>
<?php

    $xcrud = Xcrud::get_instance();
    $xcrud->table('uc2_ordem_operacoes'); 
    $xcrud->set_attr('id_operacao',array('id'=>'keys'));
    $xcrud->column_callback('id_operacao','operacoes');  
    echo $xcrud->render();
        $options='';
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `id_operacao`,`cod_operacao` FROM `uc2_operacoes` ORDER BY `id_operacao` DESC';
        $db->query($query);
        $result = $db->result();
        foreach ($result as $key => $item){
        $options.='<option value="'.$item['id_operacao'].'">'.$item['cod_operacao'].'</option>';
        }
echo "<script>jQuery(document).on('ready xcrudafterrequest', function(event, container) {contagem=0; var elems=$('#keys').val(); if(elems!=undefined){var array=elems.split(','); $.each( array, function( key, value ) { add_linha();})};});</script>";
?>
<script type="text/javascript"> 
function add_linha()
{
contagem++;
filho =1+contagem;
$('.form-horizontal .form-group:nth-child('+filho+')')
    .before('<div class="form-group linhas" id="aqui"> <label class="control-label col-sm-2">Operacao('+contagem+')*</label> <div class="col-sm-10"> <select class="xcrud-input form-control form-control select2-offscreen" data-required="1" data-type="select" name="idoperacao_'+contagem+'" size="10" id="idoperacao_'+contagem+'" > <?php echo $options;?></select></div> </div>');
$('select').select2();

$('select').change(function() {
var ids = new Array();
for (var i = 1; i <= contagem; i++) { 
 id=$('#idoperacao_'+i).val()
 ids.push(id);
}
 $('#keys').val(ids);

});
} 
contagem=0;
jQuery(document).on('ready xcrudafterrequest', function(event, container) {


 if (container && !view) { 
  $('.form-horizontal .form-group:nth-last-child(2)')
    .before('<div class="form-group"><label class="control-label col-sm-2"></label><div class="col-sm-10"><a id="add_linha_btn" class="btn btn-success btn_fix"> <i class="glyphicon glyphicon-plus"></i> Adicionar linha</a> <a id="remove_linha_btn" class="btn btn-danger btn_fix"> <i class="glyphicon glyphicon-remove"></i> Remover linha</a></div></div>');

console.log(container);
$('#keys').parent().parent().hide();
if($('#keys').val()==undefined)
  add_linha();

function remover_linha(){
    contagem=contagem-1;
    $('.linhas:last').remove();
    var ids = new Array();
for (var i = 1; i <= contagem; i++) { 
 id=$('#idoperacao_'+i).val()
 ids.push(id);
}
 $('#keys').val(ids);
}

$('#add_linha_btn').click(function() {
add_linha();
});
$('#remove_linha_btn').click(function() {
remover_linha();
});

var elems=$('#keys').val();
if(elems!=undefined)
  {
  var array=elems.split(','); 
  $.each( array, function( key, value ) 
    { 
      cont=key+1;
      //alert(cont);
    //$('#idoperacao_1').hide();
    $("#idoperacao_"+cont).val([value]).select2();
    });
  }
}


});


</script>
<?php

?>