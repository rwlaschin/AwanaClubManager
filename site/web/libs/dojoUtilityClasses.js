
/////////////////////////////////////////
// Dojo needs to be loaded first
// author: robert.wlaschin
// dojo: ajax.googleapis.com/ajax/libs/dojo/1.9.1/dojo/dojo.js

function createTextbox(label,name,text,placeHolder) {
	var lb = dojo.create('label', {for:name,innerHTML:label})
	var tb = new dijit.form.TextBox({
        name: name,
        value: text,
        placeHolder: placeHolder
    });
    dojo.place(tb.domNode,lb,'last')
	return lb
}
function createCheckBox(label,name,checked,value){
	var lb = dojo.create('label',{for:name,innerHTML:label})
	var cb = new dijit.form.CheckBox({
		name:name,
		checked:false,
		value:value
	});
	dojo.place(cb.domNode,lb,'last')
	return lb
}
function createSelect(name,options) {
	var sb = new dijit.form.Select({
			name:name,
			options: options
		})
	return sb.domNode
}

require(["dojo","dijit/form/CheckBox","dijit/form/Select","dijit/form/TextBox"], function() {
    window['dojo-loadedUtilities'] = window['dojo-loadedUtilities'] || {}
    window['dojo-loadedUtilities']['creation'] = true
})