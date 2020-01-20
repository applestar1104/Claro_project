<style type="text/css">
tr {
	cursor:pointer;
}
</style>
<div id="btn_active" style="display:none" class="alert alert-success">
<strong>Alterado</strong> Com sucesso.
  </div>

<?php

 	    $db3 = Xcrud_db::get_instance();        
        $query3 = 'SELECT * FROM `uc2_operacoes` where activo=1  ';
        $db3->query($query3);
        $result3 = $db3->result();
        $options="<option value=''>Seleccione Operação</option>";
        foreach ($result3 as $key2 => $item2){
        	 if(isset($_GET['id_op']) and $_GET['id_op']==$item2['id_operacao']){
        	 	  $options.='<option value="'.$item2['id_operacao'].'"  selected>'.$item2['nome_operacao'].'</option>';
        	 }else{
        	 	 $options.='<option value="'.$item2['id_operacao'].'">'.$item2['nome_operacao'].'</option>';
    
        	 }

      
    }
	echo '<select class="xcrud-input form-control" id="id_op">'.$options.'</select>';

		$xcrud = Xcrud::get_instance();
    //chama tabela
    //$xcrud->table('uc2_of'); 
    	$xcrud->table('uc2_of_prioridades'); 
		 $xcrud->order_by('prioridade','ASC');
		if(isset($_GET['id_op'])){
		$op=$_GET['id_op'];
	  	$xcrud->where('id_op',$op);
	  	//$xcrud->where('activo',1);

	  	$xcrud->join('id_of','uc2_of','id_of'); // on profile.token_id = tokens.id
	  	

	  	$xcrud->label('uc2_of.nome_of','O.F.');
	  	$xcrud->label('uc2_of.activo','O.F Activo');
	  	$xcrud->label('activo','Operação Activa');
	  	
// Operação Extrusão
if($op==1){

$xcrud->columns('uc2_of.nome_of, uc2_of.id_calibre_extrusao, uc2_of.id_qualidade_extrusao, uc2_of.id_linha_extrusao, uc2_of.id_especificacaoproducaoextrusao, uc2_of.extrusao_alteracoesespecificacoes,activo,uc2_of.activo'); 

	  	}
	  	
// Operação Moldação
if($op==2){

$xcrud->columns('uc2_of.nome_of,uc2_of.id_qualidade_moldacao, uc2_of.id_especificacaoproducaomoldacao, uc2_of.id_especificacaoproducaomoldacao,uc2_of.moldacao_alteracoesespecificacoes,activo,uc2_of.activo'); 
	  	
	  	}
	  	
// Operação Rectificação
if($op==3){

$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.poncar,uc2_of.poncar_input,uc2_of.topejar,uc2_of.topejar_input,uc2_of.chanfrar,uc2_of.chanfrar_input,uc2_of.obs_op3,activo,uc2_of.activo'); 
	  	
	  	}

// Operação Lavação
if($op==4){

$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.id_lavacao,uc2_of.obs_op4,activo,uc2_of.activo'); 
	  	
	  	}
	  	
// Operação Escolha
if($op==5){

$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.id_escolha,uc2_of.ordem_escolha,uc2_of.obs_op5,activo,uc2_of.activo'); 
	  	
	  	}
	  	
// Operação Marcação
if($op==6){

$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.id_marcacao,uc2_of.local_marcacao,uc2_of.id_marca,uc2_of.obs_op6,activo,uc2_of.activo'); 
	  	
	  	}
	  	
// Operação Tratamento Superficial
if($op==7){

$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.id_produto,uc2_of.quantidade_produtom1,uc2_of.quantidade_produtom2,uc2_of.obs_op7,activo,uc2_of.activo');  
	  	
	  	}
	  	
// Operação Embalagem/Contagem
if($op==8){

$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.sacos,uc2_of.caixas,uc2_of.paletes,uc2_of.rafia,uc2_of.obs_op8,activo,uc2_of.activo'); 
	  	
	  	}

// Operação Expedição
if($op==9){

$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.data_expedicao,uc2_of.obs_op9,activo,uc2_of.activo'); 
	  	
	  	}

 	$xcrud->column_callback('id_of','get_ref');




  	$xcrud->label('id_of','OF');
 	$xcrud->label('id_tiposdeproducao','Tipo P.');
    $xcrud->label('sequencia','Seq.');
    $xcrud->label('semana','Sem.');
    
    $xcrud->relation('uc2_of.id_especificacaoproducaomoldacao','uc2_especificacoesproducaomoldacao','id_especificacaoproducaomoldacao','cod_especificacaoproducaomoldacao');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('uc2_of.id_calibre','uc2_calibres','id_calibre','nome_calibre');//campo origem / tabela / destino / destino_nome 
    $xcrud->relation('uc2_of.id_lavacao','uc2_lavacoes','id_lavacao','nome_lavacao');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('uc2_of.id_escolha','uc2_tiposdeescolha','id_tipodeescolha','nome_tipodeescolha');//campo origem / tabela / destino / destino_nome
    $xcrud->relation('uc2_of.id_marcacao','uc2_tiposdemarcacao','id_tipodemarcacao','nome_tipodemarcacao');//campo origem / tabela / destino / destino_nome  
	$xcrud->relation('uc2_of.local_marcacao','uc2_locaisdemarcacao','id_localdemarcacao','nome_localdemarcacao');//campo origem / tabela / destino / destino_nome
	$xcrud->relation('uc2_of.id_marca','uc2_marcas','id_marca','nome_marca');//campo origem / tabela / destino / destino_nome
	$xcrud->relation('uc2_of.id_produto','uc2_produtostratamentosuperficial','id_produtotratamentosuperficial','nome_produtotratamentosuperficial');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('uc2_of.id_cliente','clientes','id_cliente','nome_abreviado');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('uc2_of.id_qualidade','uc2_qualidades','id_qualidade','nome_qualidade');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('uc2_of.id_especificacaoproducaoextrusao','uc2_especificacoesproducaoextrusao','id_especificacaoproducaoextrusao','cod_especificacaoproducaoextrusao');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('uc2_of.id_qualidade_moldacao','uc2_qualidades','id_qualidade','nome_qualidade');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_especificacaoproducaomoldacao','uc2_especificacoesproducaomoldacao','id_especificacaoproducaomoldacao','cod_especificacaoproducaomoldacao');//campo origem / tabela / destino / destino_nome  
	$xcrud->relation('uc2_of.id_linha_extrusao','uc2_linhasdeextrusao','id_linhadeextrusao','nome_linhadeextrusao');//campo origem / tabela / destino / destino_nome  
	$xcrud->relation('uc2_of.id_calibre_extrusao','uc2_calibres','id_calibre','nome_calibre');//campo origem / tabela / destino / destino_nome  
	$xcrud->relation('uc2_of.id_qualidade_extrusao','uc2_qualidades','id_qualidade','nome_qualidade');//campo origem / tabela / destino / destino_nome  
	$xcrud->relation('uc2_of.id_toleranciaproducao','uc2_toleranciasproducao','id_toleranciaproducao','cod_toleranciaproducao');//campo origem / tabela / destino / destino_nome  
	$xcrud->relation('uc2_of.id_of_materiaprima','uc2_of','id_of','nome_of','id_tiposdeproducao!=3 and activo_materiaprima!=0');//campo origem / tabela / destino / destino_nome 
    $xcrud->relation('uc2_of.id_calibre_extrusao','uc2_calibres','id_calibre','nome_calibre',false,false,true);//campo origem / tabela / destino / destino_nome 
    //$xcrud->relation('uc2_of.quantidade','uc2_of');//campo 
    
    
    
    
    $xcrud->unset_add();

     $xcrud->set_var('nome_tabela','uc2_of_prioridades');
     $xcrud->set_var('nome_campo','id_prioridade');
     $xcrud->set_var('accao','prioridade');

	  $xcrud->column_callback('activo','estados_act');
	  $xcrud->create_action('publish', 'publish_action'); // action callback, function publish_action() in functions.php
	  $xcrud->create_action('unpublish', 'unpublish_action');
   $xcrud->button('index.php?page=uc2/uc2_op_registo&id_of={id_of}&id_op={id_op}', false, 'glyphicon glyphicon-plus');
   
   
   
   
   
   
   
   
    echo $xcrud->render();



	}


