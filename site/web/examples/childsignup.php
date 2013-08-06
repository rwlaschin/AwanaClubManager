<?php
/*
if(empty($_REQUEST['_familyInformation'])) {
	echo "<html><head><title>Session Expired</title></head><body><h2>The session has expired</h2><a href='/'>Please return the the login page</a></body></html>";
	exit;
}
*/

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
    <script src="http://rwlaschin.byethost4.com/libs/dojoUtilityClasses.js"></script>
    <script type="text/javascript">
        // load requirements for declarative widgets in page content
        require(["dojo/parser","dojo/dom","dijit/form/Button", "dojo/parser", 
        		 "dijit/form/Select","dijit/form/ValidationTextBox",
        		 "dijit/form/Form","dijit/Fieldset",
        		 "dijit/form/ToggleButton",
        		 "dijit/form/DateTextBox",
        		 "dojo/NodeList-manipulate",
        		 "dojo/NodeList-dom",
        		 "dojo/dom-construct",
        		 "dijit/registry","dojo/domReady!"],
        	function(){
	        	for(i=0;i<3;i++) {
	        		addAnotherChild('childrenRegistration')
	        	}
	        }
        );
    </script>
    <script type="text/javascript">
    	var _gNum = 1
    	function createChildRegistration(index,dom) {
    		var element = createTextbox('First name: ','child'+index+'_Firstname','',"Enter child's firstname") // first name
    		dojo.place(createTextbox('Last name: ','child'+index+'_Lastname','',"Enter child's lastname"), element, 'last') // last name
    		dojo.place(createSelect('child'+index+'_Gender',[
    				{ label:'Boy',value:'boy',selected:true},
    				{ label:'Girl',value:'girl',selected:true},
    			]), element, 'first')
    		dojo.place(createTextbox('Preferred name:','child'+index+'_Nickname','',"Enter child's preferred/nicknames if any"), element, 'last') // Preferred name
    		dojo.place("<br/>",element, 'last')
    		dojo.place(createSelectWithLabel('Last Book Completed: ','child'+index+'_LastBookCompleted',[
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
    		dojo.place(createDateTextbox('Birthday:','child'+index+'_Birthday',null,"Enter the child's birthday"), element, 'last') // birthday
    		dojo.place(createSelectWithLabel('Grade: ','child'+index+'_Grade', [
    				{label:"2 yrs or younger", value:'Nursery'},
    				{label:"3's & 4's", value:'Cubbies',selected:true},
    				{label:"K-2", value:'Sparks'},
    				{label:"3-6", value:'T&T'},
    				{label:"7-8", value:'Trek'},
    				{label:"9-12", value:'Journey'}
    			],[{eventid:'onChange',handler:function(){
    				var id = 'child'+index+'_Club'
    				var widget = dijit.byId(id)
    				widget.set('value', this.item.value)
    			}}]), element, 'last') // grade
    		dojo.place(createSelectWithLabel('Club: ','child'+index+'_Club', [
    				{label:"Nursery", value:'Nursery'},
    				{label:"Cubbies", value:'Cubbies',selected:true},
    				{label:"Sparks", value:'Sparks'},
    				{label:"T&T", value:'T&T'},
    				{label:"Trek", value:'Trek'},
    				{label:"Journey", value:'Journey'}
    			]), element, 'last') // club
            dojo.place(createSelectWithLabel('Uniform: ','child'+index+'_Uniform', [
                    {label:"Medium", value:'M'},
                    {label:"Large", value:'L'},
                    {label:"Extra Large", value:'XL'}
                ]), element, 'last') // Uniform size
            dojo.place(createCheckBox("Bag (not required): ","child"+index+"_Bag",false,'yes'),element,'last')
    		return element
    	}
    	function addAnotherChild(elementName) {
    		log('addAnotherChild')
    		// create new row for table
    		try {
    			var registrationElement = dojo.byId( elementName )
    			// console.log(registrationElement.html())
		    	_gNum += 1

		    	var registrationForm = new dijit.Fieldset({title:"Child registration", 
		    					toggleable: false, 
		    					content: createChildRegistration(_gNum,dojo.dom)});
		    	// registrationElemment.after(registrationForm) // appendChild?
		    	dojo.place(registrationForm.domNode,registrationElement,0)
		    	registrationForm.startup()
		    	// dojo.parser()

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
	<div style="display:inline-block;float:right">
    	<button id="btnAddChild" data-dojo-type="dijit/form/Button">
                <script type="dojo/on" data-dojo-event="click" data-dojo-args="evt">
                    require(["dojo/dom"],function() { 
                        addAnotherChild.call(this,'childrenRegistration') 
                    })
                </script>
	        + add another child
	    </button>
    </div>
	<div>
	    <form data-dojo-type="dijit/form/Form" id="childrenRegistration">
		<!-- registration and Material Fees
			child1 <club> <reg>  <book> (niv/nkjv) <uniform> (l/XL) <bag> <total>
		
		-->
		<!--                                                              TOTALS -->
			
		</form>
	</div>

    <!-- store -->
    <table border=0 width="95%">
    	<tr><td>
	    <button id="btnSave" data-dojo-type="dijit/form/Button">
            <script type="dojo/on" data-dojo-event="click" data-dojo-args="evt">
                require(["dojo/dom","dojo/dom-form","dojo/_base/xhr"],function(dom,domForm,xhr){
                    var content = domForm.toObject('childrenRegistration')
                    content['redirect'] = "/index.php?"
                    // open a secondary panel to verify that data is correct?  later
                    // ajax call and see if I can use a redirect header with a cookie
                    xhr.post({
                        url: "/include/handleChildRegistration.php?" + new Date().getTime(),
                        handleAs: "json",
                        timeout: 15000, // 15 seconds
                        content: content,
                        load: function(response,ioArgs) {
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