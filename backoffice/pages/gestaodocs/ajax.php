<?php 
        if (!class_exists('Xcrud')) {
               include('../../../config/xcrud/xcrud.php');
        }

        $db = Xcrud_db::get_instance();        

        $OT = $_POST['OT'];
        
        $query = 'SELECT conteudo_template FROM docs_templates where id_template='.$OT;

        $db->query($query);
        $result = $db->result();
        $text = $result[0]["conteudo_template"];

        $query = 'SELECT nome_variable FROM docs_variable where id_template='.$OT;
        $db->query($query);
        $result1 = $db->result();
        $countitem = count($result1);

        $db->query($query);
        $result = $db->result();

        $produts_list = array();

        for ($i=0; $i < $countitem; $i++) {         

            if(strpos($text, $result1[$i]["nome_variable"]) !== false){ 
                array_push($produts_list, $result1[$i]["nome_variable"]);
            }
            $variable = "<span class='".$result1[$i]["nome_variable"]."'>{".$result1[$i]["nome_variable"]."}</span>";      
            $change_val = str_replace('{'.$result1[$i]["nome_variable"].'}', $variable, $text);
            $text = $change_val;

        };

        $aa = str_replace('{id_produto}', "<span>{id_produto}</span>", $text); $text = $aa;    
        $bb = str_replace('{nome_produto}',"<span>{nome_produto}</span>", $text); $text = $bb;
        $cc = str_replace('{id_categoriadeproduto}', "<span>{id_categoriadeproduto}</span>", $text); $text = $cc;
        $dd = str_replace('{id_user}', "<span>{id_user}</span>", $text); $text = $dd;
        $ee = str_replace('{criado_por}', "<span>{criado_por}</span>", $text); $text = $ee;
        $ff = str_replace('{criado_em}', "<span>{criado_em}</span>", $text); $text = $ff;
        $gg = str_replace('{actualizado_por}', "<span>{actualizado_por}</span>", $text); $text = $gg;
        $hh = str_replace('{actualizado_em}', "<span>{actualizado_em}</span>", $text); $text = $hh; 
        $ii = str_replace('{observacoes_produto}', "<span>{observacoes_produto}</span>", $text); $text = $ii;
        $jj = str_replace('{densidade_relativa_produto}', "<span>{densidade_relativa_produto}</span>", $text); $text = $jj;
        $kk = str_replace('{viscosidade_produto}',"<span>{viscosidade_produto}</span>", $text); $text = $kk;
        $ll = str_replace('{aspeto_produto}', "<span>{aspeto_produto}</span>", $text); $text = $ll;
        $mm = str_replace('{teor_de_solidos_produto}', "<span>{teor_de_solidos_produto}</span>", $text); $text = $mm;
        $nn = str_replace('{ph_produto}', "<span>{ph_produto}</span>", $text); $text = $nn;
        $oo = str_replace('{activo}', "<span>{activo}</span>", $text);  $text = $oo;

        $date = "System.CurrentDate";
        $variable = "<span class='create_date'>{System.CurrentDate}</span>";
        $pagebreak = '<p class="dis_none" style="page-break-before: always;"><!-- pagebreak -->';      
        $text = str_replace('{'.$date.'}', $variable, $text);
        $text = str_replace('<!-- pagebreak -->', $pagebreak, $text);

        $data['data3'] = $produts_list;
        $data['data'] = $text;
        echo json_encode($data);
       
?> 