//

 	//$xcrud->subselect('total','2');



?>

<script type="text/javascript">
	
	jQuery(document).on('ready xcrudafterrequest', function(event, container) {




$('#id_op').change(function() {
	window.location.href ='index.php?page=uc2/listagem_op&id_op='+$(this).val();

});



//Helper function to keep table row from collapsing when being sorted
	var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index)
		{
		  $(this).width($originals.eq(index).width())
		});
		return $helper;
	};

	//Make diagnosis table sortable
	$(".xcrud-list tbody").sortable({
    	helper: fixHelperModified,
		stop: function(event,ui) {renumber_table('.xcrud-list tbody tr')}
	}).disableSelection();

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

//var prodId = getParameterByName('id_op');

//Renumber table rows
function renumber_table(tableID) {


	$(tableID).each(function() {
		count = $(this).parent().children().index($(this)) + 1;
		primary=$(this).find('a').data("primary");
	$('#btn_active').show();  setTimeout( function() { $('#btn_active').hide(); }, 2000);
	//alert(count);
	 $.getJSON('pages/uc2/prioridades.php?prioridade='+count +'&id='+primary, function(data) {    
	
		  })
		//teste= $(this).data("primary");
		//alert(teste);
		//$(this).find('.priority').html(count);
	});
}


});

</script>

