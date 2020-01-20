<?php
     // Operação Extrusão
		if($op==1){
		$xcrud->table_name('Ordens de Fabrico - Extrusão');
		$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre_extrusao,uc2_of.id_qualidade_extrusao, uc2_of.id_linha_extrusao, uc2_of.id_especificacaoproducaoextrusao, uc2_of.extrusao_alteracoesespecificacoes'); 

	  	}
	  	
	  	// Operação Moldação
	  	if($op==2){
	  	$xcrud->table_name('Ordens de Fabrico - Moldação');
	  	$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre_moldacao,uc2_of.id_qualidade_moldacao, uc2_of.id_especificacaoproducaomoldacao, uc2_of.id_especificacaoproducaomoldacao,uc2_of.moldacao_alteracoesespecificacoes'); 
	  	//$xcrud->before_list('get_moldacao');	  	
	  	}
	  	
	  	// Operação Rectificação
	  	if($op==3){
	  	$xcrud->table_name('Ordens de Fabrico - Rectificação');	
	  	$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.poncar,uc2_of.poncar_input,uc2_of.topejar,uc2_of.topejar_input,uc2_of.chanfrar,uc2_of.chanfrar_input,uc2_of.obs_op3,uc2_of.id_toleranciaproducao,uc2_of.producao_alteracoestolerancias'); 
	  	
	  	}

	  	// Operação Lavação
	  	if($op==4){
	  	$xcrud->table_name('Ordens de Fabrico - Lavação');
	  	$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.id_lavacao,uc2_of.obs_op4,uc2_of.id_toleranciaproducao,uc2_of.producao_alteracoestolerancias'); 
	  	
	  	}
	  	
	  	// Operação Escolha
	  	if($op==5){
	  	$xcrud->table_name('Ordens de Fabrico - Escolha');
	  	$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.id_escolha,uc2_of.ordem_escolha,uc2_of.obs_op5,uc2_of.id_toleranciaproducao,uc2_of.producao_alteracoestolerancias'); 
	  	
	  	}
	  	
		// Operação Marcação
		if($op==6){
		$xcrud->table_name('Ordens de Fabrico - Marcação');
		$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.id_marcacao,uc2_of.local_marcacao,uc2_of.id_marca,uc2_of.obs_op6,uc2_of.id_toleranciaproducao,uc2_of.producao_alteracoestolerancias'); 
			  	
	  	}
	  	
		// Operação Tratamento Superficial
		if($op==7){
		$xcrud->table_name('Ordens de Fabrico - Tratamento Superficial');
		$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.id_produto,uc2_of.quantidade_produtom1,uc2_of.quantidade_produtom2,uc2_of.obs_op7,uc2_of.id_toleranciaproducao,uc2_of.producao_alteracoestolerancias');  
			  	
		}
			  	
		// Operação Embalagem/Contagem
		if($op==8){
		$xcrud->table_name('Ordens de Fabrico - Embalagem/Contagem');
		$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.sacos,uc2_of.caixas,uc2_of.paletes,uc2_of.rafia,uc2_of.obs_op8,uc2_of.id_toleranciaproducao,uc2_of.producao_alteracoestolerancias'); 
			  	
		}
		
		// Operação Expedição
		if($op==9){
		$xcrud->table_name('Ordens de Fabrico - Expedição');
		$xcrud->columns('uc2_of.nome_of,uc2_of.id_calibre,uc2_of.id_qualidade,uc2_of.quantidade,uc2_of.id_cliente,uc2_of.id_of_materiaprima,uc2_of.data_expedicao,uc2_of.obs_op9,uc2_of.id_toleranciaproducao,uc2_of.producao_alteracoestolerancias'); 
			  	
	  	}
	  	?>