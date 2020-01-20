<?php 
        if (!class_exists('Xcrud')) {
               include('../../config/xcrud/xcrud.php');
        }

        $db = Xcrud_db::get_instance();        

        $OT = $_POST['OT'];
        
        $query = 'SELECT * FROM ib_ofs where id_of='.$OT;

        $db->query($query);
        $result = $db->result();
        $a =  $result[0]['id_cliente'];
        $b =  $result[0]['id_calibre'];
        $c =  $result[0]['id_qualidade'];
        $data['quantidade'] =  $result[0]['quantidade'];
        $data['o_quantidade'] =  $result[0]['quantidade'];
        $data['date'] =  $result[0]['data'];

        $query2 = 'SELECT * FROM ib_clientes where id_cliente='.$a;
        $query3 = 'SELECT * FROM ib_calibres where id_calibre='.$b;
        $query4 = 'SELECT * FROM ib_qualidades where id_qualidade='.$c;  

        $db->query($query2);
        $result2 = $db->result();
        $db->query($query3);
        $result3 = $db->result();
        $db->query($query4);
        $result4 = $db->result();
        $data['cliente'] =  $result2[0]['nome_cliente'];
        $data['calibre'] =  $result3[0]['nome_calibre'];
        $data['qualidade'] =  $result4[0]['nome_qualidade'];

        $query5 = 'SELECT * FROM ib_tratamentos where id_of='.$OT; 
        $query6 = 'SELECT SUM(quantidade_registo) AS total FROM ib_tratamentos where id_of='.$OT; 

        $db->query($query5);
        $result5= $db->result();
        
        $db->query($query6);
        $result6 = $db->result();

        $query1 = 'SELECT COUNT(id_slot) AS num FROM ib_tratamentos where id_of='.$OT; 
        $db->query($query1);
        $result1 = $db->result();
        $countrow = $result1[0]['num'];

        if($countrow){
        for ($i=0; $i < $countrow ; $i++) { 
  
                $data['quantidade_registo'] =  $result5[$i]['quantidade_registo'];
                $data['quantidade'] =  $data['quantidade']/1 - $data['quantidade_registo']/1;

        }
        } else{

                $data['quantidade'] =  $result[0]['quantidade'];
        }

        echo json_encode($data);
       
?> 