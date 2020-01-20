<?php
		include('../../config/xcrud/xcrud.php');
		$db = Xcrud_db::get_instance();        
        $query = 'SELECT * FROM `uc2_operacoes` ';
        $db->query($query);
        $result = $db->result();

        
?>