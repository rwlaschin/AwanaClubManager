<?php
?>
<style>
	#borderContainerTwo {
	    width: 100%;
	    height: 100%;
	}
</style>
<script>
	require(["dojo/parser", "dijit/layout/ContentPane", "dijit/layout/BorderContainer", "dijit/layout/TabContainer", "dijit/layout/AccordionContainer", "dijit/layout/AccordionPane"]);
</script>
<div data-dojo-type="dijit/layout/BorderContainer" data-dojo-props="gutters:true, liveSplitters:false" id="borderContainerTwo">
    <div data-dojo-type="dijit/layout/ContentPane" data-dojo-props="region:'top', splitter:false">
        Hi, usually here you would have important information, maybe your company logo, or functions you need to access all the time..
    </div>
    <div data-dojo-type="dijit/layout/AccordionContainer" data-dojo-props="minSize:20, region:'leading', splitter:true" style="width: 300px;" id="leftAccordion">
        <div data-dojo-type="dijit/layout/AccordionPane" title="One fancy Pane">
        </div>
        <div data-dojo-type="dijit/layout/AccordionPane" title="Another one">
        </div>
        <div data-dojo-type="dijit/layout/AccordionPane" title="Even more fancy" selected="true">
        </div>
        <div data-dojo-type="dijit/layout/AccordionPane" title="Last, but not least">
        </div>
    </div><!-- end AccordionContainer -->
    <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center', tabStrip:true">
        <div data-dojo-type="dijit/layout/ContentPane" title="My first tab" selected="true">
        Lorem ipsum and all around...
        </div>
        <div data-dojo-type="dijit/layout/ContentPane" title="My second tab">
        Lorem ipsum and all around - second...
        </div>
        <div data-dojo-type="dijit/layout/ContentPane" data-dojo-props="closable:true" title="My last tab">
        Lorem ipsum and all around - last...
        </div>
    </div><!-- end TabContainer -->
</div><!-- end BorderContainer -->