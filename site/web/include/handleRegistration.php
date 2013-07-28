<?php

// header( "Location: {$_REQUEST['redirect']}");
// should redirect the user to the new page, but this is off an ajax call, we'll see what happens

setcookie('_familyIdentifier',rand(),time()+1800,'/','*');

echo json_encode(
	array(
		'redirect'=>$_REQUEST['redirect'],
		''
		)
	,false);

// I need to set a cookie to link the children to.  Name1 Id?
