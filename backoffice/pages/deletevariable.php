<?php 
        if (!class_exists('Xcrud')) {
               include('../../config/xcrud/xcrud.php');
        }

        $db = Xcrud_db::get_instance();        

        $id_val = $_POST['id_val'];
        
        $query = 'DELETE FROM docs_variable WHERE id_variable = '.$id_val;

        $db->query($query);

        $data['slot'] = 1;

        echo json_encode($data);
       
?> 