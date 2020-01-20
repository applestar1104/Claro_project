<style type="text/css">

.select2OptionPicker li {
  display: none;
margin-top: 10px;
  display:block !important;
}


.form-horizontal .select2OptionPicker .ver {
 display:block !important;
}


.form-horizontal .select2OptionPicker li {
  display:none !important;
}


.form-horizontal .select2OptionPicker li:nth-child(-n+8) {
  display:block !important;
}


.select2OptionPicker li a {
width: auto;
height: 30px;
font-size: 15px; 
padding-bottom: 10px;
}

.vertudo{
    margin-top: 10px;
}


    .linha_id_of,  .linha_id_op 
    {
        display: none;
    }
@media (min-width: 1100px) {
    /*tudo na mm linha*/

    
.linha_op2_diametro2,
.linha_op2_diametro3,
.linha_op2_diametro4,
.linha_op2_diametro5,
.linha_op2_diametro2_2,
.linha_op2_diametro2_3,
.linha_op2_diametro2_4,
.linha_op2_diametro2_5,
.linha_op2_diametro3_2,
.linha_op2_diametro3_3,
.linha_op2_diametro3_4,
.linha_op2_diametro3_5,
.linha_op2_comprimento2_2,.linha_op2_comprimento2_3,.linha_op2_comprimento2_4,.linha_op2_comprimento2_5,
.linha_op2_comprimento3_2,.linha_op2_comprimento3_3,.linha_op2_comprimento3_4,.linha_op2_comprimento3_5,
.linha_op2_comprimento2,.linha_op2_comprimento3,.linha_op2_comprimento4,.linha_op2_comprimento5
{
width: 18%;
float:left;

}


.linha_op2_comprimentomedio,
.linha_op2_diametromedio,
.linha_op2_comprimentomedio2,
.linha_op2_diametromedio2,
.linha_op2_comprimentomedio3,
.linha_op2_diametromedio3{
    clear: both;
}   

.linha_op2_comprimento1,
.linha_op2_diametro1,
.linha_op2_comprimento2_1,
.linha_op2_diametro2_1,
.linha_op2_comprimento3_1,
.linha_op2_diametro3_1
{
    width: 30%;
    float: left;
    margin-left: 4% !important;
}


.linha_op2_comprimento1 .col-sm-10,
.linha_op2_diametro1 .col-sm-10,
.linha_op2_comprimento2_1 .col-sm-10,
.linha_op2_diametro2_1 .col-sm-10,
.linha_op2_comprimento3_1 .col-sm-10,
.linha_op2_diametro3_1 .col-sm-10
{
  width: 50%;
}

.linha_op2_diametro1 .col-sm-2,
.linha_op2_comprimento1 .col-sm-2,
.linha_op2_diametro2_1 .col-sm-2,
.linha_op2_comprimento2_1 .col-sm-2,
.linha_op2_diametro3_1 .col-sm-2,
.linha_op2_comprimento3_1 .col-sm-2

{
  width: 40%;
}


.linha_op2_diametro2 .col-sm-2,
.linha_op2_diametro3 .col-sm-2,
.linha_op2_diametro4 .col-sm-2,
.linha_op2_diametro5 .col-sm-2,

.linha_op2_diametro2_2 .col-sm-2,
.linha_op2_diametro2_3 .col-sm-2,
.linha_op2_diametro2_4 .col-sm-2,
.linha_op2_diametro2_5 .col-sm-2,

.linha_op2_diametro3_2 .col-sm-2,
.linha_op2_diametro3_3 .col-sm-2,
.linha_op2_diametro3_4 .col-sm-2,
.linha_op2_diametro3_5 .col-sm-2,

.linha_op2_comprimento2 .col-sm-2,
.linha_op2_comprimento3 .col-sm-2,
.linha_op2_comprimento4 .col-sm-2,
.linha_op2_comprimento5 .col-sm-2,

.linha_op2_comprimento2_2 .col-sm-2,
.linha_op2_comprimento2_3 .col-sm-2,
.linha_op2_comprimento2_4 .col-sm-2,
.linha_op2_comprimento2_5 .col-sm-2,


.linha_op2_comprimento3_2 .col-sm-2,
.linha_op2_comprimento3_3 .col-sm-2,
.linha_op2_comprimento3_4 .col-sm-2,
.linha_op2_comprimento3_5 .col-sm-2
{
display: none;
}





.linha_conforme, .linha_campo1,.linha_campo2,.linha_campo3,.linha_campo4{
width: 24%;
float: left;
}

.linha_conforme .col-sm-2, .linha_campo1 .col-sm-2,.linha_campo2 .col-sm-2,.linha_campo3 .col-sm-2,.linha_campo4 .col-sm-2{
width: 35%;
float: left;
}

.linha_conforme .col-sm-10, .linha_campo1 .col-sm-10,.linha_campo2 .col-sm-10,.linha_campo3 .col-sm-10,.linha_campo4 .col-sm-10{
width: 65%;
float: left;
}
.linha_conforme
{
    margin-left: 7.5% !important;
     clear:both;
}

.linha_naoconforme_razao {

display: none;
}


.linha_naoconforme_razao .col-sm-2 {
  width: 10%;
float: left;
}
.linha_naoconforme_razao .col-sm-10 {
  width: 50%;
  float: right
}

.linha_observacoes
{
    clear:both;
}

}
</style>

<!--
    <script type="text/javascript">
id_qualidade="";
id_calibre="";
    </script>
-->


<?php
// selects


        $db3 = Xcrud_db::get_instance();        
        $query3 = 'SELECT * FROM `uc2_operacoes` where activo=1 ';
        $db3->query($query3);
        $result3 = $db3->result();
        $options="<option value='selected'>- Seleccione -</option>";
        if(isset($_GET['id_op'])){ $options=""; }
        foreach ($result3 as $key2 => $item2){
             $estado="";
      if(isset($_GET['id_op']) &&  $_GET['id_op']==$item2['id_operacao']){ $estado="selected"; }

        $options.='<option value="'.$item2['id_operacao'].'" '.$estado.'>'.$item2['nome_operacao'].'</option>';

    }
    echo '<div class="row"><div class="col-md-12"> <select class="xcrud-input form-control" id="id_op_select">'.$options.'></select></div></div><hr style="margin:5px;">';
        


 if(isset($_GET['id_op'])){

  $op=$_GET['id_op'];
 
        $db4 = Xcrud_db::get_instance();        
        $query4 = 'SELECT * FROM `uc2_of_prioridades`, uc2_of WHERE uc2_of_prioridades.id_op='.$op.' and uc2_of_prioridades.activo=1 and uc2_of.activo=1 and
uc2_of_prioridades.id_of=uc2_of.id_of ORDER BY prioridade';
        $db4->query($query4);
        $result4 = $db4->result();
      //  $options="<option value='0'>Selecione O.F.</option>";
        $options='';
        foreach ($result4 as $key4 => $item4){
            
             $nome_of=$item4['nome_of'];
             $id_qualidade=$item4['id_qualidade'];
               $id_calibre=$item4['id_calibre'];
               $id_lavacao=$item4['id_lavacao'];
           
            if(isset($_GET['id_of']) &&  $_GET['id_of']==$item4['id_of'])
                { 
                    $estado="selected"; 
                } 
            else 
                { $estado="";
                 }



        $options.='<option value="'.$item4['id_of'].'" '.$estado.'>'.$nome_of.'</option>'; }
        
    echo '<div class="row"><div class="col-md-12"> <select class="xcrud-input form-control" id="id_of_select">'.$options.'</select></div><br><br>';
 }
 else
 {
   echo '<div class="row"><div class="col-md-12"> <select class="hide xcrud-input form-control" id="id_of_select"></select></div><br><br>'; 
 }
