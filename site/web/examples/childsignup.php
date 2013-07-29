<?php

if(empty($_REQUEST['_familyInformation'])) {
	echo "<html><head><title>Session Expired</title></head><body><h2>The session has expired</h2><a href='/'>Please return the the login page</a></body></html>";
	exit;
}

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
    <script type="text/javascript">
    	function log ( message ) {
    		try { 
    			console.log(  message ) }
    		catch (e) { 
    			alert( message )
    		}
    	}
    </script>
    <script type="text/javascript">
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
    <script src="//rwlaschin.byethost4.com/libs/dojoUtilityClasses.js"></script>
    <script type="text/javascript">
        // load requirements for declarative widgets in page content
        require(["dojo/parser", "dojo/domReady!"]);
        require(["dijit/form/Button", "dojo/parser", 
        		 "dijit/form/Select","dijit/form/ValidationTextBox",
        		 "dijit/form/Form","dijit/Fieldset",
        		 "dijit/form/ToggleButton",
        		 "dijit/form/DateTextBox",
        		 "dojo/NodeList-manipulate",
        		 "dojo/NodeList-dom",
        		 "dojo/dom-construct",
        		 "dijit/registry"]);
    </script>
    <script type="text/javascript">
    	var _gNum = 1
    	function createChildRegistration(tableName,index,domConstruct) {
    		//var registrationTable = dojo.byId( tableName )
    		var element = createTextbox('First name: ','child'+index+'_Firstname','',"Enter child's firstname") // first name
    		dojo.place(createTextbox('Last name: ','child'+index+'_Lastname','',"Enter child's lastname"), element, 'last') // last name
    		dojo.place(createSelect('child'+index+'_Gender',[
    				{ label:'Boy',value:'boy',selected:true},
    				{ label:'Girl',value:'girl',selected:true},
    			]), element, 'first')
    		dojo.place(createTextbox('Preferred name:','child'+index+'_Nickname','',"Enter child's preferred/nicknames if any"), element, 'last') // Preferred name
    		dojo.place("<br/>",element, 'last')
    		dojo.place(createSelect('child'+index+'_LastBookCompleted',[
    				{label:'Book1',value:'Book1',selected:true},
    				{label:'Book2',value:'Book2'},
    				{label:'Book3',value:'Book3'},
    				{label:'Book4',value:'Book4'},
    				{label:'Book5',value:'Book5'},
    				{label:'Book6',value:'Book6'},
    				{label:'Book7',value:'Book7'},
    				{label:'Book8',value:'Book8'},
    				{label:'Book9',value:'Book9'},
    				{label:'Book10',value:'Book10'},
    				{label:'Book11',value:'Book11'}
    			]), element, 'last' ) // book selection
    		dojo.place(createDatebox('Birthday:','child'+index+'_Birthday',null,"Enter the child's birthday"), element, 'last') // birthday
    		dojo.place(createSelect('child'+index+'_Grade', [
    				{label:"2 yrs or younger", value:'Nursery'},
    				{label:"3's & 4's", value:'Cubbies',selected:true},
    				{label:"K-2", value:'Sparks'},
    				{label:"3-6", value:'T&T'},
    				{label:"7-8", value:'Trek'},
    				{label:"9-12", value:'Journey'}
    			],[{eventid:'onChange',handler:function(){
    				var id = 'child'+index+'_Club'
    				var widget = dijit.byId(id)
    				widget.set('value', this.get('value'))
    			}}]), element, 'last') // grade
    		dojo.place(createSelect('child'+index+'_Club', [
    				{label:"Nursery", value:'Nursery'},
    				{label:"Cubbies", value:'Cubbies',selected:true},
    				{label:"Sparks", value:'Sparks'},
    				{label:"T&T", value:'T&T'},
    				{label:"Trek", value:'Trek'},
    				{label:"Journey", value:'Journey'}
    			]), element, 'last') // club
    		return element
    	}
    	function addAnotherChild(tableName) {
    		log('addAnotherChild')
    		// create new row for table
    		try {
    			var registrationTable = dojo.query( '#'+tableName )
    			console.log(registrationTable.html())

    			// create new child record
    			var newData = "<select id='child1-gender' data-dojo-type='dijit.form.Select'\n"+
		        " data-dojo-props='name: child1-gender'>"+
		        " <option value='Boy' selected='selected'>Boy</option>"+
		        " <option value='Girl'>Girl</option>"+
		    " </select>"+
		    	" <td>"+
			" <label for='child1-firstname'>First:</label>"+
			" <input type='text' name='child1-firstname' value='' title='Enter child's firstname'"+
			   " data-dojo-type='dijit/form/TextBox'"+
			  " data-dojo-props='trim:true, propercase:true' />"+
			   " <td>"+
			" <label for='child1-lastname'>Last:</label>"+
			" <input type='text' name='child1-lastname' value='' title='Enter child's lastname'"+
			    " data-dojo-type='dijit/form/TextBox'"+
			    " data-dojo-props='trim:true, propercase:true' />"+
			    "<td>"+
			"<label for='child1-preferred'>Preferred Name:</label>"+
			"<input type='text' name='child1-preferred' value='' title='Enter child's preferred name'"+
			    " data-dojo-type='dijit/form/TextBox'"+
			    " data-dojo-props='trim:true, propercase:true' />"+
""+
			"<tr><td>"+
				"<td>"+
			"<label for='child1-completedbook'>Last Book Completed:</label>"+
			"<input type='text' name='child1-completedbook' value='' title='Enter title of last book completed'"+
			    " data-dojo-type='dijit/form/TextBox'"+
			    " data-dojo-props='trim:true, propercase:true' />"+
			    "<td>"+
			"<label for='child1-birthday'>Birthday:</label>"+
			"<input type='text' name='child1-birthday' id='date1' value='2005-12-30'"+
			    " data-dojo-type='dijit/form/DateTextBox'"+
			    " required='true' />"+
			    "<td>"+
" 			<label for='child1-grade'>Grade:</label>"+
"			<select id='child1-grade' data-dojo-type='dijit.form.Select'"+
"		        data-dojo-props='name: child1-grade'>"+
"		        <option value='Nursery' selected='selected'>2 or younger</option>"+
"		        <option value='Cubbies' selected='selected'>3's&4's</option>"+
"		        <option value='Sparks'>K-2</option>"+
"		        <option value='T&T'>3-6</option>"+
"		        <option value='Trek'>6-8</option>"+
"		        <option value='Journey'>9-12</option>"+
"		    </select>"+
"		    <label for='child1-club'>Club:</label>"+
"			<select id='child1-club' data-dojo-type='dijit.form.Select'"+
"		        data-dojo-props='name: child1-club'>"+
"		        <option value='Nursery' selected='selected' title='Only available for Voluenteers'>Nursery</option>"+
"		        <option value='Cubbies' selected='selected'>Cubbies</option>"+
"		        <option value='Sparks'>Sparks</option>"+
"		        <option value='T&T'>T&T</option>"+
"		        <option value='Trek'>Trek</option>"+
"		        <option value='Journey'>Journey</option>"+
"		    </select>"
		    	var newTable = newData.replace('child1',"child" + _gNum)
		    	_gNum += 1

		    	registrationTable.after(newTable)
		    	dojo.parser()

    		} catch (e) {
    			log(e.message)
    		}
    	}
    </script>
