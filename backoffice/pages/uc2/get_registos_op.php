<?php
$xcrud = Xcrud::get_instance();  
    $xcrud->table('uc2_op_registo');
    $xcrud->relation('id_calibre','uc2_calibres','id_calibre','nome_calibre');//campo origem / tabela / destino / destino_nome 
    $xcrud->relation('id_qualidade','uc2_qualidades','id_qualidade','nome_qualidade');//campo origem / tabela / destino / destino_nome  
    $xcrud->set_attr('id_calibre',array('id'=>'id_calibre')); 
    $xcrud->set_attr('id_qualidade',array('id'=>'id_qualidade')); 
    $xcrud->set_attr('id_of',array('id'=>'id_of'));
    $xcrud->set_attr('id_op',array('id'=>'id_op'));
    $xcrud->set_attr('conforme',array('id'=>'conforme'));
    $xcrud->set_attr('op1_etiqueta',array('id'=>'op1_etiqueta'));
  

    $xcrud->relation('op1_etiqueta','uc2_etiquetasop1','id_etiquetaop1','cod_etiquetaop1','activo=1','id_etiquetaop1');//campo origem / tabela / destino / destino_nome
   $xcrud->relation('op2_etiqueta','uc2_etiquetasop2','id_etiquetaop2','cod_etiquetaop2','activo=1','id_etiquetaop2');//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op3_etiqueta','uc2_etiquetasop3','id_etiquetaop3','cod_etiquetaop3','activo=1','id_etiquetaop3',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op4_etiqueta','uc2_etiquetasop4','id_etiquetaop4','cod_etiquetaop4','activo=1','id_etiquetaop4',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op5_etiqueta','uc2_etiquetasop5','id_etiquetaop5','cod_etiquetaop5','activo=1','id_etiquetaop5',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op6_etiqueta','uc2_etiquetasop6','id_etiquetaop6','cod_etiquetaop6','activo=1','id_etiquetaop6',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op7_etiqueta','uc2_etiquetasop7','id_etiquetaop7','cod_etiquetaop7','activo=1','id_etiquetaop7',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op8_etiqueta','uc2_etiquetasop8','id_etiquetaop8','cod_etiquetaop8','activo=1','id_etiquetaop8',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op9_etiqueta','uc2_etiquetasop9','id_etiquetaop9','cod_etiquetaop9','activo=1','id_etiquetaop9',true);//campo origem / tabela / destino / destino_nome   
    
   //  $xcrud->relation('op3_etiqueta_entrada','uc2_etiquetasop2','id_etiquetaop2','cod_etiquetaop2','activo=1','id_etiquetaop2',true);//campo origem / tabela / destino / destino_nome   
     
     //$xcrud->relation('op(id_op)_etiqueta_entrada’,’uc2_etiquetasop(id_op)','id_etiquetaop(id_op)','cod_etiquetaop(id_op)','activo=1','id_etiquetaop',true);//campo origem / tabela / destino / destino_nome  
    //$xcrud->column_callback('op3_etiqueta_entrada','fix_entrada');
     $xcrud->relation('op1_calibre','uc2_calibres','id_calibre','nome_calibre');//campo origem / tabela / destino / destino_nome

    $xcrud->where('id_op =',$op);
    if(isset($_GET['id_of'])){
         $xcrud->where('id_of =', $_GET['id_of']); 
    }
    $xcrud->column_callback('op'.$op.'_etiqueta_entrada','fix_entrada');
// $xcrud->column_callback('op4_etiqueta_entrada','fix_entrada');
//  $xcrud->before_list('fix_entrada');

    $xcrud->unset_add();
    	$xcrud->highlight_row('confirmado','=','0','#EEE8AA'); // linha amarela se não tiver anexos

    //$xcrud->unset_edit();
    //$xcrud->unset_remove();
    //$xcrud->unset_print();
    //$xcrud->unset_csv();
    //$xcrud->unset_numbers();
    //$xcrud->unset_pagination();
    //$xcrud->unset_limitlist();
    //$xcrud->benchmark(false);
        if(isset($titulo_tabela))
    $xcrud->table_name('Registos Operações '.$titulo_tabela);
        else
    $xcrud->table_name('Registos Operações');
    
  	// activar/desactivar
 	$xcrud->column_callback('confirmado','estados_act3');
  	$xcrud->create_action('publish3', 'publish_action3'); // action callback, function publish_action() in functions.php
  	$xcrud->create_action('unpublish3', 'unpublish_action3');
  	
  	$xcrud->order_by('id_op_registo','DESC');
// relações para log
    //$xcrud->relation('criado_por','login_users','user_id','username'); 
    //$xcrud->relation('actualizado_por','login_users','user_id','username');   
  
  
    $xcrud->set_var('nome_tabela','uc2_op_registo');
    $xcrud->set_var('nome_campo','id_op_registo');
    $xcrud->set_var('accao','Inseriu');
$xcrud->column_callback('quantidade','numero_format');

    // Operação Extrusão
if($op==1){

$xcrud->columns('id_of,id_op,op1_etiqueta,op1_calibre,conforme,naoconforme_razao,observacoes,confirmado'); 

        }
/*
        
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
*/

  echo $xcrud->render();
  ?>