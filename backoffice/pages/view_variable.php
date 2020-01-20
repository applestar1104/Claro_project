<?php 
        if (!class_exists('Xcrud')) {
	       include('../../config/xcrud/xcrud.php');
        }
	$db = Xcrud_db::get_instance();        

        $OT = $_POST['OT'];
        $quantity_val = $_POST['quantity_val']; 

        $query = 'SELECT * FROM ib_ofs where id_of='.$OT;
        $db->query($query);
        $result = $db->result();
        $quantity =  $result[0]['quantidade'];

        $query6 = 'SELECT SUM(quantidade_registo) AS total FROM ib_tratamentos where id_of='.$OT;

        $query1 = 'SELECT * FROM ib_tratamentos ORDER BY id_registo DESC';

        $db->query($query6);
        $result6 = $db->result(); 

        $db->query($query1);
        $result1 = $db->result(); 
        $id_slot =  $result1[0]['id_slot'];

        $query3 = 'UPDATE ib_slots SET in_use = 1 WHERE id_slot ='.$id_slot;
        $db->query($query3);       
        $data['slot'] = 1;
        $quantity_sum =  $result6[0]['total'];

        if( $quantity_sum == $quantity ) {

                $query8 = 'UPDATE ib_ofs SET in_use = 1 WHERE id_of='.$OT;
                $db->query($query8);
                $data['hide'] = 1;
        }
        

        echo json_encode($data);
       
?> 