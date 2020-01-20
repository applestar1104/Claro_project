
<?php 
    if (!class_exists('Xcrud')) {
           include('../../xcrud.php');
    }
    $db = Xcrud_db::get_instance(); 

    $id_template =  $this-> primary_val;
    if (isset($id_template)) {
      # code..  
    $query = 'SELECT * FROM docs_variable WHERE id_template = '.$id_template;
    $db->query($query);
    $result = $db->result();
    $countrow = count($result);
    } else{
    $countrow = null;
    }

?>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Document Variable List</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        	<div class="row">
        	<div class="col-sm-4">
        		<input type="type" class="xcrud-input form-control" id="var_name" style="margin-bottom: 5px;" required>
        		<input type="type" class="xcrud-input form-control" id="var_token" style="margin-bottom: 5px;">
        		<button class="btn btn-success" id="add_var">Add Variable</button>
        	</div>
        	<div class="col-sm-8">
	          	<table class="xcrud-list table table-striped table-hover table-bordered" id="var_table">
	                <thead>
	                    <tr class="xcrud-th">
	                    	<th>No</th>
                        <th>variable</th>
	                      <th>Field Name</th>
	                      <th>Variable</th>
	                      <th>&nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<?php
				        	if($countrow){
				        	for ($i=0; $i < $countrow ; $i++) { $j = 0; $j = $i; $j++;
				        		echo '
							      	<tr>
							      		  <td>'.$j.'</td>
                          <td>'.$result[$i]['id_variable'].'</td> 
							            <td>'.$result[$i]['nome_variable'].'</td> 
                          <td>'.$result[$i]['token'].'</td> 
							            <td class="del"><i class="glyphicon glyphicon-trash"></td> 
							      	</tr>';
						    	}
						    } else{
                  echo '
                      <tr></tr>';
                }
						    ?>
	            	</tbody>
	            </table>
        	</div></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<style type="text/css">

@media print {
    * {
        font-size: 12px;
      }

    .xcrud-top-actions,.xcrud-nav,.btn,h2 small,.xcrud-toggle-show
    {
      display: none;
    }

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
      padding:3px;
      vertical-align: bottom;
    }
    

}

#of_form .linha_anexos,
  #of_form .linha_nome_of,
#of_form .linha_doc_cliente,#of_form .linha_data_expedicao,#of_form .linha_id_of_materiaprima,#of_form .linha_id_toleranciaproducao,#of_form .linha_producao_alteracoestolerancias,
#of_form .linha_id_calibre, #of_form .linha_id_qualidade,#of_form .linha_quantidade,
#of_form .linha_id_operacao,
#of_form .linha_id_ordem_operacao,
#of_form .linha_id_calibres_corpos,
#of_form .linha_id_escolha,
#of_form .linha_id_marca,  
#of_form .linha_id_cliente,
#of_form .linha_id_calibre_corpos, 
#of_form .linha_poncar, 
#of_form .linha_poncar_input, 
#of_form .linha_topejar, 
#of_form .linha_topejar_input,
#of_form .linha_chanfrar, 
#of_form .linha_chanfrar_input, 
#of_form .linha_obs_op1, 
#of_form .linha_id_lavacao, 
#of_form .linha_ordem_escolha, 
#of_form .linha_obs_op2, 
#of_form .linha_obs_op3, 
#of_form .linha_obs_op4, 
#of_form .linha_id_marcacao,
#of_form .linha_local_marcacao,
#of_form .linha_id_produto,
#of_form .linha_quantidade_produtom1,
#of_form .linha_quantidade_produtom2,
#of_form .linha_id_maquina_lavacao,
#of_form .linha_sacos,
#of_form .linha_caixas,
#of_form .linha_paletes,
#of_form .linha_rafia,
#of_form .linha_obs_op5,
#of_form .linha_obs_op6,
#of_form .linha_obs_op7,
#of_form .linha_obs_op8,
#of_form .linha_obs_op9,
#of_form .linha_id_calibre_extrusao,
#of_form .linha_id_qualidade_extrusao,
#of_form .linha_id_linha_extrusao,
#of_form .linha_moldacao_alteracoesespecificacoes,
#of_form .linha_id_especificacaoproducaomoldacao,
#of_form .linha_extrusao_alteracoesespecificacoes,
#of_form .linha_id_especificacaoproducaoextrusao,
#of_form .linha_id_qualidade_moldacao,
#of_form .linha_id_calibre_moldacao,
#of_form .linha_info_materiaprima,
#of_form .linha_info_materiaprima,
#extrusao_obs
{
  display: none;
}
</style>
<?php echo $this->render_table_name($mode); ?>
<div class="xcrud-top-actions btn-group">
    <?php 
    echo $this->render_button('save_return','save','list','btn btn-primary','','create,edit');
    echo $this->render_button('save_new','save','create','btn btn-default','','create,edit');
    echo $this->render_button('save_edit','save','edit','btn btn-default','','create,edit');
    echo $this->render_button('return','list','','btn btn-warning');


