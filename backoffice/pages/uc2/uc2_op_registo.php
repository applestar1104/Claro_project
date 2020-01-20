<?php
echo $id_of=$_GET['id_of'];
$id_op=$_GET['id_op'];

$xcrud = Xcrud::get_instance();
$xcrud->table('uc2_op_registo'); 

$xcrud->pass_var('id_of',$id_op, 'create');
$xcrud->pass_var('id_op',$id_of, 'create');

$xcrud->fields('id_op,id_of', true);
echo $xcrud->render('create'); 

?>