
/////////////////////////////////////////
// Dojo needs to be loaded first
// author: robert.wlaschin
// dojo: ajax.googleapis.com/ajax/libs/dojo/1.9.1/dojo/dojo.js

require([
		"dojo","dijit/form/CheckBox","dijit/form/Select","dijit/form/TextBox",
		"dijit/form/ValidationTextBox","dijit/form/DateTextBox"
		], function() {
    window['dojo-loadedUtilities'] = window['dojo-loadedUtilities'] || {}
    window['dojo-loadedUtilities']['creation'] = true
})

function createTextbox(label,name,text,placeHolder) {
	var lb = dojo.create('label', {for:name,innerHTML:label})
	var tb = new dijit.form.TextBox({
        name: name,
        value: text,
        placeHolder: placeHolder,
        required: false,
        trim:true
    });
    dojo.place(tb.domNode,lb,'last')
	return lb
}
function createValidationTextBox(label,name,text,placeHolder) {
	var lb = dojo.create('label', {for:name,innerHTML:label})
	var tb = new dijit.form.ValidationTextBox({
        name: name,
        value: text,
        placeHolder: placeHolder,
        required: false,
        trim:true
    });
    dojo.place(tb.domNode,lb,'last')
	return lb
}
function createDateTextbox(label,name,date,placeHolder) {
	var lb = dojo.create('label', {for:name,innerHTML:label})
	var tb = new dijit.form.DateTextBox({
        name: name,
        value: date || new Date().getTime(),
        placeHolder: placeHolder,
        required: false
        trim:true
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
function createSelect(name,options,callbacks) {
	var sb = new dijit.form.Select({
			name:name,
			options: options
		})
	for ( index in callbacks ){
		dojo.connect(sb,
			callbacks[index].eventid,
			callbacks[index].handler)
	}
	return sb.domNode
}