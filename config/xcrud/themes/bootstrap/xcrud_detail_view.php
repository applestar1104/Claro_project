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

<div class="xcrud-view">

<br>

<?php echo $mode == 'view' ? $this->render_fields_list($mode,array('tag'=>'table','class'=>'table')) : $this->render_fields_list($mode,'div','div','label','div'); ?>
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

</style>
<?php } 
 echo $this->render_button('save_return','save','list','btn btn-primary','','create,edit');
    echo $this->render_button('save_new','save','create','btn btn-default','','create,edit');
    echo $this->render_button('save_edit','save','edit','btn btn-default','','create,edit');
    echo $this->render_button('return','list','','btn btn-warning');
?>
