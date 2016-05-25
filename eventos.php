<?php
require('db/requiers.php');
require('class/classCamiseta.php');

/*se ejecutan eventos dependiendo de lo solicitado*/
$varPost=filter_input_array(INPUT_POST);

$vrtCtr=$varPost['vrtCrt'];
switch ($varPost) {
	case 'ciudad':
		# code...
	printVar('hola');
		break;
	
	default:
		# code...
		break;
}
?>