if( $mode == 'view' ){
         
 echo $this->render_button('Editar','edit','','btn btn-success'); 
     
?>


<a href="javascript:;" onClick="window.print()" data-task="print" class="btn btn-default"><i class="glyphicon glyphicon-print"></i></a>

     <?php 
      }
     ?>

</div>
<div class="row">
<div class="col-sm-3">
	<div class="collection">
		<div class="list_variable">
		<a class="collection-item collection-header red white-text"><h4>Available variables</h4></a>
         <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{System.CurrentDate}');return false;" class="collection-item">{System.CurrentDate}</a>
  		<?php
        	if($countrow){ 
        	for ($i=0; $i < $countrow ; $i++) { $j = 0; $j = $i; $j++; ?>
        		<div class="<?php echo $j ?>"><a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'<?php echo $result[$i]['token'] ?>');return false;" class="collection-item a_var"><?php echo $result[$i]['token'] ?></a></div>
		<?php }} ?>
		</div>
            <a class="modal-trigger waves-effect waves-light btn collection-item black-text" data-toggle="modal" data-target="#myModal"
               onclick="$('.TheToken').focus();">Create / Manage Variables</a>
    </div>
    <div class="collection">
      
    <div class="list_produtos">
        <a class="collection-item collection-header red white-text"><h4>Produtos</h4></a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{id_produto}');return false;" class="collection-item a_var">{id_produto}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{nome_produto}');return false;" class="collection-item a_var">{nome_produto}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{id_categoriadeproduto}');return false;" class="collection-item a_var">{id_categoriadeproduto}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{actualizado_por}');return false;" class="collection-item a_var">{actualizado_por}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{actualizado_em}');return false;" class="collection-item a_var">{actualizado_em}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{observacoes_produto}');return false;" class="collection-item a_var">{observacoes_produto}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{ph_produto}');return false;" class="collection-item a_var">{ph_produto}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{densidade_relativa_produto}');return false;" class="collection-item a_var">{densidade_relativa_produto}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{viscosidade_produto}');return false;" class="collection-item a_var">{viscosidade_produto}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{aspeto_produto}');return false;" class="collection-item a_var">{aspeto_produto}</a>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{teor_de_solidos_produto}');return false;" class="collection-item a_var">{teor_de_solidos_produto}</a>
            
    </div>
    <input type="number" name="id_template" id="id_template" value="<?php echo $id_template; ?>" hidden>
    </div>
 <!-- modal --> 
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1" id="preview" style="width:100px">
    Preview
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          
        <!-- Modal body -->
        <div class="modal-body">
          <div class="data_view" style="overflow-y: scroll;height: 800px;">

            <div id="inlineIframe" style='width:100%; height:700px;width:495px;background: #eee; padding: 20px 15px 10px 15px;'></div>
          </div> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <div class="col-sx-6"><span id="totalpage" style="float: left;line-height: 2">
              Total Page:</span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          
        </div>
        
      </div>
    </div>
  </div>
   <!-- modal --> 
        
