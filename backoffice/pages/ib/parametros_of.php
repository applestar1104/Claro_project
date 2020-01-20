 <?php 
   //chama tabela

    // nome da tabela
    $xcrud->table_name('Ordens de Fabrico');
    
    // nome das label - geral
    $xcrud->label('id_of','ID O.F.');
    $xcrud->label('id_tiposdeproducao','Tipo de Produção');
    $xcrud->label('ano','Ano');
    $xcrud->label('semana','Semana');
    $xcrud->label('sequencia','N.');
    $xcrud->label('id_calibre','Calibre');
    $xcrud->label('id_qualidade','Qualidade');
    $xcrud->label('quantidade','Quantidade');
    $xcrud->label('id_cliente','Cliente');
    $xcrud->label('doc_cliente','Doc. Cliente');
    $xcrud->label('id_of_materiaprima','O.F. Matéria Prima');
    $xcrud->label('info_materiaprima','Inf. Matéria Prima');
    $xcrud->label('id_of_materiaprima','O.F. Matéria Prima');
    $xcrud->label('id_ordem_operacao','Ordem de Operações');
    $xcrud->label('observacoes_gerais','Observações Gerais');
    $xcrud->label('observacoes_privadas','Observações Privadas');
    $xcrud->label('urgente','O.F. Urgente');
    $xcrud->label('activo','O.F. Activa');
    $xcrud->label('activo_materiaprima','O.F. Activa Matéria-Prima');
    $xcrud->label('id_toleranciaproducao','Tolerâncias Produção');
    $xcrud->label('producao_alteracoestolerancias','Alterações Tolerâncias'); 
    // nome das label - operação extrusão id=1
    $xcrud->label('id_calibre_extrusao','Calibre Extrusão');
    $xcrud->label('id_qualidade_extrusao','Qualidade Extrusão');
    $xcrud->label('id_linha_extrusao','Linha Extrusão');
    $xcrud->label('id_especificacaoproducaoextrusao','Especificações Extrusão');
    $xcrud->label('extrusao_alteracoesespecificacoes','Alterações Especificações');
    // nome das label - operação moldação id=2
    $xcrud->label('id_calibre_moldacao','Calibre Moldação');
    $xcrud->label('id_qualidade_moldacao','Qualidade Moldação');
    $xcrud->label('id_especificacaoproducaomoldacao','Especificações Moldação');
    $xcrud->label('moldacao_alteracoesespecificacoes','Alterações Especificações');
    // nome das label - operação rectificação id=3
    $xcrud->label('poncar','Ponçar');
    $xcrud->label('poncar_input','Ponçar valor');
    $xcrud->label('topejar','Topejar');
    $xcrud->label('topejar_input','Topejar valor');
    $xcrud->label('chanfrar','Chanfrar');
    $xcrud->label('chanfrar_input','Chanfrar valor');
    $xcrud->label('obs_op3','Obs. Rectificação');
    // nome das label - operação lavação id=4
    $xcrud->label('id_lavacao','Tipo de Lavação');
    $xcrud->label('id_maquina_lavacao','Máquina de Lavação');
    $xcrud->label('obs_op4','Obs. Lavação');
    // nome das label - operação escolha id=5
    $xcrud->label('id_escolha','Tipo de Escolha');
    $xcrud->label('ordem_escolha','Qual a primeira');
    $xcrud->label('obs_op5','Obs. Escolha');
    // nome das label - operação marcação id=6
    $xcrud->label('id_marcacao','Tipo de Marcação');
    $xcrud->label('local_marcacao','Local da Marcação');
    $xcrud->label('id_marca','Marca');
    $xcrud->label('obs_op6','Obs. Marcação');
    // nome das label - operação tratamento superfícial id=7
    $xcrud->label('id_produto','Produto Trat. Superficial');
    $xcrud->label('quantidade_produtom1','Quantidade Máquina 1');
    $xcrud->label('quantidade_produtom2','Quantidade Máquina 2');
    $xcrud->label('obs_op7','Obs. Trat. Superficial');
    // nome das label - operação contagem/embalagem id=8
    $xcrud->label('sacos','Sacos');
    $xcrud->label('caixas','Caixas');
    $xcrud->label('paletes','Paletes');
    $xcrud->label('rafia','Rafia');
    $xcrud->label('obs_op8','Obs. Contagem/Embalagem');
    // nome das label - operação expedição id=9
    $xcrud->label('data_expedicao','Data de Expedição');
    $xcrud->label('obs_op9','Obs. Expediçao');

    // relações - geral
    $xcrud->relation('id_tiposdeproducao','uc2_tiposdeproducao','id_tiposdeproducao','nome_tiposdeproducao','id_tiposdeproducao!=1 and activo=1','id_tiposdeproducao');
    $xcrud->relation('id_calibre','uc2_calibres','id_calibre','nome_calibre','id_calibre!=1 and activo=1');
    $xcrud->relation('id_qualidade','uc2_qualidades','id_qualidade','nome_qualidade','id_qualidade!=1 and activo=1');
    $xcrud->relation('id_cliente','uc2_clientes','id_cliente','nome_abreviado','activo=1','id_cliente');
    $xcrud->relation('id_of_materiaprima','uc2_of','id_of','nome_of','id_tiposdeproducao!=3 and activo_materiaprima!=0');  
    $xcrud->relation('id_ordem_operacao','uc2_ordem_operacoes','id_ordem_operacao','nome_ordem_operacao','activo=1');
  $xcrud->relation('id_toleranciaproducao','uc2_toleranciasproducao','id_toleranciaproducao','cod_toleranciaproducao','id_toleranciaproducao!=1 and activo=1');
    // relações - operação extrusão id=1
    $xcrud->relation('id_calibre_extrusao','uc2_calibres','id_calibre','nome_calibre','id_calibre!=1 and activo=1',false,true);  
    $xcrud->relation('id_qualidade_extrusao','uc2_qualidades','id_qualidade','nome_qualidade','id_qualidade!=1 and activo=1');
    $xcrud->relation('id_linha_extrusao','uc2_linhasdeextrusao','id_linhadeextrusao','nome_linhadeextrusao','id_linhadeextrusao!=1 and activo=1');  
    $xcrud->relation('id_especificacaoproducaoextrusao','uc2_especificacoesproducaoextrusao','id_especificacaoproducaoextrusao','cod_especificacaoproducaoextrusao','id_especificacaoproducaoextrusao!=1 and activo=1');
    // relações - operação moldação id=2
    $xcrud->relation('id_calibre_moldacao','uc2_calibres','id_calibre','nome_calibre','id_calibre!=1 and activo=1');  
    $xcrud->relation('id_qualidade_moldacao','uc2_qualidades','id_qualidade','nome_qualidade','id_qualidade!=1 and activo=1');  
    $xcrud->relation('id_especificacaoproducaomoldacao','uc2_especificacoesproducaomoldacao','id_especificacaoproducaomoldacao','cod_especificacaoproducaomoldacao','id_especificacaoproducaomoldacao!=1 and activo=1');
    // relações - operação rectificação id=3
    
    // relações - operação lavação id=4
    $xcrud->relation('id_lavacao','uc2_lavacoes','id_lavacao','nome_lavacao');
    $xcrud->relation('id_maquina_lavacao','uc2_maquinasdelavacao','id_maquinadelavacao','nome_maquinadelavacao');
    // relações - operação escolha id=5
    $xcrud->relation('id_escolha','uc2_tiposdeescolha','id_tipodeescolha','nome_tipodeescolha');
    $xcrud->relation('ordem_escolha','uc2_tiposdeescolha','id_tipodeescolha','nome_tipodeescolha');
    // relações - operação marcação id=6
    $xcrud->relation('id_marcacao','uc2_tiposdemarcacao','id_tipodemarcacao','nome_tipodemarcacao');
    $xcrud->relation('local_marcacao','uc2_locaisdemarcacao','id_localdemarcacao','nome_localdemarcacao');
	$xcrud->relation('id_marca','uc2_marcas','id_marca','nome_marca');
    // relações - operação tratamento superfícial id=7
    $xcrud->relation('id_produto','uc2_produtostratamentosuperficial','id_produtotratamentosuperficial','nome_produtotratamentosuperficial');
    // relações - operação contagem/embalagem id=8
        
    // relações - operação expedição id=9
    
    
    // set attr geral
    $xcrud->set_attr('id_tiposdeproducao',array('id'=>'tipo'));
    $xcrud->set_attr('semana',array('id'=>'semana'));
    $xcrud->set_attr('ano',array('id'=>'ano'));
    $xcrud->set_attr('sequencia',array('id'=>'seq'));
    $xcrud->set_attr('id_ordem_operacao',array('id'=>'ordem'));
    $xcrud->set_attr('id_especificacaoproducaoextrusao',array('id'=>'id_extrusao'));
    $xcrud->set_attr('id_especificacaoproducaomoldacao',array('id'=>'id_moldacao'));
    $xcrud->set_attr('id_toleranciaproducao',array('id'=>'id_tolerancia'));
    $xcrud->set_attr('id_cliente',array('id'=>'id_cliente'));
    $xcrud->set_attr('id_operacao',array('id'=>'id_operacao'));
    $xcrud->set_attr('quantidade', array('id'=>'milhares'));
    // set attr - operação rectificação id=3
    $xcrud->set_attr('poncar',array('id'=>'poncar_db'));
    $xcrud->set_attr('poncar_input',array('id'=>'poncar_input_db')); 
    $xcrud->set_attr('topejar',array('id'=>'topejar_db'));
    $xcrud->set_attr('topejar_input',array('id'=>'topejar_input_db'));
    $xcrud->set_attr('chanfrar',array('id'=>'chanfrar_db'));
    $xcrud->set_attr('chanfrar_input',array('id'=>'chanfrar_input_db'));    
    $xcrud->set_attr('obs_op3',array('id'=>'obs_op3_db'));  
    // set attr - operação lavação id=4
    $xcrud->set_attr('id_lavacao',array('id'=>'id_lavacao_db'));
    $xcrud->set_attr('id_maquina_lavacao',array('id'=>'id_maquina_lavacao_db'));
    $xcrud->set_attr('obs_op4',array('id'=>'obs_op4_db'));
    // set attr - operação escolha id=5
    $xcrud->set_attr('id_escolha',array('id'=>'id_escolha_db'));
    $xcrud->set_attr('ordem_escolha',array('id'=>'id_escolha_ordem_db'));
    $xcrud->set_attr('obs_op5',array('id'=>'obs_op5_db'));
    // set attr - operação marcação id=6
    $xcrud->set_attr('id_marcacao',array('id'=>'id_marcacao_db'));
    $xcrud->set_attr('local_marcacao',array('id'=>'local_marcacao_db'));
    $xcrud->set_attr('id_marca',array('id'=>'id_marca_db'));
    $xcrud->set_attr('obs_op6',array('id'=>'obs_op6_db'));
    // set attr - operação tratamento superfícial id=7
    $xcrud->set_attr('id_produto',array('id'=>'id_produto_db'));
    $xcrud->set_attr('quantidade_produtom1',array('id'=>'quantidade_produtom1_db'));
    $xcrud->set_attr('quantidade_produtom2',array('id'=>'quantidade_produtom2_db'));
    $xcrud->set_attr('obs_op7',array('id'=>'obs_op7_db'));
    // set attr - operação contagem/embalagem id=8
    $xcrud->set_attr('sacos',array('id'=>'sacos_db'));
    $xcrud->set_attr('caixas',array('id'=>'caixas_db'));
    $xcrud->set_attr('paletes',array('id'=>'paletes_db'));
    $xcrud->set_attr('rafia',array('id'=>'rafia_db'));
    $xcrud->set_attr('obs_op8',array('id'=>'obs_op8_db'));
    // set attr - operação expedição id=9
    $xcrud->set_attr('data_expedicao',array('id'=>'data_expedicao_db'));
    $xcrud->set_attr('obs_op9',array('id'=>'obs_op9_db'));

    // after insert 
    $xcrud->after_insert('prioridade_operacoes'); // automatic call of functions.php 
    $xcrud->after_update('prioridade_operacoes_update'); // automatic call of functions.php 
    // column_callback
    $xcrud->column_callback('quantidade','numero_format');

	// relações para log
    $xcrud->relation('criado_por','login_users','user_id','username'); 
    $xcrud->relation('actualizado_por','login_users','user_id','username');   
  
  
    $xcrud->set_var('nome_tabela','uc2_of');
    $xcrud->set_var('nome_campo','id_of');
    $xcrud->set_var('accao','Inseriu');

    // logs e user


    $xcrud->before_insert('trimnumero'); // automatic call of functions.php
    $xcrud->before_update('trimnumero'); // automatic call of functions.php
     
	// activar/desactivar
    $xcrud->column_callback('activo','estados_act');
    $xcrud->column_callback('activo_materiaprima','estados_act2');
    $xcrud->column_callback('poncar','boleano');
    $xcrud->column_callback('topejar','boleano');
    $xcrud->column_callback('chanfrar','boleano');
    
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
  
	// ordem de apresentação
    $xcrud->order_by('id_of','desc');
    
    // apresentar ID no view
    $xcrud->show_primary_ai_field(true);

   
	// botão para adicionar anexo
    $xcrud->button('index.php?page=uc2/anexos&id_of={id_of}', false, 'glyphicon glyphicon-plus');

?>