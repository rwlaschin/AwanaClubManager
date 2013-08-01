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
	        async: true, 
	        parseOnLoad: false
	    };
	</script>
    <script src="//ajax.googleapis.com/ajax/libs/dojo/1.9.1/dojo/dojo.js"></script>
    <script src="//rwlaschin.byethost4.com/libs/dojoUtilityClasses.js"></script>
    <script>
        // load requirements for declarative widgets in page content
        require(["dojo"])
        require(["dojo/parser", "dojo/domReady!"],function(parser) {
        	parser.parse()
        });
        require(["dojo/dom","dojo/on","dojo/dom-form"])
        require(["dojo/dom", "dojo/dom-attr", "dojo/dom-construct",
        		 "dijit/Fieldset","dijit/form/Form","dijit/form/Button",
        		 "dijit/form/CheckBox","dijit/form/Select","dijit/form/TextBox",
        		], function(dom,attr,dojoConstruct,Fieldset,Form,Button,CheckBox,Select,Textbox) {
        		 	 var elements = []
                     // the code in here is for building the page
                     var container = dom.byId("registrationInformation")
                     elements[elements.length] = buildForm( Fieldset, dom, "Guardians" ); // parents
                     elements[elements.length] = buildForm( Fieldset, dom, "Address" ); // address
                     elements[elements.length] = buildForm( Fieldset, dom, "Emergency Contact" ); // emergency contact
                     for( i=0;i<elements.length;i++) {
                     	container.appendChild(elements[i].domNode);
                     }
                     for (i=0;i<elements.length;i++) {
                     	elements[i].startup()
                     }
                     attr.set(container,"display","block")
        		 } )
    </script>
    <script>
    	function buildForm( Fieldset, dom, title ){
    		var content = "Unknown content type"
    		switch(title) {
    			case 'Guardians': 
    				content = buildGuardian(dom,1)
    				break
    			case 'Address':
    				content = buildAddress(dom)
    				break
    			case 'Emergency Contact':
    				content = buildEmergencyContact(dom)
    				break
    			default:
    				break
    		}
    		var tp = new Fieldset({title:title, toggleable: false, content: content});
            return tp
    	}
    	function buildGuardian(dom,index) {
    		var select = createSelect( "Guardian"+index+"_Guardian",[
    				{label: 'Father', value: 'Father', selected: true},
    				{label: 'Mother', value: 'Mother'},
    				{label: 'Aunt', value: 'Aunt'},
    				{label: 'Uncle', value: 'Uncle'},
    				{label: 'Grandmother', value: 'Grandmother'},
    				{label: 'Grandfather', value: 'Grandfather'},
    				{label: 'Guardian', value: 'Guardian'}
    			])
    		var element = createTextbox("First Name: ","Guardian"+index+"_FirstName","","Enter first name")
    		dojo.place(createTextbox("Last Name: ","Guardian"+index+"_LastName","","Enter last name"),element,'last')
    		dojo.place("<br/>",element,'last')
    		dojo.place(createTextbox("Home Phone: ","Guardian"+index+"_HomePhone","","Enter home phone number"),element,'last')
    		dojo.place(createTextbox("E-mail: ","Guardian"+index+"_Email","","Enter e-mail address"),element,'last')
    		dojo.place(createCheckBox("Voluenteering: ","Guardian"+index+"_Voluenteer",false,'yes'),element,'last')
    		dojo.place(select,element,'first')
    		return element
    	}
    	function buildAddress(dom) {
    		var index = 1
    		var element = createTextbox("Street: ","Address"+index+"_Street","","Enter street")
    		dojo.place(createTextbox("City: ","Address"+index+"_City","","Enter city"),element,'last')
    		dojo.place(createTextbox("Zipcode: ","Address"+index+"_Zipcode","","Enter zip code"),element,'last')
    		dojo.place("<br/>",element,'last')
    		dojo.place("<label><b>Mailing Address</b></label>",element,'last')
    		index = 2
    		dojo.place(createCheckBox("Check if same as above","Address"+index+"_Same",true,'same'),element,'last')
    		dojo.place("<br/>",element,'last')
    		dojo.place(createTextbox("Street: ","Address"+index+"_Street","","Enter street"),element,'last')
    		dojo.place(createTextbox("City: ","Address"+index+"_City","","Enter city"),element,'last')
    		dojo.place(createTextbox("Zipcode: ","Address"+index+"_Zipcode","","Enter zip code"),element,'last')
    		index = 3
    		dojo.place("<br/>",element,'last')
    		dojo.place(createTextbox("Local/Home Church: ","Address"+index+"_HomeChurchName","","Enter the full name of your home church"),element,'last')
    		dojo.place(createTextbox("City: ","Address"+index+"_HomeChurchCity","","Enter the city of your home church"),element,'last')
    		return element
    	}
    	function buildEmergencyContact(dom) {
    		index = 1
    		var element = createTextbox("First Name: ","EmergencyContact"+index+"_FirstName","","Enter first name")
    		dojo.place(createTextbox("Last Name: ","EmergencyContact"+index+"_LastName","","Enter last name"),element,'last')
    		dojo.place(createTextbox("Relationship: ","EmergencyContact"+index+"_Relationship","","Enter relationship"),element,'last')
    		dojo.place("<br/>",element,'last')
    		dojo.place(createTextbox("Home phone: ","EmergencyContact"+index+"_HomePhone","","Enter home phone number"),element,'last')
    		dojo.place(createTextbox("Cell phone: ","EmergencyContact"+index+"_CellPhone","","Enter cell phone number"),element,'last')
    		return element
    	}
    </script>
</head>
<!-- set the claro class on our body element -->
<body class="claro">
	<div>
		<img src='../images/VCLogo.png' style='float:center'></img><br/>
		<span><img src='../images/AwanaLogo.png'></img> <font size='+2'>Registration 2014-2015</font></span>
	</div>

    <form data-dojo-type="dijit/form/Form" id="registrationInformation">
	<!-- Send this in the confirmation e-mail
		<label>If your child is transferring from another club please mail (Valley Church) or email (awanaadmin@valleychurch.org) their Awana records</label></br>
		<label>Also note that Nursery and Cubbies are for volunteers only.</label>
	-->
	</form>
    <!-- store -->
    <table border=0 width="98%">
    	<tr><td>
	    	 <button id="btnSave" data-dojo-type="dijit/form/Button">
		    	<script type="dojo/on" data-dojo-event="click" data-dojo-args="evt">
		    		require(["dojo/dom","dojo/dom-form","dojo/_base/xhr"],function(dom,domForm,xhr){
		            	var content = domForm.toObject('registrationInformation')
		            	content['redirect'] = "/examples/childsignup.php"
		            	// open a secondary panel to verify that data is correct?  later
		            	// ajax call and see if I can use a redirect header with a cookie
		            	xhr.post({
		            		url: "/include/handleRegistration.php?" + new Date().getTime(),
		            		handleAs: "json",
		            		timeout: 15000, // 15 seconds
		            		content: content,
		            		load: function(response,ioArgs) {
		            			console.log(response)
		            			console.log(ioArgs)
		            			if(response && response.redirect) {
		            				window.location = response.redirect
		            			}
		            		}
		            	})
		    		})
		    	</script>
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