</div>
<div class="col-sm-9">
<div class="xcrud-view">

<br>

<?php echo $mode == 'view' ? $this->render_fields_list($mode,array('tag'=>'table','class'=>'table')) : $this->render_fields_list($mode,'div','div','label','div'); ?>
</div>
</div>
</div>
<div class="xcrud-nav">
    <?php echo $this->render_benchmark(); ?>
</div>

<?php 
if($mode == 'view' ){

	echo "<script>view=true;</script>";

  ?>

 <style type="text/css">
   .btn-sm{
    display: none;
   }
   .print{
    display: block;
   }


  #of_form .linha_id_cliente, #of_form .linha_id_qualidade_moldacao, #of_form .linha_id_calibre_moldacao, #of_form .linha_doc_cliente, #of_form .linha_info_materiaprima,#of_form .linha_id_of_materiaprima
 {

  width:100%;
 
 }

   </style>

<?php }else{     
      
echo "<script>view=false;</script>";

  ?>
 <style type="text/css">
body{
  overflow-x:hidden; 
}

#of_form .linha_id_of{display: none;}
#of_form .linha_id_ordem_operacao
{
clear:both;
}

  .desc  {
    clear: both;
    margin-top: 40px;

  }
  .clear  {
    clear: both;
  }


#lista_ops .col-sm-10, .col-sm-4 , .col-sm-2{
  margin-bottom: 10px;
}
#poncar_input, #topejar_input, #chanfrar_input{
  display: none;
  float: left;
  margin-left: 12px;
  }
  #lista_ops .bootstrap-switch 
 {

  float: left;
  
 }
.collection {
    margin: 2.2rem 0 1rem 0;
    border: 1px solid #e0e0e0;
    border-radius: 2px;
    overflow: hidden;
    position: relative;
}
.red {
    background-color: #F44336 !important;
}
.white-text {
    color: #FFFFFF !important;
}
a {
    text-decoration: none;
}
a:hover {
    text-decoration: none;
    background-color: #e0e0e0;
}
.black-text {
    color: #000000 !important;
}
.collection-item {
    background-color: #fff;
    line-height: 1.5rem;
    padding: 10px 20px;
    margin: 0;
    border-bottom: 1px solid #e0e0e0;
}
.collection a.collection-item {
    display: block;
    -webkit-transition: 0.25s;
    -moz-transition: 0.25s;
    -o-transition: 0.25s;
    -ms-transition: 0.25s;
    transition: 0.25s;
    color: #26a69a;
}
@media (min-width: 1100px) {

#lista_ops .bootstrap-switch 
 {
 margin-left: 12px;
  float: left;

 }

 #of_form .linha_info_materiaprima, #of_form .linha_doc_cliente
{  margin-left: 45px !important;
 }

  #of_form .linha_id_cliente, #of_form .linha_doc_cliente, #of_form .linha_info_materiaprima,#of_form .linha_id_of_materiaprima
 {
 float: left;
  width:50%;
 
 }


#of_form .linha_doc_cliente .col-sm-2, #of_form .linha_info_materiaprima .col-sm-2
{
    width:29%;
}

#of_form .linha_doc_cliente .col-sm-10,#of_form .linha_info_materiaprima .col-sm-10
{
   width:69%;
}

#of_form .linha_id_cliente .col-sm-2, #of_form .linha_id_of_materiaprima .col-sm-2{
width:34%;
}
#of_form .linha_id_cliente .col-sm-10, #of_form .linha_id_of_materiaprima .col-sm-10{
width:65%;

}
 
#of_form .linha_tres,
#of_form .linha_sequencia,#of_form .linha_semana,#of_form .linha_ano,
#of_form .linha_id_calibre,#of_form .linha_id_qualidade,#of_form .linha_quantidade,
#of_form .linha_id_calibre_extrusao,#of_form .linha_id_qualidade_extrusao,#of_form .linha_id_linha_extrusao{
  float: left;
  width:33%;
}


