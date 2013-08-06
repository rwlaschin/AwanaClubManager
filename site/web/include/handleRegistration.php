<?php

include "/include/idatabase.php";

// header( "Location: {$_REQUEST['redirect']}");
// should redirect the user to the new page, but this is off an ajax call, we'll see what happens

// examine request .. do I want to add the data now, or create a session 
// and wait until the information for the children is ready?

$dataStore = array();
$formData = json_decode(urldecode(stripslashes($_REQUEST['formData'])));
foreach($formData as $key => $value) {
	// Category%d_Field
	// "{"Guardian1_Guardian":"Father","0":["Guardian1_Guardian","Guardian1","Guardian"],"Guardian1_FirstName":"Robert","1":["Guardian1_FirstName","Guardian1","FirstName"],"Guardian1_LastName":"Wlaschin","2":["Guardian1_LastName","Guardian1","LastName"],"Guardian1_HomePhone":"408.621.0106","3":["Guardian1_HomePhone","Guardian1","HomePhone"],"Guardian1_Email":"raw77_m@yahoo.com","4":["Guardian1_Email","Guardian1","Email"],"Guardian1_Voluenteer":"yes","5":["Guardian1_Voluenteer","Guardian1","Voluenteer"],"Address1_Street":"3542 Macintosh St.","6":["Address1_Street","Address1","Street"],"Address1_City":"Santa Clara","7":["Address1_City","Address1","City"],"Address1_State":"CA","8":["Address1_State","Address1","State"],"Address1_Zipcode":"95054","9":["Address1_Zipcode","Address1","Zipcode"],"Address2_Same":"same","10":["Address2_Same","Address2","Same"],"Address2_Street":"","11":["Address2_Street","Address2","Street"],"Address2_City":"","12":["Address2_City","Address2","City"],"Address2_State":"","13":["Address2_State","Address2","State"],"Address2_Zipcode":"","14":["Address2_Zipcode","Address2","Zipcode"],"Address3_HomeChurchName":"","15":["Address3_HomeChurchName","Address3","HomeChurchName"],"Address3_HomeChurchCity":"","16":["Address3_HomeChurchCity","Address3","HomeChurchCity"],"EmergencyContact1_FirstName":"Craig","17":["EmergencyContact1_FirstName","EmergencyContact1","FirstName"],"EmergencyContact1_LastName":"Lee","18":["EmergencyContact1_LastName","EmergencyContact1","LastName"],"EmergencyContact1_Relationship":"Friend","19":["EmergencyContact1_Relationship","EmergencyContact1","Relationship"],"EmergencyContact1_HomePhone":"408.988.1207","20":["EmergencyContact1_HomePhone","EmergencyContact1","HomePhone"],"EmergencyContact1_CellPhone":"","21":["EmergencyContact1_CellPhone","EmergencyContact1","CellPhone"]}"
	$category = "";
	if( preg_match ( "/([\w\d]+\d*)_([\w\d]+)/",$key, $matches ) > 0 ) {
		$data = null;
		$field = $matches[2];
		if($category != $matches[1] ) { 
			$category = $matches[1]; 
			$data = array();
			$dataStore[] = $data;
		}
		$data[$field]  = $value;
	}
}

list( $guardianId, $voluenteer ) = addPersonnel($dataStore);

setcookie('_familyInformation',
	json_encode(array(
		'identifier' => rand(),
		'voluenteer' => false
		),false),
	time()+1800,'/','*');
// setcookie('_voluenteer',($_REQUEST['redirect']),time()+1800,'/','*');

echo json_encode(
	array(
		'redirect'=>$_REQUEST['redirect'],
		'debugInfo' => json_encode($dataStore),
		)
	,false);

// I need to set a cookie to link the children to.  Name1 Id?
