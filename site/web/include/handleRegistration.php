<?php

include "formUtils.php";
include "idatabase.php";

// function addPersonnel() { return array(); }

// $dbug = empty($_COOKIE['dbug'])?false:true;

$dataStore = parseFormData( $_REQUEST['formData'] );
list( $guardianId, $voluenteer ) = addPersonnel($dataStore);

setcookie('_familyInformation',
	json_encode(array(
		'identifier' => rand(),
		'voluenteer' => false
		),false),
	time()+1800,'/','*');

echo json_encode(
	array(
		'redirect'=>$_REQUEST['redirect'],
		'debugInfo' => json_encode($dataStore),
		)
	,false);
