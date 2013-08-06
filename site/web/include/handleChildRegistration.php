<?php

$_familyInformation = json_decode($_REQUEST['_familyInformation']);

setcookie('_familyInformation',json_encode($_familyInformation,false),time()+1800,'/','*');

echo json_encode(
	array(
		'redirect'=>$_REQUEST['redirect'],
		'debugInfo' => json_encode($_REQUEST)
		)
	,false);

?>