#of_form .linha_tres .col-sm-10,
#of_form .linha_sequencia .col-sm-10,#of_form .linha_semana .col-sm-10,#of_form .linha_ano .col-sm-10,
#of_form .linha_id_calibre .col-sm-10,#of_form .linha_id_qualidade .col-sm-10,#of_form .linha_quantidade .col-sm-10,
#of_form .linha_id_calibre_extrusao .col-sm-10,#of_form .linha_id_qualidade_extrusao .col-sm-10,#of_form .linha_id_linha_extrusao .col-sm-10{
width: 48.5%
}

#of_form .linha_tres .col-sm-2,
#of_form .linha_sequencia .col-sm-2,#of_form .linha_semana .col-sm-2,#of_form .linha_ano .col-sm-2,
#of_form .linha_id_calibre .col-sm-2,#of_form .linha_id_qualidade .col-sm-2,#of_form .linha_quantidade .col-sm-2,
#of_form .linha_id_calibre_extrusao .col-sm-2,#of_form .linha_id_qualidade_extrusao .col-sm-2,#of_form .linha_id_linha_extrusao .col-sm-2{
width:51.5%
}

#lista_ops{
  clear: both;
  margin-left: 6px;
}

#lista_ops .form-group {
    width: 100%;
    clear: both;
}

.quatro{
  width: 14%!important;
}

#lista_ops  .col-sm-2{
   width:16.66666667%;
}
#lista_ops  .col-sm-10{
  width: 83.33333333%
}

.leftspace{   
 margin-left:11% !important;
}

.trinta{
width: 29% !important; 
clear:none !important; 
float:left !important;
}
}

#of_form .linha_id_especificacaoproducaoextrusao
{
  clear: both !important;
   
}
<style>
    /***modal****/
  .data_view {
        padding: 30px 40px 30px 40px;
        box-shadow: 0 5px 5px 5px rgba(0, 0, 0, 0.16), 
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
  }
  .dis_none {
    display: none;
  }
  .gap{
    height: 20px;
  }
  .data_view{
    font-size: 65%!important;
    margin:0 auto;
    background: #e6e6e6;
  }
  #footer{
    font-size: 90%!important;
  }
  #header{
    border-bottom: 1px solid #000;
    margin-bottom: 10px;
  }
  .mce-pagebreak{
    display: none;
  }
  #header tr{
    border-bottom: 1px solid #000;
  }
</style>
</style>
<?php } 
 echo $this->render_button('save_return','save','list','btn btn-primary','','create,edit');
    echo $this->render_button('save_new','save','create','btn btn-default','','create,edit');
    echo $this->render_button('save_edit','save','edit','btn btn-default','','create,edit');
    echo $this->render_button('return','list','','btn btn-warning');
