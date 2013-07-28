<?php
?>
 <style>
    #loginDialog_underlay {
	    background-color:white;
	}
	.password-help {
		font-size: 66%;
	}
</style>
<div data-dojo-type="dijit/Dialog" data-dojo-id="loginDialog" title="Form Dialog" style="display:none;"
    execute="alert('submitted w/args:\n' + dojo.toJson(arguments[0], true));">

    <div class="dijitDialogPaneContentArea">
        <table>
            <tr>
                <td><label for="name">Name: </label></td>
                <td><input data-dojo-type="dijit/form/TextBox" type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td><label for="password">Password: </label></td>
                <td><input data-dojo-type="dijit/form/TextBox" type="password" name="password" id="password"></td>
            </tr>
        </table>
    </div>

    <div class="dijitDialogPaneActionBar">
        <a href="" class="password-help">Forgot user name</a><br/>
        <a href="" class="password-help">Forgot password</a>
    </div>

    <div class="dijitDialogPaneActionBar">
       <button data-dojo-type="dijit/form/Button" type="submit" onClick="return loginDialog.isValid();">
            Sign-on
        </button>
    </div>
</div>
<script>
	function showLogin() {
		if(isLoggedIn == false) {
			loginDialog.show()	
		}
	}
	// require(["dijit/registry", "dojo/parser", "dojo/dom","dijit/Dialog", "dijit/form/Button", "dijit/form/TextBox", "dojo/ready", "dojo/domReady!"], 
	require(["dojo/ready","dojo/query","dojo/parser"], 
		function(ready,query,parser){
			ready(function(){
				showLogin()			
			})
	});
</script>