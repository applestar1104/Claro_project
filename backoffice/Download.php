<?php

    require_once './mpdf/vendor/autoload.php';
    include('../config/xcrud/xcrud.php');
    $db = Xcrud_db::get_instance();
   //form data from docgen
    $content1 = $_POST["content"];
    $from = $_POST["product_from"];
    $to = $_POST["product_to"];
    $template_type = $_POST["template"];
    $products = $_POST['states'];
    
    if ( isset($from) && isset($to) && $from !='0' && $to!='0') {
        if ($from != $to) {
            $query = "SELECT * FROM docs_produtos WHERE id_produto BETWEEN '$from ' AND '$to'";
        } else {
            $query = "SELECT * FROM docs_produtos WHERE id_produto = '$to'";
        }

        $db->query($query);
        $result = $db->result();
        $files = array();

        //selection from database
            
        //setting download endpoint
        $download_id = "SELECT MAX(id_download) AS num FROM download_history";
        $db->query($download_id);
        $pdfid = $db->result();
        $pdfid = $pdfid[0]["num"];

        //download directory creation
        if(!is_dir("Downloaded_PDFs")){
            mkdir("Downloaded_PDFs");
        }

        //pdf creation
        for ($i=0; $i < $to-$from + 1; $i++) { 
          $header = $_POST["header"];
          $footer = $_POST["footer"];
            
            $mpdf = new \Mpdf\Mpdf([
                'margin_top' => 20,
                'margin_bottom' => 40,
                'format' => 'A4'
            ]);
            $header = '<table style="width:100%;font-size:10px;">'.$header.'</table>';
            $footer = '<table style="width: 100%;font-size:8pt;font-family:serif;">'.$footer.'</table>';

            $mpdf->SetHeader($header);
            $mpdf->SetFooter($footer);
            $aa = str_replace('{id_produto}', $result[$i]['id_produto'], $content1);        
            $bb = str_replace('{nome_produto}', $result[$i]['nome_produto'], $aa);
            $cc = str_replace('{id_categoriadeproduto}', $result[$i]['id_categoriadeproduto'], $bb);
            $dd = str_replace('{id_user}', $result[$i]['id_user'], $cc);
            $ee = str_replace('{criado_por}', $result[$i]['criado_por'], $dd);
            $ff = str_replace('{criado_em}', $result[$i]['criado_em'], $ee);
            $gg = str_replace('{actualizado_por}', $result[$i]['actualizado_por'], $ff);
            $hh = str_replace('{actualizado_em}', $result[$i]['actualizado_em'], $gg);
            $ii = str_replace('{observacoes_produto}', $result[$i]['observacoes_produto'], $hh);
            $jj = str_replace('{densidade_relativa_produto}', $result[$i]['densidade_relativa_produto'], $ii);
            $kk = str_replace('{viscosidade_produto}', $result[$i]['viscosidade_produto'], $jj);
            $ll = str_replace('{aspeto_produto}', $result[$i]['aspeto_produto'], $kk);
            $mm = str_replace('{teor_de_solidos_produto}', $result[$i]['teor_de_solidos_produto'], $ll);
            $nn = str_replace('{ph_produto}', $result[$i]['ph_produto'], $mm);
            $content = str_replace('{activo}', '', $nn); 
            
            $footer = str_replace('{nome_produto}', $result[$i]['nome_produto'], $footer);
            $mpdf->SetHeader($header);
            $mpdf->SetFooter($footer);
            $pdfid++;
            $_SERVER['SCRIPT_NAME'] = str_replace('/inc', '', $_SERVER['SCRIPT_NAME']);
            $mpdf->showImageErrors = true;
            $mpdf->WriteHTML($content);
            $mpdf->Output('Downloaded_PDFs/'.$pdfid.'-'.$result[$i]['id_produto'].'-'.$template_type.'-'.$result[$i]['nome_produto'].'.pdf',\Mpdf\Output\Destination::FILE);
            array_push($files,'Downloaded_PDFs/'.$pdfid.'-'.$result[$i]['id_produto'].'-'.$template_type.'-'.$result[$i]['nome_produto'].'.pdf');
            print_r($files);

            $query = 'INSERT INTO download_history (id_produto, pdf_title) VALUES ("'.$result[$i]['id_produto'].'", "'.$pdfid.'-'.$result[$i]['id_produto'].'-'.$template_type.'-'.$result[$i]['nome_produto'].'.pdf")';
                $db->query($query);
        }

        //zip creation

        $zip = new ZipArchive();
        $zip_name = date("YmdHis"); // Zip name
        $zip_name.=".zip";
        $zip->open($zip_name,  ZipArchive::CREATE);
        foreach ($files as $file) {
          $path = $file;
          if(file_exists($path)){
            $message = "Success";
          $zip->addFromString(basename($path),  file_get_contents($path));  
          }
          else{
           $message = "file does not exist";
          }
        }
        $zip->close();

        //zip download and delete on server
        if(file_exists($zip_name)){
            ob_clean();
            ob_end_flush();
            header('Content-type: application/zip');
            header('Content-Disposition: attachment; filename="'.$zip_name.'"');
            readfile($zip_name);
            unlink($zip_name);
        }
} else if(isset($products)) {

        $produts_list = array();

        foreach ($products as $value) {

            $query = "SELECT * FROM docs_produtos WHERE id_produto = ".$value;
            $db->query($query);
            $result = $db->result();

        array_push($produts_list, $result);
        }        
        
        $files = array();

        $download_id = "SELECT MAX(id_download) AS num FROM download_history";

        $db->query($download_id);
        $pdfid = $db->result();
        $pdfid = $pdfid[0]["num"];

        //download directory creation
        if(!is_dir("Downloaded_PDFs")){
            mkdir("Downloaded_PDFs");
        }

        //pdf creation
        for ($i=0; $i < count($produts_list); $i++) { 
          $header = $_POST["header"];
          $footer = $_POST["footer"];
            
            $mpdf = new \Mpdf\Mpdf([
                'margin_top' => 20,
                'margin_bottom' => 40,
                'format' => 'A4'
            ]);
            $header = '<table style="width:100%;font-size:10px;">'.$header.'</table>';
            $footer = '<table style="width: 100%;font-size:8pt;font-family:serif;">'.$footer.'</table>';

            $mpdf->SetHeader($header);
            $mpdf->SetFooter($footer);
            $aa = str_replace('{id_produto}', $produts_list[$i][0]['id_produto'], $content1);        
            $bb = str_replace('{nome_produto}', $produts_list[$i][0]['nome_produto'], $aa);
            $cc = str_replace('{id_categoriadeproduto}',$produts_list[$i][0]['id_categoriadeproduto'], $bb);
            $dd = str_replace('{id_user}', $produts_list[$i][0]['id_user'], $cc);
            $ee = str_replace('{criado_por}', $produts_list[$i][0]['criado_por'], $dd);
            $ff = str_replace('{criado_em}', $produts_list[$i][0]['criado_em'], $ee);
            $gg = str_replace('{actualizado_por}', $produts_list[$i][0]['actualizado_por'], $ff);
            $hh = str_replace('{actualizado_em}', $produts_list[$i][0]['actualizado_em'], $gg);
            $ii = str_replace('{observacoes_produto}', $produts_list[$i][0]['observacoes_produto'], $hh);
            $jj = str_replace('{densidade_relativa_produto}', $produts_list[$i][0]['densidade_relativa_produto'], $ii);
            $kk = str_replace('{viscosidade_produto}', $produts_list[$i][0]['viscosidade_produto'], $jj);
            $ll = str_replace('{aspeto_produto}', $produts_list[$i][0]['aspeto_produto'], $kk);
            $mm = str_replace('{teor_de_solidos_produto}', $produts_list[$i][0]['teor_de_solidos_produto'], $ll);
            $nn = str_replace('{ph_produto}', $produts_list[$i][0]['ph_produto'], $mm);
            $content = str_replace('{activo}', '', $nn); 
            
            $footer = str_replace('{nome_produto}', $produts_list[$i][0]['nome_produto'], $footer);
            $mpdf->SetHeader($header);
            $mpdf->SetFooter($footer);
            $pdfid++;
            $_SERVER['SCRIPT_NAME'] = str_replace('/inc', '', $_SERVER['SCRIPT_NAME']);
            $mpdf->showImageErrors = true;
            $mpdf->WriteHTML($content);
            $mpdf->Output('Downloaded_PDFs/'.$pdfid.'-'.$produts_list[$i][0]['id_produto'].'-'.$template_type.'-'.$produts_list[$i][0]['nome_produto'].'.pdf',\Mpdf\Output\Destination::FILE);
            array_push($files,'Downloaded_PDFs/'.$pdfid.'-'.$produts_list[$i][0]['id_produto'].'-'.$template_type.'-'.$produts_list[$i][0]['nome_produto'].'.pdf');
            print_r($files);

            $query = 'INSERT INTO download_history (id_produto, pdf_title) VALUES ("'.$produts_list[$i][0]['id_produto'].'", "'.$pdfid.'-'.$produts_list[$i][0]['id_produto'].'-'.$template_type.'-'.$produts_list[$i][0]['nome_produto'].'.pdf")';
                $db->query($query);
        }

        //zip creation

        $zip = new ZipArchive();
        $zip_name = date("YmdHis"); // Zip name
        $zip_name.=".zip";
        $zip->open($zip_name,  ZipArchive::CREATE);
        foreach ($files as $file) {
          $path = $file;
          if(file_exists($path)){
            $message = "Success";
          $zip->addFromString(basename($path),  file_get_contents($path));  
          }
          else{
           $message = "file does not exist";
          }
        }
        $zip->close();

        //zip download and delete on server
        if(file_exists($zip_name)){
            ob_clean();
            ob_end_flush();
            header('Content-type: application/zip');
            header('Content-Disposition: attachment; filename="'.$zip_name.'"');
            readfile($zip_name);
            unlink($zip_name);
         }
 }
 else {
    echo "string";
}