</head>
<!-- set the claro class on our body element -->
<body class="claro">

	<div>
		<img src='../images/VCLogo.png' style='float:center'></img><br/>
		<span><img src='../images/AwanaLogo.png'></img> <font size='+2'>Registration 2014-2015</font></span>
	</div>

    <form data-dojo-type="dijit/form/Form" id="children">

	<!-- Children 
		'First' 'Last' 'Preferred Name' 'Gender (boy/girl)'
		Date of Birth [xx/yy/zzzz] Grade(<2 yr/3-4yr/K-2nd/3-6 grade/6-9 grade/9-12 grade) Club (Nursery/Cubbies/Sparks/T&T/Trek/Journey)
	-->

	<!-- Add child button -->

	<!-- registration and Material Fees
		child1 <club> <reg>  <book> (niv/nkjv) <uniform> (l/XL) <bag> <total>
	
	-->
	<!--                                                              TOTALS -->
		<fieldset id="child-registration-fields" data-dojo-type="dijit/Fieldset" title="Child registration" toggleable='false'>
			<div style='display:inline-block'>
			<table id='child-registration'>
				<tr><td>
			<select id='child1-gender' data-dojo-type="dijit.form.Select"
		        data-dojo-props="name: 'child1-gender'">
		        <option value="Boy" selected="selected">Boy</option>
		        <option value="Girl">Girl</option>
		    </select>
		    	<td>
			<label for="child1-firstname">First:</label>
			<input type="text" name="child1-firstname" value="" title="Enter child's firstname"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true" />
			    <td>
			<label for="child1-lastname">Last:</label>
			<input type="text" name="child1-lastname" value="" title="Enter child's lastname"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true" />
			    <td>
			<label for="child1-preferred">Preferred Name:</label>
			<input type="text" name="child1-preferred" value="" title="Enter child's preferred name"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true" />

			<tr><td>
				<td>
			<label for="child1-completedbook">Last Book Completed:</label>
			<input type="text" name="child1-completedbook" value="" title="Enter title of last book completed"
			    data-dojo-type="dijit/form/TextBox"
			    data-dojo-props="trim:true, propercase:true" />
			    <td>
			<label for="child1-birthday">Birthday:</label>
			<input type="text" name="child1-birthday" id="date1" value="2005-12-30"
			    data-dojo-type="dijit/form/DateTextBox"
			    required="true" />
			    <td>
			<label for="child1-grade">Grade:</label>
			<select id='child1-grade' data-dojo-type="dijit.form.Select"
		        data-dojo-props="name: 'child1-grade'">
		        <option value="Nursery" selected="selected">2 or younger</option>
		        <option value="Cubbies" selected="selected">3's&4's</option>
		        <option value="Sparks">K-2</option>
		        <option value="T&T">3-6</option>
		        <option value="Trek">6-8</option>
		        <option value="Journey">9-12</option>
		    </select>
		    <label for="child1-club">Club:</label>
			<select id='child1-club' data-dojo-type="dijit.form.Select"
		        data-dojo-props="name: 'child1-club'">
		        <option value="Nursery" selected="selected" title="Only available for Voluenteers">Nursery</option>
		        <option value="Cubbies" selected="selected">Cubbies</option>
		        <option value="Sparks">Sparks</option>
		        <option value="T&T">T&T</option>
		        <option value="Trek">Trek</option>
		        <option value="Journey">Journey</option>
		    </select>
		    </table>
		    </div>
		    <div style="display:inline-block;float:right">
		    	<table>
		    		<tr><td valign='bottom'>
			    	<button id="btnAddChild" data-dojo-type="dijit/form/Button"
				        data-dojo-props="
				            onClick: function() { addAnotherChild.call(this,'child-registration') }">
				        + add another child
				    </button>
				</table>
		    </div>
		</fieldset>
	</form>

    <!-- store -->
    <table border=0 width="95%">
    	<tr><td>
	    <button id="btnSave" data-dojo-type="dijit/form/Button"
	        data-dojo-props="
	            onClick: function(){ console.log('Save data'); }">
	        Save
	    </button>
	       <td align="right">
	    <button id="btnReset" data-dojo-type="dijit/form/Button"
	        data-dojo-props="
	            onClick: function(){ console.log('Reset data'); }">
	        Reset
	    </button>
	</table>
</body>
</html>