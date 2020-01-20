<?php
$lingua=$_SESSION['jigowatt']['lingua_user'];
$xcrud = Xcrud::get_instance();
$xcrud->table('pdfs');
$xcrud->table_name('Documentos - PDF');
$xcrud->label('id_produto','Produto');
$xcrud->label('id_tipodedocumento','Tipo de Documento');
$xcrud->label('id_user','Cliente');
$xcrud->label('titulo','Título');
$xcrud->relation('id_produto','docs_produtos','id_produto','nome_produto','activo=1');
$xcrud->relation('id_tipodedocumento','docs_tiposdedocumentos','id_tipodedocumento','nome_tipodedocumento','activo=1','id_tipodedocumento asc');

$xcrud->column_callback('titulo','download_pdf');
$xcrud->change_type('pdf_pt,pdf_en,pdf_es,pdf_it,pdf_fr', 'file', '', array('not_rename'=>true));
$xcrud->columns('id_produto,id_tipodedocumento,titulo');
if($lingua=="3"){

	  $xcrud->label('titulo','Title');
	  
}
	

echo $xcrud;
?>