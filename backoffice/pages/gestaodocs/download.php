<?php
if (!class_exists('Xcrud')) {
include('../../../config/xcrud/xcrud.php');
}
include_once('../../../config/phplogin/classes/check.class.php');

$id=$_GET['id'];
$data=date('Y-m-d H:i:s');
$user=$_SESSION['jigowatt']['user_id'];

$db = Xcrud_db::get_instance();
$query ='INSERT INTO `views_pdf`(id_user,id_pdf,data) VALUES ("'.$user.'", "'.$id.'", "'.$data.'")';
$db->query($query); 


$query = "SELECT pdf_pt FROM pdfs WHERE id_pdf=$id limit 1";


        $db->query($query);
        $result= $db->result();


 echo $file =$result[0]['pdf_pt'];
 if($file){
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $file . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($_SERVER['DOCUMENT_ROOT']."/app/config/uploads/".$file);
  }
  else
  {
  echo "sem acesso";
  }
  ?>
