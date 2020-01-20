<?php 
        if (!class_exists('Xcrud')) {
               include('../../config/xcrud/xcrud.php');
        }

        $db = Xcrud_db::get_instance();        

        $var_name = $_POST['var_name'];
        $var_token = $_POST['var_token'];
        $id_template = $_POST['id_template'];
        $var_count = count($var_name);
        
        $query1 = 'SELECT MAX(id_template) AS num FROM docs_templates'; 
        $db->query($query1);
        $result1 = $db->result(); 
        $countrow = $result1[0]['num'];      
            if($countrow){
                $row = 1 + $countrow/1;
        }else {
            $row = 1;
        }

        for ($i=0; $i < $var_count; $i++) { 
            
            if($id_template){ 
                $query = 'INSERT INTO docs_variable (id_template, nome_variable, token) VALUES ("'.$id_template.'", "'.$var_name[$i].'", "'.$var_token[$i].'")';
                $db->query($query);
            } else { 
                $query = 'INSERT INTO docs_variable (id_template, nome_variable, token) VALUES ("'.$row.'", "'.$var_name[$i].'", "'.$var_token[$i].'")';
                $db->query($query);
            }
        }

        $data['slot'] = 1;
        echo json_encode($data);
       
?> 