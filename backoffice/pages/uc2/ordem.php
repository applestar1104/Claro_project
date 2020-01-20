<?php
include('../../../config/xcrud/xcrud.php');
$id_ordem=$_GET['id_ordem'];


        $db = Xcrud_db::get_instance();
        $query = 'SELECT `id_operacao` FROM `uc2_ordem_operacoes` where id_ordem_operacao='.$id_ordem;
        $db->query($query);
        $result = $db->result();
       
       	$id= implode(",", $result[0]);
        $ids= explode(",",$id );
       
   
$ops = [];
$i=0;


foreach ($ids as &$value ) {
	$i++;
		$db2 = Xcrud_db::get_instance();
  		  $query2 = 'SELECT `id_operacao`,`cod_operacao` FROM `uc2_operacoes` where id_operacao='.$value;
        $db2->query($query2);
        $result2 = $db2->result();

        foreach ($result2 as $key => $item){
        	 $id=$item['id_operacao'];
           $ops[$i]['id_op']= $id;         
           $ops[$i]['cod_op']= $item['cod_operacao'];



/*
//opção 2 Extrusão/Moldação
        if($id==2){
        $db3 = Xcrud_db::get_instance(); 
        //get lista dos calibres
        $query3 = 'SELECT * FROM `uc2_calibres_corpos` ';
        $db3->query($query3);
        $result3 = $db3->result();
        $options="";
        foreach ($result3 as $key2 => $item2){
        $options.='<option value="'.$item2['id'].'">'.$item2['nome_corpo'].'</option>';
        }

$ops[$i]['cod_html']= '<div class="desc" style="display:none;"><label class="control-label col-sm-2">Calibre Corpo</label><div class="col-sm-10">';
$ops[$i]['cod_html'].='<select class="xcrud-input form-control" id="select_dois">'.$options.'</select></div>';
$ops[$i]['cod_html'].='<label class="control-label col-sm-2">Obs. '.$item['cod_operacao'].'</label>';
$ops[$i]['cod_html'].='<div class="col-sm-10"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="obs_2" maxlength="255">';
$ops[$i]['cod_html'].='</div></div>';
         }

//opção 2  fim Extrusão/Moldação  */


if($id==3){
$ops[$i]['cod_html']= '<div class="desc" style="display:none;">';
$ops[$i]['cod_html'].= '<div class=" trinta leftspace"><label class="control-label col-sm-2">Ponçar</label><div class="col-sm-10"><input type="checkbox" class="left make-switch left " name="" id="poncar" value=""><div class="input-inline input-small" id="poncar_input"><input class="xcrud-input form-control left  spin_input" type="text"  id="poncar_input_val" value="00.00" ></div></div></div>';
$ops[$i]['cod_html'].= '<div class=" trinta"><label class="control-label col-sm-2">Topejar</label><div class="col-sm-10"><input type="checkbox" class="left make-switch left " name="" id="topejar" value=""><div class="input-inline input-small" id="topejar_input"><input class="xcrud-input form-control left  spin_input" type="text"  value="00.00"  id="topejar_input_val" ></div></div></div>';
$ops[$i]['cod_html'].= '<div class=" trinta"><label class="control-label col-sm-2">Chanfrar</label><div class="col-sm-10"><input type="checkbox" class="left make-switch left" name="" id="chanfrar" value=""><div class="input-inline input-small" id="chanfrar_input"><input class="xcrud-input form-control left  spin_input" type="text"  value="00.00"  id="chanfrar_input_val" ></div></div></div>';
$ops[$i]['cod_html'].='<label class="control-label col-sm-2 clear">Obs. '.$item['cod_operacao'].'</label>';
$ops[$i]['cod_html'].='<div class="col-sm-10"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="obs_3" maxlength="255">';
$ops[$i]['cod_html'].='</div></div>';
  }


  if($id==4){
    $db3 = Xcrud_db::get_instance(); 
        //get lista dos calibres

      $query2 = 'SELECT * FROM `uc2_maquinasdelavacao` where id_maquinadelavacao!=1 and activo=1 ';
        $db2->query($query2);
        $result2 = $db3->result();
        $options2='<option value="">- Seleccione -</option>';
        foreach ($result2 as $key => $item3){
        $options2.='<option value="'.$item3['id_maquinadelavacao'].'">'.$item3['cod_maquinadelavacao'].'</option>';
             
          }

        $query3 = 'SELECT * FROM `uc2_lavacoes`  where id_lavacao!=1 and activo=1';
        $db3->query($query3);
        $result3 = $db3->result();
        $options='<option value="">- Seleccione -</option>';
        foreach ($result3 as $key2 => $item2){
        $options.='<option value="'.$item2['id_lavacao'].'">'.$item2['nome_lavacao'].'</option>';
$ops[$i]['cod_html']= '<div class="desc" style="display:none;">';
$ops[$i]['cod_html'].='<label class="control-label col-sm-2">Lavação</label>';
$ops[$i]['cod_html'].='<div class="col-sm-4"><select class="xcrud-input form-control" id="id_lavacao">'.$options.'</select></div>';

$ops[$i]['cod_html'].='<label class="control-label col-sm-2">Máquina de Lavação</label>';
$ops[$i]['cod_html'].='<div class="col-sm-4"><select class="xcrud-input form-control" id="id_maquina_lavacao">'.$options2.'</select></div>';



$ops[$i]['cod_html'].='<label class="control-label col-sm-2">Obs. '.$item['cod_operacao'].'</label>';
$ops[$i]['cod_html'].='<div class="col-sm-10"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="obs_4" maxlength="255">';
$ops[$i]['cod_html'].='</div></div>';
  }
}


//escolhas
  if($id==5){
    $db3 = Xcrud_db::get_instance(); 
    $kk=0;
    $options2='<option value="">- Seleccione -</option>';
        //get lista dos calibres
        $query3 = 'SELECT * FROM `uc2_tiposdeescolha` where id_tipodeescolha!=1 and activo=1 ';
        $db3->query($query3);
        $result3 = $db3->result();
        $options='<option value="">- Seleccione -</option>';
        foreach ($result3 as $key2 => $item2){
        $options.='<option value="'.$item2['id_tipodeescolha'].'">'.$item2['cod_tipodeescolha'].'</option>';
        $kk++;
        if($kk<3){
           $options2.='<option value="'.$item2['id_tipodeescolha'].'">'.$item2['cod_tipodeescolha'].'</option>';
        }
      
          }

$ops[$i]['cod_html']= '<div class="desc"style="display:none;"><label form-group class="control-label col-sm-2">Escolhas</label><div class="col-sm-10">';
$ops[$i]['cod_html'].='<select class="xcrud-input form-control" id="id_escolha">'.$options.'</select></div>';

$ops[$i]['cod_html'].= '<div class="desc2" style="display:none;"><label class="control-label col-sm-2">Qual a primeira</label><div class="col-sm-10">';
$ops[$i]['cod_html'].='<select class="xcrud-input form-control" id="id_escolha_ordem">'.$options2.'</select></div></div>';

$ops[$i]['cod_html'].='<label class="control-label col-sm-2">Obs. '.$item['cod_operacao'].'</label>';
$ops[$i]['cod_html'].='<div class="col-sm-10"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="obs_5" maxlength="255">';
$ops[$i]['cod_html'].='</div></div>';

}

//operação marcação
 if($id==6){

    $db3 = Xcrud_db::get_instance(); 
 
        //get lista dos calibres
        $query3 = 'SELECT * FROM `uc2_tiposdemarcacao` where id_tipodemarcacao!=1 and activo=1 ';
        $db3->query($query3);
        $result3 = $db3->result();
        $options='<option value="">- Seleccione -</option>';
        foreach ($result3 as $key2 => $item2){
        $options.='<option value="'.$item2['id_tipodemarcacao'].'">'.$item2['cod_tipodemarcacao'].'</option>';
             
          }


              //get lista dos calibres
        $query3 = 'SELECT * FROM `uc2_locaisdemarcacao` where id_localdemarcacao!=1 and activo=1 ';
        $db3->query($query3);
        $result3 = $db3->result();
        $options2='<option value="">- Seleccione -</option>';
        foreach ($result3 as $key2 => $item2){
        $options2.='<option value="'.$item2['id_localdemarcacao'].'">'.$item2['cod_localdemarcacao'].'</option>';
             
          }


   $query3 = 'SELECT * FROM `uc2_marcas` where activo=1 ';
        $db3->query($query3);
        $result3 = $db3->result();
        $options3='<option value="">- Seleccione -</option>';
        foreach ($result3 as $key2 => $item2){
        $options3.='<option value="'.$item2['id_marca'].'">'.$item2['cod_marca'].'</option>';
             
          }


 //$options='<option value="1">Fogo</option><option value="2">Tinta</option>';
  //$options2='<option value="1">Corpo</option><option value="2">Topo</option><option value="3">Corpo e Topo</option>';

//$options3='<option value="1">Marca 1</option><option value="2">Marca2</option><option value="3">Marca 3</option>';

$ops[$i]['cod_html']= '<div class="desc"style="display:none;"><label form-group class="control-label col-sm-2">Marcação</label><div class="col-sm-2">';
$ops[$i]['cod_html'].='<select class="xcrud-input form-control" id="id_marcacao" onchange="marcascall()">'.$options.'</select></div>';
$ops[$i]['cod_html'].= '<div class="local_marcacao" style="display:none;"><label class="control-label col-sm-2">Tipo Marcação</label><div class="col-sm-2">';
$ops[$i]['cod_html'].='<select class="xcrud-input form-control" id="local_marcacao"  onchange="marcascall()" >'.$options2.'</select></div></div>';

$ops[$i]['cod_html'].= '<div class="id_marca" style="display:none;"><label class="control-label col-sm-1">Marca</label><div class="col-sm-2">';
//$ops[$i]['cod_html'].='<select class="xcrud-input form-control" id="id_marca">'.$options3.'</select></div></div>';
$ops[$i]['cod_html'].='<select class="xcrud-input form-control" id="id_marca"></select></div><div class="col-sm-10 col-sm-offset-2" id="preview_marca"></div></div>';

$ops[$i]['cod_html'].='<label style="clear:both;" class="control-label col-sm-2">Obs. '.$item['cod_operacao'].'</label>';
$ops[$i]['cod_html'].='<div class="col-sm-10"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="obs_6" maxlength="255">';
$ops[$i]['cod_html'].='</div></div>';

 }

//Operação Tratamento Superficial
  if($id==7){
 $options='<option value="1">Produto 1</option><option value="2">Produto 2</option>';

    $db3 = Xcrud_db::get_instance(); 
 
        //get lista dos calibres
        $query3 = 'SELECT * FROM `uc2_produtostratamentosuperficial` where id_produtotratamentosuperficial!=1 and activo=1 ';
        $db3->query($query3);
        $result3 = $db3->result();
        $options='<option value="">- Seleccione -</option>';
        foreach ($result3 as $key2 => $item2){
        $options.='<option value="'.$item2['id_produtotratamentosuperficial'].'">'.$item2['cod_produtotratamentosuperficial'].'</option>';
             
          }

$ops[$i]['cod_html']= '<div class="desc"style="display:none;"><label form-group class="control-label col-sm-2">Produto</label><div class="col-sm-10">';
$ops[$i]['cod_html'].='<select class="xcrud-input form-control" id="id_produto">'.$options.'</select></div>';

$ops[$i]['cod_html'].='<label class="control-label col-sm-2">Quantidade Produto M1</label>';
$ops[$i]['cod_html'].='<div class="col-sm-4"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="quantidade_produtom1" maxlength="255"></div>';


$ops[$i]['cod_html'].='<label class="control-label col-sm-2">Quantidade Produto M2</label>';
$ops[$i]['cod_html'].='<div class="col-sm-4"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="quantidade_produtom2" maxlength="255"></div>';

$ops[$i]['cod_html'].='<label class="control-label col-sm-2" style="clear:both">Obs. '.$item['cod_operacao'].'</label>';
$ops[$i]['cod_html'].='<div class="col-sm-10"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="obs_7" maxlength="255">';
$ops[$i]['cod_html'].='</div></div>';

 }


//Operação Embalagem/Contagem
  if($id==8){
 
$ops[$i]['cod_html']= '<div class="desc"style="display:none;">';
$ops[$i]['cod_html'].='<label form-group class="control-label col-sm-2">Sacos Plástico</label><div class="col-sm-2 quatro"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="sacos" maxlength="255"></div>';
$ops[$i]['cod_html'].='<label form-group class="control-label col-sm-1">Caixas</label><div class="col-sm-2 quatro"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="caixas" maxlength="255"></div>';
$ops[$i]['cod_html'].='<label form-group class="control-label col-sm-1">Paletes</label><div class="col-sm-2 quatro"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="paletes" maxlength="255"></div>';
$ops[$i]['cod_html'].='<label form-group class="control-label col-sm-1">Rafia</label><div class="col-sm-2 quatro"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="rafia" maxlength="255"></div>';
$ops[$i]['cod_html'].='<label class="control-label col-sm-2 clear">Obs. '.$item['cod_operacao'].'</label><div class="col-sm-10"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="obs_8" maxlength="255"></div>';
$ops[$i]['cod_html'].='</div>';

 }

//Operação Expedição
  if($id==9){

$ops[$i]['cod_html']= '<div class="desc"style="display:none;">';
$ops[$i]['cod_html'].='<label class="control-label col-sm-2 clear">Data Expedição</label><div class="col-sm-10"><input class="xcrud-input datepicker form-control " type="text"  data-type="datetime" id="data_expedicao" value=""></div>';
$ops[$i]['cod_html'].='<label class="control-label col-sm-2">Obs. '.$item['cod_operacao'].'</label><div class="col-sm-10"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="obs_9" maxlength="255"></div>';
$ops[$i]['cod_html'].='</div>';
  }


//tolerancias falta este
  if($id==10){
$ops[$i]['cod_html']= '<div class="desc"style="display:none;">';
$ops[$i]['cod_html'].='<label class="control-label col-sm-2">Obs. '.$item['cod_operacao'].'</label><div class="col-sm-10"><input class="xcrud-input form-control" type="text" data-type="text" value="" id="obs_9" maxlength="255"></div>';
$ops[$i]['cod_html'].='</div>';
}

  }
}

echo json_encode($ops);
?>
