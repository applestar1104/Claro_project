<?php 
 		$db = Xcrud_db::get_instance();
   		//$query = 'SELECT * pdfs
   		// FROM `docs_produtos` WHERE id_user in(17)';
        $query='SELECT * 
FROM pdfs
INNER JOIN docs_produtos
ON pdfs.id_produto=docs_produtos.id_produto WHERE id_user in('.$user_id.')';
        $db->query($query);

        $result = $db->result();
         foreach ($result as $key => $item){
         $ids=$item['id_produto']; 
            }

   

$xcrud = Xcrud::get_instance();
$xcrud->table('pdfs');
$xcrud->where('id_produto in('.$user_id.')');
$xcrud->table_name('Documentos - PDF');
$xcrud->label('id_produto','Produto');
$xcrud->label('id_tipodedocumento','Tipo de Documento');
$xcrud->label('id_user','Cliente');
$xcrud->label('titulo','Título');
$xcrud->relation('id_produto','docs_produtos','id_produto','nome_produto','id_produto !=1 and activo=1',false,true);
$xcrud->relation('id_tipodedocumento','docs_tiposdedocumentos','id_tipodedocumento','nome_tipodedocumento','id_tipodedocumento !=1 and activo=1',false,true);
//$xcrud->relation('id_user','login_users','user_id','username','restricted= 0  and tabela="clientes"' ,false,true);

/*if(!protectThis("1") ){
$xcrud->where('id_user='.$user_id);
}*/
$xcrud->unset_edit();
$xcrud->unset_add();
$xcrud->unset_remove();
$xcrud->unset_view();
$xcrud->column_callback('titulo','download_pdf');
$xcrud->change_type('pdf_pt,pdf_en,pdf_es,pdf_it,pdf_fr', 'file', '', array('not_rename'=>true));
$xcrud->columns('id_produto,id_tipodedocumento,titulo');

if($lingua=="3"){

	  $xcrud->label('titulo','Title');
	  
}
	

echo $xcrud;
?>
