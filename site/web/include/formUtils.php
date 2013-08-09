<?php


function parseFormData($formRequest) {
	
	//*******************************************************************
	//* parameters: $formRequest - URI encoded key/value form data
	//* return: categorized array of form values
	//* notes: Form id should be of the format
	//*        <group><index>_<field>
	//*        This will produce group1: {field: value,}, group2 ...
	//*******************************************************************
	$formData = json_decode(urldecode(stripslashes($formRequest)));
	$dataStore = array();

	foreach($formData as $key => $value) {
		if ( preg_match ( "/([\w\d]+\d+)_([\w\d]+)/",$key, $matches ) > 0 ) {
			$category = $matches[1];
			$field = $matches[2];
			if( empty($dataStore[$category]) ) { $dataStore[$category] = array(); }
			$data =& $dataStore[$category];
			if(empty($data[$field])) {$data[$field] = array(); }
			$data[$field] = $value;
		} else {
			$dataStore[$key] = "Failed to parse";
		}
	}

	return $dataStore;
}
