<?php
	
	$xcrud = Xcrud::get_instance();

	    $xcrud = Xcrud::get_instance();
        $xcrud->table('ib_ofs');    
 	//include('pages/uc2/parametros_of.php');
  	 $xcrud->where('arquivo=1');
    $xcrud->unset_add();
    $xcrud->unset_edit();
  	 $xcrud->unset_print();
$xcrud->unset_remove();
$xcrud->unset_csv();

echo  $xcrud;

	?>