?>
<script type="text/javascript">

	$('#var_name').on("input", function () {
        var dInput = this.value;
        dInput = dInput.replace(/\s+/g, '');
        $('#var_token').val("{" + dInput + "}");
        $('#var_token').trigger("focus");
        $('#var_name').trigger("focus");
    });
    var v= []; var d = []; var product = [];

	$('#add_var').on('click', function () {

        var produtos_var = ["id_produto", "nome_produto", "id_categoriadeproduto", "actualizado_por", "observacoes_produto", "ph_produto", "densidade_relativa_produto", "viscosidade_produto", "aspeto_produto","teor_de_solidos_produto"];
        var produtos_num = produtos_var.length;
		    var var_name = $('#var_name').val();

        for (i = 0; i < produtos_num; i++) {

            if (produtos_var[i] == var_name) {
                alert("that variable name is already existing!");
                return;
            } else {   
               console.log(var_name);
            }
        }
        v.push(var_name); 
        var var_token = $('#var_token').val();
        d.push(var_token);
        var mceReplaceContent = "'mceReplaceContent'";
        var var_token1 = '{'+ var_name + '}'; 
        var token_name = "'" + var_token1 + "'";
        var OT = parseFloat($('#var_table tbody tr:last td').eq(0).text()); 
        var ss = isNaN(OT) ? 0 : OT;        
        var no = ss + 1;

        if (var_name !=''){
            $('#var_table tbody').append('<tr><td>' + no + '</td><td>' + no + '</td><td>' + var_name + '</td><td>' + var_token + '</td><td class="del"><i class="glyphicon glyphicon-trash"></td></tr></tbody></table>');                                             

    		$('.list_variable').append('<div class='+ no +'><a href="#" onclick="tinyMCE.execCommand('+ mceReplaceContent +',false,'+ token_name +'); return false;" class="collection-item a_var">'+var_token+'</a>');  
        } else {
            alert('Please fill out this fields');
        }
		$('#var_name').val("");
        $('#var_token').val("");                                           
    });

    $('#var_table tbody').on('click','.del', function () { 

    	var _this = $(this);
    	var id_val = $(this).prev().prev().prev().text();
        var a_no = $(this).prev().prev().prev().prev().text();
    	var a_list = '.'+ a_no; 
     
		$.ajax({
            dataType: 'json',
            url: "../backoffice/pages/deletevariable.php",
            type: "POST",
            data: { "id_val": id_val }
           }).done(function(data){

            _this.parent().remove();
            $(''+ a_list +'').remove();
        });
    });

    $('.btn-primary').on('click', function () { 
         var q = $(".linha_id_tipodedocumento select").val();
         var w = $(".linha_versao_template input").val();
         var e = $("iframe").contents().find("body").text(); 
         var id_template = $("#id_template").val();

         if (e !=='' && q !=='' &&  w !=='' ){ 
          $.ajax({
           dataType: 'json',
           url: "../backoffice/pages/addvariable.php",
           type: "POST",
           data: { "var_name": v, "var_token": d, "product_name": product, "id_template": id_template },
           }).done(function(data){ 
            var num = data['slot'];
            var num = 1;
         });
        } else {
         console.log(1);
        }
    });

    $('#preview').click(function(){

        var data = $("iframe").contents().find("body").html();
  
        $('.data_view').html("<div id='inlineIframe' style='width:100%; height:700px;width:495px;background: #fff; padding: 20px 15px 10px 15px; margin:0 auto'></div>");
        $('#inlineIframe').html(data);
        if($('#inlineIframe').height()<710) {
          var setheight = $('#contents').height('560px');
          $('#footer').css('margin-top', setheight);
        }
        var str = data;
        var n = str.match(/R0lGODlhAQABAIAAAAAAAP/gi); console.log(n);
        if(n == null){ 
           addpage(1, str);
              $('#totalpage').text('Totalpages: 1');
        } else{ 
        var n = n.length; 
        var pagenumber = n + 1; 
        $('#totalpage').text('Totalpages: '+ pagenumber);

        if (n > 0) { 
          var n = n + 1; console.log(n);
          addpage(n, str);
        }
      }
      function addpage(n, str){

        $('#inlineIframe').css('display','none');
        var addpagecontent = $('#inlineIframe').html();

        if ( n != 1) { 
          for (var i = 0; i < n; i++) {

            var p_content = $('#contents').html().split('<img');
        
            $('.data_view').append("<div class='gap'></div><div id='inlineIframe"+i+"' style='width:100%; height:700px;width:495px;background: #fff; padding: 20px 15px 10px 15px; margin:0 auto;'>"+addpagecontent+"</div>");
            var frameid = "#inlineIframe"+i;
            var pageheader = '<table id="header" style="width:100%"><tr><td style="width:25%">Document Title</td><td style="width:50%;text-align:center">header</td><td style="text-align:right;width25%">{PAGENO}</td><tr></table>';
            var replace_content = p_content[i].replace('data-mce-resize="false" data-mce-placeholder=""',' ');
            var replace_content = replace_content.replace('src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"',' ');
            var replace_content = replace_content.replace('class="mce-pagebreak"',' ');
            var replace_content = replace_content.replace('>','<span></span> ');
            var replace_content = replace_content.replace('data-mce-selected="1"',' ');

            var pagecontent = '<div style="height:580px;overflow-x:hidden" id="contents'+i+'">'+replace_content+'</div>';
            var pagefooter = '<table id="footer'+i+'" style="width:100%;font-size:80%!important"><thead style="text-align: center"><tr style="border-bottom: 1px solid #000"> <td style="width:33.3333%">Morada</td><td style="width:33.3333%">Contactos</td><td style="width:33.3333%">Informação</td> </tr> </thead> <tbody> <tr><td>Apartado 123</td> <td>Tel.: 000 000 000 e/o 111 111 111</td> <td>NIFº: 504 975 226</td> </tr>  <tr> <td>Fully Address</td><td>Fax: 222 222 222</td><td>Capital Social: 500.000 €uros</td></tr><tr><td>Portugal</td><td>E-mail: xpto@domain.lt</td><td>onservatória do Registo Comercial de Lisboa, sob o nº 999</td></tr><br> <tr><td>Produto: {nome_produto}</td><td>Documento valido até próxima atualização</td><td style="text-align:right">Página: {PAGENO} de {nb}</td></tr></tbody></table>';
            $(frameid).html(pageheader+pagecontent+pagefooter);
            var divname = $('.data_view:last-child() div').attr('id');
            var aaa = "#inlineIframe"+i;
            var contentid = '#contents'+i;
            var setheight = $(aaa).height()-$('#header').height()-$('#contents'+i).height()-100;
            $('#footer'+i).css('margin-top', setheight);

          }
        } else {
          var p_content = $('#contents').html();
        
            $('.data_view').append("<div class='gap'></div><div id='inlineIframe1' style='width:100%; height:700px;width:495px;background: #fff; padding: 20px 15px 10px 15px; margin:0 auto;'>"+addpagecontent+"</div>");
            var pageheader = '<table id="header" style="width:100%"><tr><td style="width:25%">Document Title</td><td style="width:50%;text-align:center">header</td><td style="text-align:right;width25%">{PAGENO}</td><tr></table>';

            var pagecontent = '<div style="height:580px;overflow-x:hidden" id="contents">'+p_content+'</div>';
            var pagefooter = '<table id="footer" style="width:100%;font-size:80%!important"><thead style="text-align: center"><tr style="border-bottom: 1px solid #000"> <td style="width:33.3333%">Morada</td><td style="width:33.3333%">Contactos</td><td style="width:33.3333%">Informação</td> </tr> </thead> <tbody> <tr><td>Apartado 123</td> <td>Tel.: 000 000 000 e/o 111 111 111</td> <td>NIFº: 504 975 226</td> </tr>  <tr> <td>Fully Address</td><td>Fax: 222 222 222</td><td>Capital Social: 500.000 €uros</td></tr><tr><td>Portugal</td><td>E-mail: xpto@domain.lt</td><td>onservatória do Registo Comercial de Lisboa, sob o nº 999</td></tr><br> <tr><td>Produto: {nome_produto}</td><td>Documento valido até próxima atualização</td><td style="text-align:right">Página: {PAGENO} de {nb}</td></tr></tbody></table>';
            $("#inlineIframe1").html(pageheader+pagecontent+pagefooter);
            var divname = $('.data_view:last-child() div').attr('id');
            var setheight = $("#inlineIframe1").height()-$('#header').height()-$('#contents').height()-120;
            $('#footer').css('margin-top', setheight);
        }
    }
    })

    $(document).ready(function(){
        appendfunction();  
         
    });

    function appendfunction(){
        setTimeout(function(){
            var editor_content = $('iframe').contents().find('#tinymce').find('div').html(); 
            if (editor_content){
              console.log(1);
          } else {
            $('iframe').contents().find('#tinymce').html('');
            $('iframe').contents().find('#tinymce').append('<div id=contents><br><br><br></div></div>');
          }
        },500);
    }
</script>
 