// fim selects
?>
</div>




<?php
    
    $xcrud = Xcrud::get_instance();
    
    //chama tabela

    if(isset($_GET['id_op'])){
    $xcrud->table('uc2_of_prioridades'); 
    $xcrud->join('id_of','uc2_of','id_of');
    }
    else
    {
    $xcrud->table('uc2_of'); 
    }
   
      // nome da tabela
    $xcrud->table_name('Ordens de Fabrico');

    // nome das label - geral
    $xcrud->label('uc2_of.id_of','ID O.F.');
    $xcrud->label('uc2_of.nome_of','Nome O.F.');
    $xcrud->label('uc2_of.id_tiposdeproducao','Tipo de Produção');
    $xcrud->label('uc2_of.ano','Ano');
    $xcrud->label('uc2_of.semana','Semana');
    $xcrud->label('uc2_of.sequencia','N.');
    $xcrud->label('uc2_of.id_calibre','Calibre');
    $xcrud->label('uc2_of.id_qualidade','Qualidade');
    $xcrud->label('uc2_of.quantidade','Quantidade');
    $xcrud->label('uc2_of.id_cliente','Cliente');
    $xcrud->label('uc2_of.doc_cliente','Doc. Cliente');
    $xcrud->label('uc2_of.id_of_materiaprima','O.F. Matéria Prima');
    $xcrud->label('uc2_of.info_materiaprima','Inf. Matéria Prima');
    $xcrud->label('uc2_of.id_of_materiaprima','O.F. Matéria Prima');
    $xcrud->label('uc2_of.id_ordem_operacao','Ordem de Operações');
    $xcrud->label('uc2_of.observacoes_gerais','Observações Gerais');
    $xcrud->label('uc2_of.observacoes_privadas','Observações Privadas');
    $xcrud->label('uc2_of.urgente','O.F. Urgente');
    $xcrud->label('uc2_of.activo','O.F. Activa');
    $xcrud->label('uc2_of.activo_materiaprima','O.F. Activa Matéria-Prima');
    $xcrud->label('uc2_of.id_toleranciaproducao','Tolerâncias Produção');
    $xcrud->label('uc2_of.producao_alteracoestolerancias','Alterações Tolerâncias'); 
    // nome das label - operação extrusão id=1
    $xcrud->label('uc2_of.id_calibre_extrusao','Calibre Extrusão');
    $xcrud->label('uc2_of.id_qualidade_extrusao','Qualidade Extrusão');
    $xcrud->label('uc2_of.id_linha_extrusao','Linha Extrusão');
    $xcrud->label('uc2_of.id_especificacaoproducaoextrusao','Especificações Extrusão');
    $xcrud->label('uc2_of.extrusao_alteracoesespecificacoes','Alterações Especificações');
    // nome das label - operação moldação id=2
    $xcrud->label('uc2_of.id_calibre_moldacao','Calibre Moldação');
    $xcrud->label('uc2_of.uc2_of.id_qualidade_moldacao','Qualidade Moldação');
    $xcrud->label('uc2_of.id_especificacaoproducaomoldacao','Especificações Moldação');
    $xcrud->label('uc2_of.moldacao_alteracoesespecificacoes','Alterações Especificações');
    // nome das label - operação rectificação id=3
    $xcrud->label('uc2_of.poncar','Ponçar');
    $xcrud->label('uc2_of.poncar_input','Ponçar valor');
    $xcrud->label('uc2_of.topejar','Topejar');
    $xcrud->label('uc2_of.topejar_input','Topejar valor');
    $xcrud->label('uc2_of.chanfrar','Chanfrar');
    $xcrud->label('uc2_of.chanfrar_input','Chanfrar valor');
    $xcrud->label('uc2_of.obs_op3','Obs. Rectificação');
    // nome das label - operação lavação id=4
    $xcrud->label('uc2_of.id_lavacao','Tipo de Lavação');
    $xcrud->label('uc2_of.id_maquina_lavacao','Máquina de Lavação');
    $xcrud->label('uc2_of.obs_op4','Obs. Lavação');
    // nome das label - operação escolha id=5
    $xcrud->label('uc2_of.id_escolha','Tipo de Escolha');
    $xcrud->label('uc2_of.ordem_escolha','Qual a primeira');
    $xcrud->label('uc2_of.obs_op5','Obs. Escolha');
    // nome das label - operação marcação id=6
    $xcrud->label('uc2_of.id_marcacao','Tipo de Marcação');
    $xcrud->label('uc2_of.local_marcacao','Local da Marcação');
    $xcrud->label('uc2_of.id_marca','Marca');
    $xcrud->label('uc2_of.obs_op6','Obs. Marcação');
    // nome das label - operação tratamento superfícial id=7
    $xcrud->label('uc2_of.id_produto','Produto Trat. Superficial');
    $xcrud->label('uc2_of.quantidade_produtom1','Quantidade Máquina 1');
    $xcrud->label('uc2_of.quantidade_produtom2','Quantidade Máquina 2');
    $xcrud->label('uc2_of.obs_op7','Obs. Trat. Superficial');
    // nome das label - operação contagem/embalagem id=8
    $xcrud->label('uc2_of.sacos','Sacos');
    $xcrud->label('uc2_of.caixas','Caixas');
    $xcrud->label('uc2_of.paletes','Paletes');
    $xcrud->label('uc2_of.rafia','Rafia');
    $xcrud->label('uc2_of.obs_op8','Obs. Contagem/Embalagem');
    // nome das label - operação expedição id=9
    $xcrud->label('uc2_of.data_expedicao','Data de Expedição');
    $xcrud->label('uc2_of.obs_op9','Obs. Expediçao');

    // relações - geral
    $xcrud->relation('uc2_of.id_tiposdeproducao','uc2_tiposdeproducao','id_tiposdeproducao','nome_tiposdeproducao','id_tiposdeproducao!=1 and activo=1','id_tiposdeproducao');
    $xcrud->relation('uc2_of.id_calibre','uc2_calibres','id_calibre','nome_calibre','id_calibre!=1 and activo=1');
    $xcrud->relation('uc2_of.id_qualidade','uc2_qualidades','id_qualidade','nome_qualidade','id_qualidade!=1 and activo=1');
    $xcrud->relation('uc2_of.id_cliente','clientes','id_cliente','nome_abreviado','activo=1');
    $xcrud->relation('uc2_of.id_of_materiaprima','uc2_of','id_of','nome_of','id_tiposdeproducao!=3 and activo_materiaprima!=0');  
    $xcrud->relation('uc2_of.id_ordem_operacao','uc2_ordem_operacoes','id_ordem_operacao','nome_ordem_operacao','activo=1');
    $xcrud->relation('uc2_of.id_toleranciaproducao','uc2_toleranciasproducao','id_toleranciaproducao','cod_toleranciaproducao','id_toleranciaproducao!=1 and activo=1');
    // relações - operação extrusão id=1
    $xcrud->relation('uc2_of.id_calibre_extrusao','uc2_calibres','id_calibre','nome_calibre','id_calibre!=1 and activo=1',false,true);  
    $xcrud->relation('uc2_of.id_qualidade_extrusao','uc2_qualidades','id_qualidade','nome_qualidade','id_qualidade!=1 and activo=1');
    $xcrud->relation('uc2_of.id_linha_extrusao','uc2_linhasdeextrusao','id_linhadeextrusao','nome_linhadeextrusao','id_linhadeextrusao!=1 and activo=1');  
    $xcrud->relation('uc2_of.id_especificacaoproducaoextrusao','uc2_especificacoesproducaoextrusao','id_especificacaoproducaoextrusao','cod_especificacaoproducaoextrusao','id_especificacaoproducaoextrusao!=1 and activo=1');
    // relações - operação moldação id=2
    $xcrud->relation('uc2_of.id_calibre_moldacao','uc2_calibres','id_calibre','nome_calibre','id_calibre!=1 and activo=1');  
    $xcrud->relation('uc2_of.id_qualidade_moldacao','uc2_qualidades','id_qualidade','nome_qualidade','id_qualidade!=1 and activo=1');  
    $xcrud->relation('uc2_of.id_especificacaoproducaomoldacao','uc2_especificacoesproducaomoldacao','id_especificacaoproducaomoldacao','cod_especificacaoproducaomoldacao','id_especificacaoproducaomoldacao!=1 and activo=1');
    // relações - operação rectificação id=3
    
    // relações - operação lavação id=4
    $xcrud->relation('uc2_of.id_lavacao','uc2_lavacoes','id_lavacao','nome_lavacao');
    $xcrud->relation('uc2_of.id_maquina_lavacao','uc2_maquinasdelavacao','id_maquinadelavacao','nome_maquinadelavacao');
    // relações - operação escolha id=5
    $xcrud->relation('uc2_of.id_escolha','uc2_tiposdeescolha','id_tipodeescolha','nome_tipodeescolha');
    $xcrud->relation('uc2_of.ordem_escolha','uc2_tiposdeescolha','id_tipodeescolha','nome_tipodeescolha');
    // relações - operação marcação id=6
    $xcrud->relation('uc2_of.id_marcacao','uc2_tiposdemarcacao','id_tipodemarcacao','nome_tipodemarcacao');
    $xcrud->relation('uc2_of.local_marcacao','uc2_locaisdemarcacao','id_localdemarcacao','nome_localdemarcacao');
    $xcrud->relation('uc2_of.id_marca','uc2_marcas','id_marca','nome_marca');
    // relações - operação tratamento superfícial id=7
    $xcrud->relation('uc2_of.id_produto','uc2_produtostratamentosuperficial','id_produtotratamentosuperficial','nome_produtotratamentosuperficial');
 

    // relações - operação contagem/embalagem id=8
        
    // relações - operação expedição id=9

    
    $xcrud->show_primary_ai_column(true);

    if(isset($_GET['id_of'])){
    $of=$_GET['id_of'];
    $xcrud->where('id_of =', $of);
    $xcrud->unset_limitlist();
    $xcrud->unset_search();
    $xcrud->benchmark(false);
    }
    
    
    if(isset($_GET['id_op'])){
    $op=$_GET['id_op'];
    $xcrud->where('uc2_of_prioridades.id_op='.$op);
    $xcrud->where('uc2_of_prioridades.activo=1');
    $xcrud->order_by('prioridade','ASC');
    // botão para adicionar registo
    $xcrud->button('index.php?page=uc2/registos_op&id_op={id_op}&id_of={id_of}', false, 'glyphicon glyphicon-plus');
    }
  
    $xcrud->where('uc2_of.activo=1');
