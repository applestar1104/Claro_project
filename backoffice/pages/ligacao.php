<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .="/claro/ini.php";
include($path);
$ligacao = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
mysqli_set_charset($ligacao, "utf8");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($ligacao != TRUE) {
	echo "erro na ligacao";
}
?>