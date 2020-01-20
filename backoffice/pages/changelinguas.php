<?php
session_start();
$lingua= $_GET['lingua'];
$_SESSION['jigowatt']['lingua_user']=$lingua;
$_SESSION['jigowatt']['lingua']=$lingua;
if(isset($_GET['page'])){
$page=$_GET['page'];
header("Location:../index.php?page=$page");
}else{
header("Location:../index.php");
}
?>