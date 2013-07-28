<?php

$isLoggedIn='false';
$isDebug='false';

session_start();
foreach($_SESSION as $key=>$value) {
	switch(strtolower($key)) {
		case 'loggedin':
			$isLoggedIn='true';
			break;	
		case 'debugenabled':
			$isDebug='true';
			break;
		case 'currentpage':
			$page = $value;
			break;
	}	
}

?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <title>Dashboard</title>
	    <!-- load Dojo -->
	    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.9.0/dijit/themes/claro/claro.css">
	    <style>
			html, body {
			    width: 100%;
			    height: 100%;
			    margin: 0;
			    overflow:hidden;
			    visibility:hidden;
			}
	    </style>
	    <script>
	    	var isLoggedIn = <?=$isLoggedIn?>;
		    dojoConfig = {
	        has: {
	            "dojo-debug-messages": true
	        },
	        isDebug: <?=$isDebug?>, 
	        async: true, 
	        parseOnLoad: true
	    };
	    </script>
	    <script src="//ajax.googleapis.com/ajax/libs/dojo/1.9.0/dojo/dojo.js"></script>
	    <script>
	    	function startup() {
	    		try {
	    			dojo.query('html body').style('visibility','visible')
	    		} catch (e) {
	    			window.console && console.log("Error:" + JSON.stringify(e) )
	    		}
	    	}
	    	require(["dojo/query","dojo/ready"],function(query,ready){
	    		ready(function(){
	    			startup()
	    		})
	    	})
	    </script>
	</head>
	<!-- set the claro class on our body element -->
	<body class="claro">
		<?php include ("snippets/panes.php"); ?>
		<?php include ("snippets/login.php"); ?>
	</body>
</html>