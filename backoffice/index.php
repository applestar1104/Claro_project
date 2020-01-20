<?php
include_once('../config/phplogin/classes/check.class.php');
protect("1,2,3,4,5,6,7,11");
$user_activo=$_SESSION['jigowatt']['username'];

if(isset($_SESSION['jigowatt']['linha_tabela'])){
$linha_tabela=$_SESSION['jigowatt']['linha_tabela'];
}
if(isset($_SESSION['jigowatt']['tabela'])){
$tabela=$_SESSION['jigowatt']['tabela'];
}
$superadmin=1;
$admin=2;
$adminread=3;
$funcionarioread=4;
$funcionario=5;
$cliente=6;
$fornecedor=7;
include('../config/xcrud/xcrud.php');
$user_id=$_SESSION['jigowatt']['user_id'];

if(isset($_SESSION['jigowatt']['lingua_user'])){
$lingua= $_SESSION['jigowatt']['lingua_user'];
}
else{
$lingua= $_SESSION['jigowatt']['lingua'];
$_SESSION['jigowatt']['lingua_user']=$lingua;
}


 	 $db = Xcrud_db::get_instance();
  	 $query = 'SELECT *  FROM linguas where id_lingua='.$lingua;
        $db->query($query);
        $result = $db->result();
       $cod_lingua = $result[0]['cod_lingua'];

Xcrud_config::$theme = 'bootstrap';
include ('html/template.php');

