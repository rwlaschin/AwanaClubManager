<?php

// This is the registration demo page

// database
// date id key foreign value
$isDebug='true';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <!-- load Dojo -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.9.0/dijit/themes/claro/claro.css">
    <script>
		    dojoConfig = {
	        has: {
	            "dojo-debug-messages": true
	        },
	        isDebug: <?=$isDebug?>, 
	        asyncappendChild: true, 
	        parseOnLoad: false
	    };
	</script>
    <script src="//ajax.googleapis.com/ajax/libs/dojo/1.9.0/dojo/dojo.js"></script>
    <script>
        // load requirements for declarative widgets in page content
        require(["dojo/parser", "dojo/domReady!"]);
        require(["dojo/dom","dojo/dom-attr","dijit/form/Button"
        		 "dijit/form/Select","dijit/form/TextBox",
        		 "dijit/form/Form","dijit/Fieldset",
        		 "dijit/form/ToggleButton"], function(dom,attr,button,select,textbox,form,fieldset) {
        		 	var elements = []
                     // the code in here is for building the page
                     var $container = dom.byId("relation")
                     elements[elements.length] = buildForm( dom ); // parents
                     elements[elements.length] = buildForm( dom ); // address
                     elements[elements.length] = buildForm( dom ); // emergency contact
                     for( i=0;i<elements.length;i++) {
                     	$container.appendChild(elements[i].domNode);
                     }
                     for (i=0;i<elements.length;i++) {
                     	elements[i].startup()
                     }
                     attr.set($container,"display","block")
        		 } )
    </script>
    <script>
    	function buildForm( dom, title ){
    		var tp = new Fieldset({title:title, content: "Collapse me!"});
            return tp
    	}
    </script>
