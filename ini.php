<?php	
// mostrar erros ou não
//error_reporting(0);
// título da aplicação
$titulo="// APP - IB Claro";
// nome do cliente
$nomeapp="IB - Claro";
// versão do framework
$vframework = "1.0";
// versão do xcrud
$vxcrud = "1.6.25";
// versão template metronic
$vtemplate = "3.5";
// nome da empresa

if (!defined('FOLDER')) // Your database host, 'localhost' is default.
	define('FOLDER', 'claro');

if (!defined('DBNAME')) // Your database name
	define('DBNAME', 'claro');

if (!defined('DBUSER')) // Your database username
	define('DBUSER', 'root');

if (!defined('DBPASS')) // Your database password
	define('DBPASS', '');

if (!defined('DBHOST')) // Your database host, 'localhost' is default.
	define('DBHOST', 'localhost');

// cores do highlight
$highligth_desactivo = "red";
$highligth_urgente = "red";
$highligth_desactivo_urgente = "#8DED79";

?>