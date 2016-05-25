<?php
 ini_set('display_errors', '0');
/* error_reporting(E_ALL);*/
require("db/requires.php");


$general= new General();
$regiones= $general->getTotalDatos("FtDepartamento");
//printVar($regiones);
$smarty->assign('regiones',$regiones);
	$smarty->display("index.html"); 

?>