</head>
<!-- set the claro class on our body element -->
<body class="claro">
	<div>
		<img src='../images/VCLogo.png' style='float:center'></img><br/>
		<span><img src='../images/AwanaLogo.png'></img> <font size='+2'>Registration 2014-2015</font></span>
	</div>

    <form data-dojo-type="dijit/form/Form" id="relation">
    	<!-- Family Last Name -- >	<!-- Home phone -->
    <!-- This is duplicate
    	<fieldset id="contact" data-dojo-type="dijit/Fieldset" title="Family Contact Information" toggleable='false'>
	    <label for="lastname">Family Last Name:</label>
		<input type="text" name="lastname" value="" title="Enter your Family's Last Name"
		    data-dojo-type="dijit/form/TextBox"
		    data-dojo-props="trim:true, propercase:true" id="family_lastname" />

		<label for="homephone">Home Phone:</label>
		<input type="text" name="homephone" value="" title="Enter your home phone number"
		    data-dojo-type="dijit/form/TextBox"
		    data-dojo-props="trim:true, propercase:true" id="homephone" />
		</fieldset>
	-->

	<!-- Notes:  We need a family identifier to group family w/children and emergency contact -->
	    <!-- array with add
	    	parents (Father/Mother) 'First' 'Last' 'phone' 'email' 'volunteer'
		-->
		<!--
		<fieldset id="parentsInfo" data-dojo-type="dijit/Fieldset" title="Parents" toggleable='false'>
			<table border=0>
				<tr><td>
			<select id="parentSelect01" data-dojo-type="dijit.form.Select"
		        data-dojo-props="name: 'parentSelect01'">
		        <option value="Father" selected="selected">Father</option>
		        <option value="Mother">Mother</option>
		        <option value="Grandfather">Grandfather</option>
		        <option value="Grandmother">Grandmother</option>
		        <option value="Aunt">Aunt</option>
		        <option value="Uncle">Uncle</option>
		        <option value="Gardian">Gardian</option>
		    </select>
		    	    <td>
		    <label for="firstname">First Name:</label>
		    	    <td>
			<input type="text" name="firstname" value="" title="Enter your first name"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true"/>
		    	    <td>
			<label for="lastname">Last Name:</label>
		    	    <td>
			<input type="text" name="lastname" value="" title="Enter your last name"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true"/>
		    	<tr><td>
		    	    <td>
			<label for="homephone">Home Phone:</label>
		    	    <td>
			<input type="text" name="homephone" value="" title="Enter your phone number"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true"/>
		    	    <td>
			<label for="email">E-mail:</label>
		    	    <td>
			<input type="text" name="email" value="" title="Enter your e-mail"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true"/>
			<button data-dojo-type="dijit/form/ToggleButton" data-dojo-props="iconClass:'dijitCheckBoxIcon', checked: false">
    			Willing to Voluenteer
			</button>
				<tr><td>
			<select id="parentSelect02" data-dojo-type="dijit.form.Select"
		        data-dojo-props="name: 'parentSelect02'">
		        <option value="Father">Father</option>
		        <option value="Mother" selected="selected">Mother</option>
		    </select>
		    	   <td>
		    <label for="firstname">First Name:</label>
		    	   <td>
			<input type="text" name="firstname" value="" title="Enter your first name"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true" />
			       <td>
			<label for="lastname">Last Name:</label>
				   <td>
			<input type="text" name="lastname" value="" title="Enter your last name"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true" />
			    <tr><td>
				    <td>
			<label for="homephone">Home Phone:</label>
				    <td>
			<input type="text" name="homephone" value="" title="Enter your phone number"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true" />
				    <td>
			<label for="email">E-mail:</label>
				    <td>
			<input type="text" name="email" value="" title="Enter your e-mail"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true" />
			<button data-dojo-type="dijit/form/ToggleButton" data-dojo-props="iconClass:'dijitCheckBoxIcon', checked: false">
    			Willing to Voluenteer
			</button>
		</table>
		</fieldset>
		<fieldset id="residenceAndContact" data-dojo-type="dijit/Fieldset" title="Address" toggleable='false'>
			<table border=0>
				<tr><td>
				<label for="street">street</label>
				    <td>
				<input type="text" name="street" value="" title="Enter your street address"
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
				    <td>
				<label for="city">city</label>
				    <td>
				<input type="text" name="city" value="" title="Enter the city"
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
				    <td>
				<label for="zipcode">zip code</label>
				    <td>
				<input type="text" name="state" value="" title="Enter the zip code"
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
				<tr><td>
					<label><b>Mailing Address</b></label>
				<tr><td>
				<label for="street">street</label>
				    <td>
				<input type="text" name="street" value="" title="Enter your street address"
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
				    <td>
				<label for="city">city</label>
				    <td>
				<input type="text" name="city" value="" title="Enter the city"
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
				    <td>
				<label for="zipcode">zip code</label>
				    <td>
				<input type="text" name="state" value="" title="Enter the zip code"
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
					<tr><td>
				<label for="homechurch">Local/Home Church</label>
				    <td>
				<input type="text" name="homechurch" value="" title="Enter the full name of your home church"
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
					<td>
				<label for="city">city</label>
				    <td>
				<input type="text" name="city" value="" title="Enter the city of your home church"
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
			</table>
		</fieldset>
		<fieldset id="emergencyContact" data-dojo-type="dijit/Fieldset" title="Emergency Contact if Parents cannot be reached" toggleable='false'>
			<table border=0>
				<tr><td>
				<label for="firstname">First name</label>
				    <td>
				<input type="text" name="firstname" value="" title=""
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
				    <td>
				<label for="lastname">Last name</label>
				    <td>
				<input type="text" name="lastname" value="" title=""
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
				    <td>
				<label for="relationship">relationship</label>
				    <td>
				<input type="text" name="relationship" value="" title=""
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
				    <tr><td>
				<label for="homephone">Home phone</label>
				    <td>
				<input type="text" name="homephone" value="" title=""
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
				    <td>
				<label for="cellphone">cell phone</label>
				    <td>
				<input type="text" name="cellphone" value="" title=""
				    data-dojo-type="dijit/form/TextBox"
				    data-dojo-props="trim:true, propercase:true" />
			</table>
		</fieldset>
	-->
	<!-- Send this in the confirmation e-mail
		<label>If your child is transferring from another club please mail (Valley Church) or email (awanaadmin@valleychurch.org) their Awana records</label></br>
		<label>Also note that Nursery and Cubbies are for volunteers only.</label>
	-->
	</form>
    <!-- store -->
    <table border=0 width="95%">
    	<tr><td>
	    <button id="btnReset" data-dojo-type="dijit/form/Button"
	        data-dojo-props="
	            onClick: function(){ console.log('Reset data'); }">
	        Reset
	    </button>
	       <td align="right">
	    <button id="btnSave" data-dojo-type="dijit/form/Button"
	        data-dojo-props="
	            onClick: function(){ console.log('Save data'); }">
	        Save
	    </button>

	</table>

</body>
</html>