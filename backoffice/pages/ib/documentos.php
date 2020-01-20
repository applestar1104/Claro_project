<?php
$lingua=$_SESSION['jigowatt']['lingua_user'];
$xcrud = Xcrud::get_instance();
$xcrud->table('ib_ofs');
$xcrud->table_name('Ordens de Fabrico');
$xcrud->label('id_of','OF');
//$xcrud->label('id_tipodedocumento','Tipo de Documento');
$xcrud->label('id_user','Cliente');
$xcrud->label('titulo','Título');
$xcrud->relation('id_cliente','ib_clientes','id_cliente','nome_cliente','activo=1','id_cliente');
//$xcrud->relation('id_tipodedocumento','docs_tiposdedocumentos','id_tipodedocumento','nome_tipodedocumento','id_tipodedocumento !=1 and activo=1',false,true);
//$xcrud->relation('id_user','login_users','user_id','username','restricted= 0  and tabela="clientes"' ,false,true);

/*if(!protectThis("1") ){
$xcrud->where('id_user='.$user_id);
}*/
//$xcrud->column_callback('titulo','download_pdf');
//$xcrud->change_type('pdf_pt,pdf_en,pdf_es,pdf_it,pdf_fr', 'file', '', array('not_rename'=>true));
//$xcrud->columns('id_produto,id_tipodedocumento,titulo');
if($lingua=="3"){

	  $xcrud->label('titulo','Title');
	  
}
	

echo $xcrud;
?>