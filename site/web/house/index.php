<?php
	$isDebug = 'true';
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
	    <style>
			#borderContainerTwo {
			    width: 100%;
			    height: 100%;
			}
		</style>
	    <script>
		    dojoConfig = {
	        has: {
	            "dojo-debug-messages": true
	        },
	        isDebug: <?=$isDebug?>, 
	        async: true, 
	        parseOnLoad: true,
	        gfxRenderer: "svg,silverlight,vml"
	    };
	    </script>
	    <script src="//ajax.googleapis.com/ajax/libs/dojo/1.9.0/dojo/dojo.js"></script>
	    <script>
			require(["dojo/parser", "dijit/layout/ContentPane", "dijit/layout/BorderContainer", "dijit/layout/TabContainer", 
				     "dijit/layout/AccordionContainer", "dijit/layout/AccordionPane","dojox/charting/themes/Claro"]);
			require(["dojox/charting/Chart","dojox/charting/axis2d/Default","dojox/charting/plot2d/Bars"]);
		</script>
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
	    	var donationChartData = [ 50000, 45000, 90000 ];
	    </script>
	</head>
	<!-- set the claro class on our body element -->
	<body class="claro">
		<div data-dojo-type="dijit/layout/BorderContainer" data-dojo-props="gutters:true, liveSplitters:false" id="borderContainerTwo">
		    <div data-dojo-type="dijit/layout/ContentPane" data-dojo-props="region:'top', splitter:false">
		        <h1>A hope, a dream</h1>
		        <p>In 2009, with an infant in tow, my wife and I bought a starter home ...</p>
		    </div>
		    <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center'" tabPosition="left-h" tabStrip="true">
		        <div data-dojo-type="dijit/layout/ContentPane" title="Story" selected="true">
		        <p>In 2009, with an infant in tow, my wife and I bought a starter home ...</p>
		        <p>It was a quaint home made in the 1960's, 1008 square feet, 3 bedroom, 1 bath.  For our small family it was a good size.  It was a fixer upper, and our single income house hold budget didn't allow for much in the way of nicities and the house came with problems of its own.  The bathroom wall was coming off, the kitchen cabinets were falling apart, the wood and flooring in the Kitchen was warping due to water leaking, the dishwasher was broken, no refigerator, the oven didn't work, the stove had only three working burners, termite damange, and the wood flooring was scrached and poxed.</p>
		        <p>Together we worked on fixing the major issues but quickly reached the limit of our income.  Then in 2011 we were surprized by the arrival of twins.  Now our family is feeling the strain of the small kitchen, pressure of having a single bathroom and limited space.</p>
		        
		        <p>Our dream is to remodel our home, fixing the issues and adding the new space/bathroom that we desperately need.  We are quickly discovering that remodeling is much more expensive than we imagined and obtaining loans and credit is tricky and has it's limits.  Because of the area we live in the city requires that when updates and remodeling is done the house must be brought up to code.  Something simple like adding on a room suddenly becomes and entire project as wiring and saftey features (such as fire alarms) have to be redone for the whole house.</p>

		        <p>In order to be able to remodel our home to make it livable for our family we are trying to sell what posessions we have or ask for donations in order to attain the funds needed for our project we ask for the support of the community.</p>

		        <p>We are trying to attain 240,000 in order to update our house to code, remodel the kitchen, add a living room, a bathroom and a master suite.  We have already gottens loans and lines of credit to total 95k.  Which leaves another 145k to achevie our goal.</p>

		        <p>If 28,000 people viewed this page and donated $5 USD our goal would be met</p>

		        <p>Any additional proceeds will be donated to <a href="http://hohafrica.org/wp/">hands of hope charity foundation</a> which builds homes for orphans in Africa.
		        </div>
		        <div data-dojo-type="dijit/layout/ContentPane" title="Goals">
		        	Chart for goals
			        <div
					    data-dojo-type="dojox/charting/widget/Chart"
					    data-dojo-props="theme:dojox.charting.themes.Claro" 
					    id="viewsChart" style="width: 550px; height: 550px;">
					 
					    <div class="plot" name="default" type="Bars" minBarSize="50000" maxBarSize="300000" fontColor="#000" labelOffset="-20"></div>
					    <div class="series" name="S1" store="donationChartData"></div>
					</div>
					<h3></h3>
					Chart for goals
					<script>
						
					</script>
		        </div>
		        <div data-dojo-type="dijit/layout/ContentPane" title="Oldsmobile">
		        Lorem ipsum and all around - second...
		        </div>
		        <div data-dojo-type="dijit/layout/ContentPane" data-dojo-props="closable:true" title="Honda CBR">
		        Lorem ipsum and all around - last...
		        </div>
		    </div><!-- end TabContainer -->
		</div><!-- end BorderContainer -->
	</body>
</html>