/*
    $xcrud->label('id_tiposdeproducao','Tipo P.');
    $xcrud->label('sequencia','Seq.');
    $xcrud->label('semana','Sem.');
*/
    $xcrud->unset_add();
        
        if(isset($_GET['id_op'])){
        

        include('of_colunas_byop.php');
        }
        
        else {
            
        //sem nada selecionado
        $xcrud->columns('uc2_of.nome_of,uc2_of.urgente'); 

        }

        echo $xcrud->render();

    //fim tabela
?>


<?php
//novas
 if(isset($_GET['id_op']) and isset($_GET['id_of']) and $_GET['id_of']!=0 ) {


$id_of=$_GET['id_of'];
 $id_op=$_GET['id_op'];
//previw



    //preview


   // $db = Xcrud_db::get_instance();
//    $query = 'SELECT id_operacao, id_op FROM `uc2_of`,uc2_op_registo where uc2_op_registo.id_of=1 and uc2_op_registo.confirmado=1 and uc2_of.id_of=1'; 
 //   $db->query($query); 
  // $result = $db->result();
  //echo $ids_op=$result[0]['id_operacao']; 
  //echo $ids_op=$result[0]['id_op']; 




/* $xcrud = Xcrud::get_instance();  
    $xcrud->table('uc2_op_registo');
    $xcrud->relation('id_calibre','uc2_calibres','id_calibre','nome_calibre');//campo origem / tabela / destino / destino_nome 
    $xcrud->relation('id_qualidade','uc2_qualidades','id_qualidade','nome_qualidade');//campo origem / tabela / destino / destino_nome  
 //  $xcrud->relation('id_qualidade','uc2_qualidades','id_qualidade','nome_qualidade', false, 'case when id_qualidade ='.$_GET['id_qualidade'].' then 1 else 0 end');//campo origem / tabela / destino / destino_nome  
    $xcrud->set_attr('id_calibre',array('id'=>'id_calibre')); 
    $xcrud->set_attr('id_qualidade',array('id'=>'id_qualidade')); 
    $xcrud->set_attr('id_of',array('id'=>'id_of'));
      $xcrud->set_attr('id_op',array('id'=>'id_op'));
    $xcrud->where('id_op =', $id_op);
    $xcrud->where('id_of =', $id_of);
    $xcrud->unset_add();
    echo $xcrud->render();*/

    $xcrud = Xcrud::get_instance();  
    $xcrud->table('uc2_op_registo');
    
    $xcrud->table_name('Registos');
    //$xcrud->relation('id_calibre','uc2_calibres','id_calibre','nome_calibre');//campo origem / tabela / destino / destino_nome 
    $xcrud->relation('id_qualidade','uc2_qualidades','id_qualidade','nome_qualidade');//campo origem / tabela / destino / destino_nome  
 //   $xcrud->relation('id_qualidade','uc2_qualidades','id_qualidade','nome_qualidade', false, 'case when id_qualidade ='.$_GET['id_qualidade'].' then 1 else 0 end');//campo origem / tabela / destino / destino_nome  
    $xcrud->relation('id_lavacao','uc2_lavacoes','id_lavacao','nome_lavacao');//campo origem / tabela / destino / destino_nome  
  $xcrud->relation('op1_calibre','uc2_calibres','id_calibre','nome_calibre');//campo origem / tabela / destino / destino_nome
  
   $xcrud->relation('op1_etiqueta','uc2_etiquetasop1','id_etiquetaop1','cod_etiquetaop1','activo=1','id_etiquetaop1');//campo origem / tabela / destino / destino_nome
   $xcrud->relation('op2_etiqueta','uc2_etiquetasop2','id_etiquetaop2','cod_etiquetaop2','activo=1','id_etiquetaop2');//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op3_etiqueta','uc2_etiquetasop3','id_etiquetaop3','cod_etiquetaop3','activo=1','id_etiquetaop3',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op4_etiqueta','uc2_etiquetasop4','id_etiquetaop4','cod_etiquetaop4','activo=1','id_etiquetaop4',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op5_etiqueta','uc2_etiquetasop5','id_etiquetaop5','cod_etiquetaop5','activo=1','id_etiquetaop5',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op6_etiqueta','uc2_etiquetasop6','id_etiquetaop6','cod_etiquetaop6','activo=1','id_etiquetaop6',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op7_etiqueta','uc2_etiquetasop7','id_etiquetaop7','cod_etiquetaop7','activo=1','id_etiquetaop7',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op8_etiqueta','uc2_etiquetasop8','id_etiquetaop8','cod_etiquetaop8','activo=1','id_etiquetaop8',true);//campo origem / tabela / destino / destino_nome
     $xcrud->relation('op9_etiqueta','uc2_etiquetasop9','id_etiquetaop9','cod_etiquetaop9','activo=1','id_etiquetaop9',true);//campo origem / tabela / destino / destino_nome
    
      $xcrud->relation('op3_etiqueta_entrada','uc2_etiquetasop3','id_etiquetaop3','cod_etiquetaop3','id_etiquetaop3!=1 and activo=1','id_etiquetaop3',true);//
      $xcrud->relation('op4_etiqueta_entrada','uc2_etiquetasop4','id_etiquetaop4','cod_etiquetaop4','id_etiquetaop4!=1 and activo=1','id_etiquetaop4',true);//
      $xcrud->relation('op5_etiqueta_entrada','uc2_etiquetasop5','id_etiquetaop5','cod_etiquetaop5','id_etiquetaop5!=1 and activo=1','id_etiquetaop5',true);//
      $xcrud->relation('op6_etiqueta_entrada','uc2_etiquetasop6','id_etiquetaop6','cod_etiquetaop6','id_etiquetaop6!=1 and activo=1','id_etiquetaop6',true);//
      $xcrud->relation('op7_etiqueta_entrada','uc2_etiquetasop7','id_etiquetaop7','cod_etiquetaop7','id_etiquetaop7!=1 and activo=1','id_etiquetaop7',true);//
      $xcrud->relation('op8_etiqueta_entrada','uc2_etiquetasop8','id_etiquetaop8','cod_etiquetaop8','id_etiquetaop8!=1 and activo=1','id_etiquetaop8',true);//
      $xcrud->relation('op9_etiqueta_entrada','uc2_etiquetasop9','id_etiquetaop9','cod_etiquetaop9','id_etiquetaop9!=1 and activo=1','id_etiquetaop9',true);//


    //$xcrud->set_attr('id_calibre',array('id'=>'id_calibre')); 
    $xcrud->set_attr('op1_calibre',array('id'=>'op1_calibre'));
 $xcrud->set_attr('op3_etiqueta_entrada',array('id'=>'op3_etiqueta_entrada'));
  $xcrud->set_attr('op4_etiqueta_entrada',array('id'=>'op4_etiqueta_entrada'));
  $xcrud->set_attr('op5_etiqueta_entrada',array('id'=>'op5_etiqueta_entrada'));
  $xcrud->set_attr('op6_etiqueta_entrada',array('id'=>'op6_etiqueta_entrada'));
  $xcrud->set_attr('op7_etiqueta_entrada',array('id'=>'op7_etiqueta_entrada'));
  $xcrud->set_attr('op8_etiqueta_entrada',array('id'=>'op8_etiqueta_entrada'));
  $xcrud->set_attr('op9_etiqueta_entrada',array('id'=>'op9_etiqueta_entrada'));
    //$xcrud->set_attr('id_qualidade',array('id'=>'id_qualidade')); 
    //$xcrud->set_attr('id_lavacao',array('id'=>'id_lavacao')); 
    $xcrud->set_attr('id_of',array('id'=>'id_of'));
    $xcrud->set_attr('id_op',array('id'=>'id_op'));
    $xcrud->set_attr('id_op',array('value'=>$id_op));
    $xcrud->set_attr('id_of',array('value'=>$id_of));

     date_default_timezone_set("Europe/Lisbon");
    $data = date('d.m.Y H:i:s', time());
    $xcrud->set_attr('data',array('value'=>$data));
    $xcrud->set_attr('conforme',array('id'=>'conforme'));
    $xcrud->set_attr('op1_etiqueta',array('id'=>'op1_etiqueta'));
    $xcrud->set_attr('op2_etiqueta',array('id'=>'op2_etiqueta'));
    $xcrud->set_attr('op3_etiqueta',array('id'=>'op3_etiqueta'));
    $xcrud->set_attr('op4_etiqueta',array('id'=>'op4_etiqueta'));
    $xcrud->set_attr('op5_etiqueta',array('id'=>'op5_etiqueta'));
    $xcrud->set_attr('op6_etiqueta',array('id'=>'op6_etiqueta'));
    $xcrud->set_attr('op7_etiqueta',array('id'=>'op7_etiqueta'));
    $xcrud->set_attr('op8_etiqueta',array('id'=>'op8_etiqueta'));
    $xcrud->set_attr('op9_etiqueta',array('id'=>'op9_etiqueta'));

 $xcrud->set_attr('op2_comprimento1',array('id'=>'op2_comprimento1'));
 $xcrud->set_attr('op2_comprimento2',array('id'=>'op2_comprimento2'));
 $xcrud->set_attr('op2_comprimento3',array('id'=>'op2_comprimento3'));
 $xcrud->set_attr('op2_comprimento4',array('id'=>'op2_comprimento4'));
 $xcrud->set_attr('op2_comprimento5',array('id'=>'op2_comprimento5'));
 $xcrud->set_attr('op2_comprimentomedio',array('id'=>'op2_comprimentomedio'));



  $xcrud->set_attr('op2_comprimento2_1',array('id'=>'op2_comprimento2_1'));
 $xcrud->set_attr('op2_comprimento2_2',array('id'=>'op2_comprimento2_2'));
 $xcrud->set_attr('op2_comprimento2_3',array('id'=>'op2_comprimento2_3'));
 $xcrud->set_attr('op2_comprimento2_4',array('id'=>'op2_comprimento2_4'));
 $xcrud->set_attr('op2_comprimento2_5',array('id'=>'op2_comprimento2_5'));
 $xcrud->set_attr('op2_comprimentomedio2',array('id'=>'op2_comprimentomedio2'));



  $xcrud->set_attr('op2_comprimento3_1',array('id'=>'op2_comprimento3_1'));
 $xcrud->set_attr('op2_comprimento3_2',array('id'=>'op2_comprimento3_2'));
 $xcrud->set_attr('op2_comprimento3_3',array('id'=>'op2_comprimento3_3'));
 $xcrud->set_attr('op2_comprimento3_4',array('id'=>'op2_comprimento3_4'));
 $xcrud->set_attr('op2_comprimento3_5',array('id'=>'op2_comprimento3_5'));
 $xcrud->set_attr('op2_comprimentomedio3',array('id'=>'op2_comprimentomedio3'));




 $xcrud->set_attr('op2_diametro1',array('id'=>'op2_diametro1'));
 $xcrud->set_attr('op2_diametro2',array('id'=>'op2_diametro2'));
 $xcrud->set_attr('op2_diametro3',array('id'=>'op2_diametro3'));
 $xcrud->set_attr('op2_diametro4',array('id'=>'op2_diametro4'));
 $xcrud->set_attr('op2_diametro5',array('id'=>'op2_diametro5'));
 $xcrud->set_attr('op2_diametromedio',array('id'=>'op2_diametromedio'));



 $xcrud->set_attr('op2_diametro2_1',array('id'=>'op2_diametro2_1'));
 $xcrud->set_attr('op2_diametro2_2',array('id'=>'op2_diametro2_2'));
 $xcrud->set_attr('op2_diametro2_3',array('id'=>'op2_diametro2_3'));
 $xcrud->set_attr('op2_diametro2_4',array('id'=>'op2_diametro2_4'));
 $xcrud->set_attr('op2_diametro2_5',array('id'=>'op2_diametro2_5'));
 $xcrud->set_attr('op2_diametromedio2',array('id'=>'op2_diametromedio2'));

  $xcrud->set_attr('op2_diametro3_1',array('id'=>'op2_diametro3_1'));
 $xcrud->set_attr('op2_diametro3_2',array('id'=>'op2_diametro3_2'));
 $xcrud->set_attr('op2_diametro3_3',array('id'=>'op2_diametro3_3'));
 $xcrud->set_attr('op2_diametro3_4',array('id'=>'op2_diametro3_4'));
 $xcrud->set_attr('op2_diametro3_5',array('id'=>'op2_diametro3_5'));
 $xcrud->set_attr('op2_diametromedio3',array('id'=>'op2_diametromedio3'));



$xcrud->set_attr('op2_diametro1',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro2',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro3',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro4',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro5',array('value'=>'0.00'));



$xcrud->set_attr('op2_diametro2_1',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro2_2',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro2_3',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro2_4',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro2_5',array('value'=>'0.00'));



$xcrud->set_attr('op2_diametro3_1',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro3_2',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro3_3',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro3_4',array('value'=>'0.00'));
$xcrud->set_attr('op2_diametro3_5',array('value'=>'0.00'));


$xcrud->set_attr('op2_comprimento1',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento2',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento3',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento4',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento5',array('value'=>'0.00'));



$xcrud->set_attr('op2_comprimento2_1',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento2_2',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento2_3',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento2_4',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento2_5',array('value'=>'0.00'));



$xcrud->set_attr('op2_comprimento3_1',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento3_2',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento3_3',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento3_4',array('value'=>'0.00'));
$xcrud->set_attr('op2_comprimento3_5',array('value'=>'0.00'));

    $xcrud->set_attr('quantidade', array('id'=>'milhares'));
 $xcrud->before_insert('trimnumero'); // automatic call of functions.php



 $xcrud->set_attr('op2_pesomedio',array('id'=>'op2_pesomedio','value'=>'0.00'));
 $xcrud->set_attr('op2_pesomedio1',array('id'=>'op2_pesomedio1','value'=>'0.00'));
$xcrud->set_attr('op2_pesomedio2',array('id'=>'op2_pesomedio2','value'=>'0.00'));
$xcrud->set_attr('op2_pesomedio3',array('id'=>'op2_pesomedio3','value'=>'0.00'));


 $xcrud->set_attr('op2_pesomedio2_1',array('id'=>'op2_pesomedio2_1','value'=>'0.00'));


 $xcrud->set_attr('op2_pesomedio3_1',array('id'=>'op2_pesomedio3_1','value'=>'0.00'));


 $xcrud->set_attr('op2_humidade',array('id'=>'op2_humidade','value'=>'0.00'));
 $xcrud->set_attr('op2_humidade1',array('id'=>'op2_humidade1','value'=>'0.00'));

 $xcrud->set_attr('op2_humidade2_1',array('id'=>'op2_humidade2_1','value'=>'0.00'));

 $xcrud->set_attr('op2_humidade3_1',array('id'=>'op2_humidade3_1','value'=>'0.00'));

  $xcrud->set_attr('op2_pesomedia',array('id'=>'op2_pesomedia'));
    $xcrud->set_attr('op2_pesomedia2',array('id'=>'op2_pesomedia2'));
    $xcrud->set_attr('op2_pesomedia3',array('id'=>'op2_pesomedia3'));

 $xcrud->set_attr('op2_humidademedia',array('id'=>'op2_humidademedia'));
  $xcrud->set_attr('op2_humidademedia2',array('id'=>'op2_humidademedia2'));
   $xcrud->set_attr('op2_humidademedia3',array('id'=>'op2_humidademedia3'));
  $xcrud->set_attr('op3_etiqueta_entrada',array('id'=>'op3_etiqueta_entrada'));


    $xcrud->where('id_op =', $id_op);
    $xcrud->where('id_of =', $id_of);
    $xcrud->limit(1);
    $xcrud->order_by('id_op_registo','DESC');
    $xcrud->highlight_row('confirmado','=','0','#EEE8AA'); // linha amarela se não tiver anexos
//$xcrud->columns('id_op_registo'); 
//$xcrud->unset_list();
   $xcrud->unset_pagination();
 $xcrud->unset_limitlist();
  $xcrud->unset_numbers();
  $xcrud->unset_search();
  
    // activar/desactivar
    $xcrud->column_callback('confirmado','estados_act3');
    $xcrud->create_action('publish3', 'publish_action3'); // action callback, function publish_action() in functions.php
    $xcrud->create_action('unpublish3', 'unpublish_action3');

// relações para log
    //$xcrud->relation('criado_por','login_users','user_id','username'); 
    //$xcrud->relation('actualizado_por','login_users','user_id','username');   
  
  
    $xcrud->set_var('nome_tabela','uc2_op_registo');
    $xcrud->set_var('nome_campo','id_op_registo');
    $xcrud->set_var('accao','Inseriu');
  
  // relações
  $xcrud->relation('uc2_op_registo.id_maquina_lavacao','uc2_maquinasdelavacao','id_maquinadelavacao','nome_maquinadelavacao','id_maquinadelavacao!=1 and activo=1');

$xcrud->label('op2_comprimentomedio','Comprimento Médio');
$xcrud->label('op2_diametromedio','Diâmetro Médio');
$xcrud->label('op2_pesomedio1','Peso Médio');
$xcrud->label('op2_pesomedia','Peso Média');
$xcrud->label('op2_pesomedia2','Peso Média 2');
$xcrud->label('op2_pesomedia3','Peso Média 3');
$xcrud->label('op2_humidade1','Humidade');
$xcrud->label('op2_humidade2_1','Humidade 2');
$xcrud->label('op2_humidade3_1','Humidade 3');
$xcrud->label('op2_humidademedia','Humidade Média');
$xcrud->label('op2_humidademedia2','Humidade Média 2');
$xcrud->label('op2_humidademedia3','Humidade Média 3');
$xcrud->label('naoconforme_razao','Qual a Razão');
//mostra apenas o id: hidden  por defeito
$view=false;
    // campos a registar
    // operação extrusão id=1   
    if($id_op==1 and protectThis("1,2,8") ){  

$view=true;
        //preview      
$path = 'pages/uc2/previewextrusao.php';
include($path);

//campo obrigatório
  //$xcrud->validation_required('op1_calibre'); 
  //$xcrud->validation_required(array('op1_calibre'));
//$xcrud->validation_required(array('op1_calibre,outro,outro'));
//colunas 
$xcrud->columns('id_of,id_op,op1_calibre,op1_etiqueta,conforme,naoconforme_razao,observacoes,confirmado');
//form
    $xcrud->fields(array('id_of','id_op','data','op1_calibre','op1_etiqueta','conforme','naoconforme_razao','observacoes'), false);
//     $xcrud->fields(array('id_of','id_op','data','op1_etiqueta','op1_etiqueta_saida','op1_calibre','quantidade','id_maquina_lavacao','campo1','campo2','campo3','campo4','campo5','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }
    
    // operação moldação id=2    e operador nivel 2
     if($id_op==2 and protectThis("1,2,9") ){  

$view=true;
$path = 'pages/uc2/previewmoldacao.php';
include($path);


        //preview 
   $xcrud->fields(array('id_of','id_op','data','op2_etiqueta','op2_comprimento1','op2_comprimento2','op2_comprimento3','op2_comprimento4','op2_comprimento5','op2_comprimentomedio','op2_comprimento2_1','op2_comprimento2_2','op2_comprimento2_3','op2_comprimento2_4','op2_comprimento2_5','op2_comprimentomedio2','op2_comprimento3_1','op2_comprimento3_2','op2_comprimento3_3','op2_comprimento3_4','op2_comprimento3_5','op2_comprimentomedio3','op2_diametro1','op2_diametro2','op2_diametro3','op2_diametro4','op2_diametro5','op2_diametromedio','op2_diametro2_1','op2_diametro2_2','op2_diametro2_3','op2_diametro2_4','op2_diametro2_5','op2_diametromedio2','op2_diametro3_1','op2_diametro3_2','op2_diametro3_3','op2_diametro3_4','op2_diametro3_5','op2_diametromedio3','op2_pesomedio1','op2_pesomedia','op2_pesomedio2_1','op2_pesomedia2','op2_pesomedio3_1','op2_pesomedia3','op2_humidade1','op2_humidademedia','op2_humidade2_1','op2_humidademedia2','op2_humidade3_1','op2_humidademedia3','quantidade','conforme','naoconforme_razao','observacoes'), false);
    }

    // operação rectificação id=3   
      if($id_op==3 and protectThis(3) ){  
   $view=true;
$path = 'pages/uc2/previewtolerancia.php';
include($path);


    $xcrud->fields(array('id_of','id_op','data','op3_etiqueta_entrada','op3_etiqueta','quantidade','conforme','naoconforme_razao','observacoes'), false);
    }

    // operação lavação id=4   
    if($id_op==4){   
$view=true;
        $path = 'pages/uc2/previewtolerancia.php';
include($path);

    $xcrud->fields(array('id_of','id_op','data','op4_etiqueta_entrada','op4_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação escolha id=5   
    if($id_op==5){   
$view=true;
        $path = 'pages/uc2/previewtolerancia.php';
include($path);

    $xcrud->fields(array('id_of','id_op','data','op5_etiqueta_entrada','op5_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação marcação id=6  
    if($id_op==6){  
        $view=true;
    $path = 'pages/uc2/previewtolerancia.php';
include($path);

    $path2 = 'pages/uc2/previewmarca.php';
include($path2);

    $xcrud->fields(array('id_of','id_op','data','op6_etiqueta_entrada','op6_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação tratamento superficial id=7   
    if($id_op==7){   
        $view=true;
        $path = 'pages/uc2/previewtolerancia.php';
include($path);
    $xcrud->fields(array('id_of','id_op','data','op7_etiqueta_entrada','op7_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação embalagem/contagem id=8   
    if($id_op==8){   
        $view=true;
        $path = 'pages/uc2/previewtolerancia.php';
include($path);
    $xcrud->fields(array('id_of','id_op','data','op8_etiqueta_entrada','op8_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

    // operação expedição id=9  
    if($id_op==9){  
        $view=true;
    $path = 'pages/uc2/previewtolerancia.php';
include($path); 
    $xcrud->fields(array('id_of','id_op','data','op9_etiqueta_entrada','op9_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }

/*
    if($id_op==1){   
    $xcrud->fields(array('id_of','id_op','data','op1_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }
    
    
    // operação moldacao id=2   
    if($id_op==2){   
    $xcrud->fields(array('id_of','id_op','data','op2_etiqueta','op1_calibre','conforme','naoconforme_razao','observacoes','confirmado'), false);
    }
 
     //id_lavacao   
    if($id_op==4){      
    $xcrud->fields(array('id_of','id_op','op2_etiqueta','id_qualidade','tipo_lavacao','nr_lavacoes','obs','conforme','confirmado'), false);
    }


//escolha
    if($id_op==5){   
 $xcrud->validation_required('tipo_lavacao'); 
 $xcrud->validation_required('nr_lavacoes'); 
$xcrud->fields(array('id_of','id_op','id_calibre','id_qualidade','percentagem_bom','percentagem_rejeitado','quantidade_total','defeitos_curtas','defeitos_lixo','defeitos_buracos','defeitos_outros','obs','conforme','confirmado'), false);

 }
 //marcacao
 if($id_op==6){  

$xcrud->fields(array('id_of','id_op','id_calibre','id_qualidade','obs','conforme','confirmado'), false);

  } 

//tratamento
   if($id_op==7){  
$xcrud->fields(array('id_of','id_op','id_calibre','id_qualidade','obs','conforme','confirmado'), false);
  } 


//EMBALAGEM/CONTAGEM:
   if($id_op==8){  
$xcrud->fields(array('id_of','id_op','id_calibre','id_qualidade','obs','conforme','confirmado'), false);
  } 

  //9 expedição
   if($id_op==9){  
$xcrud->fields(array('id_of','id_op','id_calibre','id_qualidade','quantidade_embalagens','nr_paletes','data_expedicao','transporte','obs','conforme','confirmado'), false);
  } 
*/  


    $variavel='op_registo';

    $xcrud->relation('criado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome
    $xcrud->relation('actualizado_por','login_users','user_id','username'); //campo origem / tabela / destino / destino_nome  

/*
    $xcrud->set_var('nome_tabela','uc2_op_registo');
    $xcrud->set_var('nome_campo','id_'.$variavel.'');
    $xcrud->set_var('accao','Inseriu'); 
*/   
    // logs e user
    $xcrud->after_insert('inserir_crud'); // automatic call of functions.php
    $xcrud->after_update('update_tabela'); // automatic call of functions.php
    // gravar dados no momento de criar 
    $xcrud->pass_var('criado_em', date('Y-m-d H:i:s'),'create');
    $xcrud->pass_var('criado_por', $user_id,'create');
    // gravar dados no momento do actualizar
    $xcrud->pass_var('actualizado_em', date('Y-m-d H:i:s'),'edit');
    $xcrud->pass_var('actualizado_por', $user_id,'edit');
$xcrud->column_callback('quantidade','numero_format');


  
   if($view)
echo $xcrud->render('create');

$db = Xcrud_db::get_instance();
$db->query('SELECT COUNT(*) FROM uc2_op_registo WHERE id_op = '.$id_op.' and id_of='.$id_of.'');
$result = $db->result();
$count = count($result);
 }

 ?>
<div  id="btn_active" style="display:none" class="alert alert-success">
<strong>Alterado</strong> Com sucesso.
  </div>
<div id="registo">
 
<?php
if(isset($_GET['id_op'])){
    $op=$_GET['id_op'];
 include('pages/uc2/get_registos_op_of.php');
}

if(isset($id_of)){
echo'<script>id_of='.$id_of.'</script>';
}
else{
 echo'<script>id_of=0</script>' ;
}


if(isset($id_op)){
echo'<script>id_op='.$id_op.'</script>';
}
else{
 echo'<script>id_op=0</script>' ;
}
?>
</div>








<script type="text/javascript">

    jQuery(document).on('ready xcrudafterrequest', function(event, container) {

$("#id_op_select").select2OptionPicker(false);
      // esconde as etiqueta select2
 $("#id_of_select").select2OptionPicker(); 
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

$("#op2_comprimentomedio,#op2_comprimentomedio2,#op2_comprimentomedio3,#op2_diametromedio,#op2_pesomedia,#op2_pesomedia2,#op2_pesomedia3,#op2_humidademedia,#op2_humidademedia2,#op2_humidademedia3").prop('readonly', true);



$("#op2_pesomedio3_1,#op2_pesomedio3_2,#op2_pesomedio3_3,#op2_pesomedio2_1,#op2_pesomedio2_2,#op2_pesomedio2_3,#op2_pesomedio1,#op2_pesomedio2,#op2_pesomedio3,#op2_humidade1,#op2_humidade2,#op2_humidade3,#op2_humidade2_1,#op2_humidade2_2,#op2_humidade2_3,#op2_humidade3_1,#op2_humidade3_2,#op2_humidade3_3,#op2_diametro1,#op2_diametro2,#op2_diametro3,#op2_diametro4,#op2_diametro5,#op2_diametro2_1,#op2_diametro2_2,#op2_diametro2_3,#op2_diametro2_4,#op2_diametro2_5,#op2_diametro3_1,#op2_diametro3_2,#op2_diametro3_3,#op2_diametro3_4,#op2_diametro3_5, #op2_comprimento1,#op2_comprimento2,#op2_comprimento3,#op2_comprimento4,#op2_comprimento5,#op2_comprimento2_1,#op2_comprimento2_2,#op2_comprimento2_3,#op2_comprimento2_4,#op2_comprimento2_5,#op2_comprimento3_1,#op2_comprimento3_2,#op2_comprimento3_3,#op2_comprimento3_4,#op2_comprimento3_5").TouchSpin({          
               buttondown_class: 'btn green',
            buttonup_class: 'btn green',
            decimals: 2,
             step: 0.01,
             min: -1000000000,
            max: 1000000000,
              boostat: 5,
            maxboostedstep: 10000000
        }); 

$("#op2_pesomedio1").change(function() {

op2c1=Number($('#op2_pesomedio1').val());
media=(op2c1)/5;
media=media.toFixed(2);
$('#op2_pesomedia').val(media);
});



$("#op2_pesomedio2_1").change(function() {

op2c1=Number($('#op2_pesomedio2_1').val());


media=(op2c1)/5;
media=media.toFixed(2);
$('#op2_pesomedia2').val(media);
});


$("#op2_pesomedio3_1").change(function() {

op2c1=Number($('#op2_pesomedio3_1').val());

media=(op2c1)/5;
media=media.toFixed(2);
$('#op2_pesomedia3').val(media);
});


$("#op2_humidade1").change(function() {

op2c1=Number($('#op2_humidade1').val());
media=(op2c1)/5;
media=media.toFixed(2);
$('#op2_humidademedia').val(media);
});



$("#op2_humidade2_1").change(function() {

op2c1=Number($('#op2_humidade2_1').val());
media=(op2c1)/5;
media=media.toFixed(2);
$('#op2_humidademedia2').val(media);
});


$("#op2_humidade3_1").change(function() {

op2c1=Number($('#op2_humidade3_1').val());
media=(op2c1)/5;
media=media.toFixed(2);
$('#op2_humidademedia3').val(media);
});

$('#op2_comprimento1,#op2_comprimento2,#op2_comprimento3,#op2_comprimento4,#op2_comprimento5').change(function() {

op2c1=Number($('#op2_comprimento1').val());
op2c2=Number($('#op2_comprimento2').val());
op2c3=Number($('#op2_comprimento3').val());
op2c4=Number($('#op2_comprimento4').val());
op2c5=Number($('#op2_comprimento5').val());
media=(op2c1+op2c2+op2c3+op2c4+op2c5)/5;
media=media.toFixed(2);
$('#op2_comprimentomedio').val(media);
});


$('#op2_comprimento2_1,#op2_comprimento2_2,#op2_comprimento2_3,#op2_comprimento2_4,#op2_comprimento2_5').change(function() {

op2c1=Number($('#op2_comprimento2_1').val());
op2c2=Number($('#op2_comprimento2_2').val());
op2c3=Number($('#op2_comprimento2_3').val());
op2c4=Number($('#op2_comprimento2_4').val());
op2c5=Number($('#op2_comprimento2_5').val());
media=(op2c1+op2c2+op2c3+op2c4+op2c5)/5;
media=media.toFixed(2);
$('#op2_comprimentomedio2').val(media);
});




$('#op2_comprimento3_1,#op2_comprimento3_2,#op2_comprimento3_3,#op2_comprimento3_4,#op2_comprimento3_5').change(function() {

op2c1=Number($('#op2_comprimento3_1').val());
op2c2=Number($('#op2_comprimento3_2').val());
op2c3=Number($('#op2_comprimento3_3').val());
op2c4=Number($('#op2_comprimento3_4').val());
op2c5=Number($('#op2_comprimento3_5').val());
media=(op2c1+op2c2+op2c3+op2c4+op2c5)/5;
media=media.toFixed(2);
$('#op2_comprimentomedio3').val(media);
});



$('#op2_diametro1,#op2_diametro2,#op2_diametro3,#op2_diametro4,#op2_diametro5').change(function() {

op2c1=Number($('#op2_diametro1').val());
op2c2=Number($('#op2_diametro2').val());
op2c3=Number($('#op2_diametro3').val());
op2c4=Number($('#op2_diametro4').val());
op2c5=Number($('#op2_diametro5').val());
media=(op2c1+op2c2+op2c3+op2c4+op2c5)/5;
media=media.toFixed(2);
$('#op2_diametromedio').val(media);
});


$('#op2_diametro2_1,#op2_diametro2_2,#op2_diametro2_3,#op2_diametro2_4,#op2_diametro2_5').change(function() {

op2c1=Number($('#op2_diametro2_1').val());
op2c2=Number($('#op2_diametro2_2').val());
op2c3=Number($('#op2_diametro2_3').val());
op2c4=Number($('#op2_diametro2_4').val());
op2c5=Number($('#op2_diametro2_5').val());
media=(op2c1+op2c2+op2c3+op2c4+op2c5)/5;
media=media.toFixed(2);
$('#op2_diametromedio2').val(media);
});


$('#op2_diametro3_1,#op2_diametro3_2,#op2_diametro3_3,#op2_diametro3_4,#op2_diametro3_5').change(function() {

op2c1=Number($('#op2_diametro3_1').val());
op2c2=Number($('#op2_diametro3_2').val());
op2c3=Number($('#op2_diametro3_3').val());
op2c4=Number($('#op2_diametro3_4').val());
op2c5=Number($('#op2_diametro3_5').val());
media=(op2c1+op2c2+op2c3+op2c4+op2c5)/5;
media=media.toFixed(2);
$('#op2_diametromedio3').val(media);
});

if(jQuery(container).closest(".xcrud").prevAll(".xcrud").size()){
            Xcrud.reload(".xcrud:last");
        }


$.getJSON('pages/uc2/get_calibres_extrusao_of.php?id_of='+id_of , function(data) {      
   $('#op1_calibre').empty();  
$('#op1_calibre').append("<option value='selected'>- Seleccione -</option>");
  $.each( data, function( key, val ) { 
$('#op1_calibre').append("<option value='" + val.valid+ "'>" + val.valdesc + "</option>");
if(val.cont==1){
    $('.linha_op1_calibre').hide();  
$('#op1_calibre').val(val.valid);
 $('#s2id_op1_calibre').hide();
      //activa botão
      $("#op1_calibre").select2OptionPicker();
      // esconde as etiqueta select2
       $('#s2id_op'+id_op+'_etiqueta').hide();
getfiltercalibre();
}else{

      //esconde select2
      $('#s2id_op1_calibre').hide();
      //activa botão
      $("#op1_calibre").select2OptionPicker();
      // esconde as etiqueta select2
       $('#s2id_op'+id_op+'_etiqueta').hide();
       // ativa as etiquetas com botões
     // nao mostra logo de incio $("#op"+id_op+"_etiqueta").select2OptionPicker();
} 

  });

});





$.getJSON('pages/uc2/get_etiqueta_entrada.php?id_of='+id_of+'&id_op='+id_op, function(data) {    
      $(".xcrud-overlay").show();
$('#op'+id_op+'_etiqueta_entrada').empty();  

  $.each( data, function( key, val ) { 
$('#op'+id_op+'_etiqueta_entrada').append("<option value='" + val.valid+ "'>" + val.valdesc + "</option>");
// $("#op"+id_op+"_etiqueta_entrada").select2(); 
  });


 $.getJSON('pages/uc2/get_etiqueta_entrada2.php?id_of='+id_of+'&id_op='+id_op , function(data) { 
   $(".xcrud-overlay").show();   
$.each(data, function( key, val ) { 
 
 $("#op"+id_op+"_etiqueta_entrada option[value='" +val.op_etiqueta_entrada+ "']").remove();  
  });

     
  $(".xcrud-overlay").hide();

 $("#s2id_op"+id_op+"_etiqueta_entrada").hide();
  $("#op"+id_op+"_etiqueta_entrada").select2OptionPicker();
    
});



});

$('#op'+id_op+'_calibre').change(function() {
getfiltercalibre();
});


function getfiltercalibre(){
    calibre=$('#op'+id_op+'_calibre').val();
$.getJSON('pages/uc2/get_etiqueta_of_filter.php?id_of='+id_of+'&id_op='+id_op +'&id_calibre='+calibre , function(data) {    
          $(".xcrud-overlay").show();
  $('#op'+id_op+'_etiqueta').empty();  
$.each(data, function( key, val ) { 
  
$('#op'+id_op+'_etiqueta').append("<option value='" + val.valid+ "'>" + val.valdesc + "</option>");
  });
removeused(); 

// update etiquetas não preciso faz update só dps do remove $("#op"+id_op+"_etiqueta").select2OptionPicker();
  $(".xcrud-overlay").hide();
});

}
if(id_op!=1)
removeused();
 
function removeused(){
       $(".xcrud-overlay").show();
$.ajax({
  url: 'pages/uc2/get_etiqueta_of.php?id_of='+id_of+'&id_op='+id_op,
  cache: false,
  dataType: "json",
  success: function(data) {
    $.each(data, function(key,val) {
  $("#op"+id_op+"_etiqueta option[value='"+val.op_etiqueta+"']").remove(); 
});
    $("#op"+id_op+"_etiqueta").val('');
$("#op"+id_op+"_etiqueta").select2OptionPicker();


}});
  $(".xcrud-overlay").hide();
}




if(id_op!=1)
$("#op"+id_op+"_etiqueta").select2OptionPicker();


$('#conforme').on('switchChange.bootstrapSwitch', function(event, state) {
if(state==false){
    $('.linha_naoconforme_razao').show(); 
    }
 else{
   $('.linha_naoconforme_razao').hide();  
 }
})
 $('.linha_naoconforme_razao').hide(); 

$('#id_op_select').change(function() {
op=$('#id_op_select').val();
//of=$('#id_of_select').val();
//window.location.href ='index.php?page=uc2/registos_op&id_op='+op
/*if(of && of!=0){
window.location.href ='index.php?page=uc2/registos_op&id_op='+op+'&id_of='+of;
}
else{
window.location.href ='index.php?page=uc2/registos_op&id_op='+op
}*/


       $(".xcrud-overlay").show();
$.ajax({
  url: 'pages/uc2/get_ofs.php?&id_op='+op,
  cache: false,
  dataType: "json",
  success: function(data) {
    $('#id_of_select').empty();  
    $.each(data, function(key,val) {

$('#id_of_select').append("<option value='selected'>- Seleccione -</option>");
$('#id_of_select').append("<option value='" + val.id_of+ "'>" + val.nome_of + "</option>");
});
$('#id_of_select').select2OptionPicker();

}});
  $(".xcrud-overlay").hide();


});




$('#id_of_select').change(function() {
op=$('#id_op_select').val();
of=$('#id_of_select').val();

if(op!=0){
window.location.href ='index.php?page=uc2/registos_op&id_op='+op+'&id_of='+of;
}
else{
window.location.href ='index.php?page=uc2/registos_op&id_of='+of
}


});


});

function vertudo(){

  $(".vertudo").hide();
  $('.select2OptionPicker li').addClass('ver');

}


</script>
