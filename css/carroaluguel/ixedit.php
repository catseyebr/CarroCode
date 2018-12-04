<?php header("Content-type: text/css"); 
$server_prefix_url = "http://".$_SERVER['HTTP_HOST']."/novo_carroaluguel";
?>
@charset 'UTF-8';

/*!
 * IxEdit CSS v1.0b
 * http://ixedit.com/
 *
 * Copyright (c) 2009 Sociomedia Inc.
 * http://www.sociomedia.co.jp/
 * Licensed under GPL.
 * http://ixedit.com/license/

 * Date: 2009-09-08
 */




.ixedit-dialog {
	border: none !important;
	background: none !important;
	padding: 0 !important;
	margin: 0 !important;
}


.ixedit-dialog * {
	font-size: 12px !important;
	font-family: 'Lucida Grande', Arial, sans-serif, 'ヒラギノ角ゴ Pro W3', 'Hiragino Kaku Gothic Pro' !important;
	color: #ffffff !important;
	line-height: 16px !important;
	width: auto;
	height: auto;
	border: none;
	margin: auto;
	padding: 0;
}

.ui-widget-shadow {
}

.ixedit-shadow {
	display: none !important;
}

.ui-widget-overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.ixedit-overlay {
	background-color: black !important;
	opacity: 0.5 !important;
	filter: alpha(opacity=50); /* for IE */
}

.ixedit-dialog button {
	overflow: visible; /* For IE 7 to avoid unnecessary padding */
}


.ixedit-dialog .ui-widget-header {
	border: none !important;
	background: none !important;
}

.ixedit-dialog .ui-state-hover, 
.ixedit-dialog .ui-widget-content .ui-state-hover, 
.ixedit-dialog .ui-state-focus, 
.ixedit-dialog .ui-widget-content .ui-state-focus {
	background: none;
}


.ixedit-dialog .ixedit-instruction-content {
	padding: 0 15px !important;
}

.ixedit-dialog .ixedit-instruction-content h2 {
	font-size: 12px !important;
	font-weight: bold !important;
	margin: 20px 0 !important;
}

.ixedit-dialog .ixedit-instruction-content h3 {
	font-size: 12px !important;
	font-weight: bold !important;
	margin-top: 1.8em !important;
	margin-bottom: 1em !important;
}


.ixedit-dialog .ixedit-instruction-content p {
	line-height: 20px !important;
	margin-top: 1.2em !important;
	margin-bottom: 1.2em !important;
	font-weight: normal !important;
}

.ixedit-dialog .ixedit-instruction-content ul, 
.ixedit-dialog .ixedit-instruction-content ol {
	line-height: 20px !important;
	margin: 0 0 20px 2.5em;
	padding: 0;
}

.ixedit-dialog .ixedit-instruction-content li {
	line-height: 20px !important;
	font-weight: normal !important;


}

.ixedit-dialog .ixedit-instruction-content textarea {
	width: 99% !important;
	height: 250px !important;
	padding: 0;
}



.ixedit-dialog .ixedit-instruction-content .ixedit-undertextareaoption {
	margin-bottom: 0 !important;
}


#ixedit-about-ui .ixedit-instruction-content *{
	text-align: center !important;
}

#ixedit-about-ui .ixedit-instruction-content p#ixedit-icon {
	width: 128px !important;
	height: 128px !important;
	background-image: url(<?php echo $server_prefix_url;?>/images/ixedit-icon.png);
	background-repeat: no-repeat;
	background-position: center center;
}

#ixedit-about-ui .ixedit-instruction-content h2 {
	font-size: 14px !important;
	margin-top: 0 !important;
}



.ixedit-dialog div {
	margin: 0;
	padding: 0;
}

.ixedit-dialog optgroup {
	font-style: normal;
	font-weight: bold;
	color: #cccccc !important;
	margin: 5px 3px !important;
}

.ixedit-dialog optgroup option {
	margin-left: 20px;
}


.ixedit-dialog table {
	border-collapse: collapse;
	/*border: 1px solid #f00;*/
	margin: 0;
	padding: 0;
	table-layout: fixed !important;
	width: 100%;
}



.ixedit-dialog .ui-dialog-titlebar-close { 
	display: none !important;
 }

.ixedit-dialog .ui-resizable-handle { position: absolute !important; }

.ixedit-dialog .ui-resizable-n { display: none !important; }
.ixedit-dialog .ui-resizable-e { display: none !important; }
.ixedit-dialog .ui-resizable-s { display: none !important; }
.ixedit-dialog .ui-resizable-w { display: none !important; }
.ixedit-dialog .ui-resizable-nw { display: none !important; }
.ixedit-dialog .ui-resizable-ne { display: none !important; }

.ui-dialog .ui-resizable-se { 
	cursor: se-resize !important;
	/*cursor: default;*/
	width: 15px !important; 
	height: 15px !important; 
	right: 0px !important;
	bottom: 0px !important;
	border: none !important;
	background: transparent url(<?php echo $server_prefix_url;?>/images/grabber-se.png) !important; }

.ixedit-dialog .ui-resizable-sw { display: none !important; }

.ixedit-dialog .ui-dialog-titlebar {
	position: relative;
	width: 100% !important;
	-webkit-border-top-left-radius: 8px !important;
	-webkit-border-top-right-radius: 8px !important;
	-webkit-border-bottom-left-radius: 0 !important;
	-webkit-border-bottom-right-radius: 0 !important;
	-moz-border-radius-topleft: 8px !important;
	-moz-border-radius-topright: 8px !important;
	-moz-border-radius-bottomleft: 0 !important;
	-moz-border-radius-bottomright: 0 !important;
	border: none !important;
	background-image: url(<?php echo $server_prefix_url;?>/images/bg-dark-titlebar.png) !important;
	background-position: left top !important;
	background-color: transparent !important;
	color: #ffffff !important;
	text-align: center !important;
	padding: 5px 0 !important;
	margin: 0 !important;
	cursor: default !important;
}

.ixedit-dialog .ui-dialog-title { 
	float: none !important; 
	margin: 0 !important;
	padding: 0 !important;
	font-weight: normal !important;
	text-shadow: black 0px -1px 0px;
}




.ixedit-dialog .ui-dialog-content {
	border: none !important;
	margin: 0 !important;
	padding: 0 !important;
	overflow: hidden !important;
	overflow-x: hidden !important;
	width: 100% !important;
	background-image: url(<?php echo $server_prefix_url;?>/images/bg-dark-80.png) !important;
	background-color: transparent !important;
	background-repeat: repeat !important;
}

.ixedit-dialog .ixedit-input {
	overflow: auto !important;
	overflow-x: hidden !important;
}



.ixedit-dialog .ui-dialog-buttonpane {
	background-image: url(<?php echo $server_prefix_url;?>/images/bg-dark-80.png) !important;
	width: 100% !important;
	text-align: center !important;
	-webkit-border-bottom-left-radius: 8px !important;
	-webkit-border-bottom-right-radius: 8px !important;
	-webkit-border-top-left-radius: 0 !important;
	-webkit-border-top-right-radius: 0 !important;
	-moz-border-radius-bottomleft: 8px !important;
	-moz-border-radius-bottomright: 8px !important;
	-moz-border-radius-topleft: 0 !important;
	-moz-border-radius-topright: 0 !important;
	border-top: 1px solid #666666 !important;
	border-bottom: none;
	border-left: none;
	border-right: none;
	padding: 5px 0 !important;
	background-color: transparent;
	margin: 0 !important;
}

.ixedit-dialog .ui-dialog-buttonpane button {
	width: auto;
	margin: 0 3px !important;
	-webkit-border-radius: 9px !important;
	-moz-border-radius: 9px !important;
	border: 1px solid #cccccc !important;
	padding: 0 12px !important;
	background-image: url(<?php echo $server_prefix_url;?>/images/bg-dark-mainbutton.png) !important;
	background-position: left top !important;
	background-color: transparent !important;
	float: none !important;
	cursor: default !important;
	color: #ffffff !important;
	text-shadow: none;
}

.ixedit-msie-old .ui-dialog-buttonpane button {
	/* padding: 0 6px !important; */
}
.ixedit-dialog .ui-dialog-buttonpane button.ixedit-pushed {
	background-position: left -30px !important;
	color: #999999 !important;
}

.ixedit-dialog .ui-dialog-buttonpane button.disabled {
	color: #666666 !important;
	border-color: #666666 !important;
}


.ixedit-dialog #ixedit-button-new {
	/*border-width: 2px !important;*/
	margin-right: 36px !important;
}

.ixedit-dialog #ixedit-button-edit {
	/*border-width: 2px !important;*/
	margin-left: 36px !important;
}

.ixedit-dialog #ixedit-button-doneandreload {
	/*border-width: 2px !important;*/
	margin-left: 120px !important;
}

.ixedit-dialog #ixedit-utility {
	height: 24px !important; /* This line is for IE 7 */
	position: relative;
	z-index: 1; /* This is for IE 7 */
}

.ixedit-dialog #ixedit-utility p, .ixedit-dialog #ixedit-utility p span {
	height: 24px !important; /* This line is for IE 7 */
	text-align: center;
	line-height: 24px !important;
	font-size: 10px !important;
	margin: 0;
}



#ixedit-routemenu {
	display: none;
	position: absolute !important;
	z-index: 10 !important;
	top: 20px !important;
	left: 5px !important;
	width: auto !important;
	color: white !important;
	background-color: #555555 !important;
	border-top: 1px solid #999999 !important;
	border-left: 1px solid #666666 !important;
	border-right: 1px solid #666666;
	border-bottom: 1px solid #666666;
	-webkit-border-radius: 4px !important;
	-moz-border-radius: 4px !important;
	cursor: default;
}

#ixedit-routemenu ul {
	margin: 0 !important;
	padding: 0 !important;
	background-color: #555555 !important;
	list-style-type: none !important;
	cursor: default !important;
}

#ixedit-routemenu li {
	margin: 0 !important;
	background-color: #555555;
	padding: 3px 15px !important;
	cursor: default !important;
}

#ixedit-routemenu li.ixedit-selected {
	background-color: #3875d7 !important;
}

#ixlist {
}

#ixedit-routemenu li#ixedit-showAbout {
	border-bottom: 1px solid #999999 !important;
}



.ixedit-dialog p.ixedit-undertextareaoption span * {
	vertical-align: middle;
}


.ixedit-dialog #ixedit-showdbdialog {
	overflow-x: auto !important;
}

.ixedit-dialog #ixedit-dbdatatable {
	border: 1px solid #999999 !important;
	table-layout: auto !important;
}

.ixedit-dialog #ixedit-dbdatatable td {
	border: 1px solid #999999 !important;
}




.ixedit-dialog div#showcommandhelpdialog {
	overflow: auto !important;
}




/* Main Inputs*/


.ixedit-dialog table#ixedit-basictitle, 
.ixedit-dialog table#ixedit-actiontitle, 
.ixedit-dialog table#ixedit-conditiontitle,
.ixedit-dialog table#ixedit-commenttitle {
	width: 100%;
	background-color: transparent !important;
	border-bottom: 1px solid #222222;
	cursor: default;
}

.ixedit-dialog table#ixedit-basictitle tr, 
.ixedit-dialog table#ixedit-actiontitle tr, 
.ixedit-dialog table#ixedit-conditiontitle tr,
.ixedit-dialog table#ixedit-commenttitle tr {
	background-color: transparent !important;
	background-image: url(<?php echo $server_prefix_url;?>/images/bg-dark-heading.png) !important;
	background-repeat: repeat-x !important;
	background-position: left top !important;
}

.ixedit-dialog table#ixedit-basictitle tr.ixedit-pushed, 
.ixedit-dialog table#ixedit-actiontitle tr.ixedit-pushed, 
.ixedit-dialog table#ixedit-conditiontitle tr.ixedit-pushed,
.ixedit-dialog table#ixedit-commenttitle tr.ixedit-pushed {
	background-position: left -30px !important;
}



.ixedit-dialog table#ixedit-conditiontitle,
.ixedit-dialog table#ixedit-commenttitle {
	border-top: none !important;
}

.ixedit-dialog td.unchian-disclosurearea-basic,
.ixedit-dialog td.unchian-disclosurearea-action,
.ixedit-dialog td.unchian-disclosurearea-condition,
.ixedit-dialog td.unchian-disclosurearea-comment {
	width: 20px;
	text-align: right;
}



.ixedit-dialog button.disclosure_triangle {
	font-size: 1px;
	line-height: 1px;
	height: 9px;
	width: 9px;
	border: none;
	margin: 0;
	padding: 0;
	background-color: transparent;
	background-image: url(<?php echo $server_prefix_url;?>/images/disclosure_triangle.png);
	background-repeat: no-repeat;
	background-position: left bottom;
}

.ixedit-dialog div.ixedit-hidden button.disclosure_triangle {
	background-position: left top;
}

.ixedit-dialog div tr.ixedit-pushed button.disclosure_triangle {
	background-position: right bottom;
}

.ixedit-dialog div.ixedit-hidden tr.ixedit-pushed button.disclosure_triangle {
	background-position: right top;
}



.ixedit-dialog td.ixedit-titlearea-basic, 
.ixedit-dialog td.ixedit-titlearea-action, 
.ixedit-dialog td.ixedit-titlearea-condition,
.ixedit-dialog td.ixedit-titlearea-comment {
	padding: 2px 10px 2px 5px !important;
}


.ixedit-dialog tr.ixedit-pushed td.ixedit-titlearea-action,
.ixedit-dialog tr.ixedit-pushed td.ixedit-titlearea-condition,
.ixedit-dialog tr.ixedit-pushed td.ixedit-titlearea-comment,
.ixedit-dialog tr.ixedit-pushed td.ixedit-titlestatusarea-basic,
.ixedit-dialog tr.ixedit-pushed td.ixedit-titlestatusarea-action,
.ixedit-dialog tr.ixedit-pushed td.ixedit-titlestatusarea-condition,
.ixedit-dialog tr.ixedit-pushed td.ixedit-titlestatusarea-comment {
	color: #999999 !important;
}

.ixedit-dialog td.ixedit-titlestatusarea-basic,
.ixedit-dialog td.ixedit-titlestatusarea-action,
.ixedit-dialog td.ixedit-titlestatusarea-condition,
.ixedit-dialog td.ixedit-titlestatusarea-comment {
	padding: 2px 20px 2px 5px !important;
	width: 40%;
	font-size: 10px !important; 
	overflow: hidden;
	text-align: right;
}



.ixedit-dialog div#ixedit-basicitems, 
.ixedit-dialog div#ixedit-actionitems, 
.ixedit-dialog div#ixedit-conditionitems,
.ixedit-dialog div#ixedit-commentitems {
	width: 100% !important;
}



.ixedit-dialog #ixedit-comment {
	margin: 12px 0;
}


.ixedit-dialog td.ixedit-basicdetails, 
.ixedit-dialog td.ixedit-actiondetails, 
.ixedit-dialog td.ixedit-conditiondetails {
	padding: 10px 5px 12px 10px !important;
}

.ixedit-dialog td.ixedit-commentdetails {
	padding: 0 !important;
}

.ixedit-dialog td.ixedit-basicdetails table, 
.ixedit-dialog td.ixedit-actiondetails table, 
.ixedit-dialog td.ixedit-conditiondetails table,
.ixedit-dialog td.ixedit-commentdetails table {
	width: 100% !important;
}

.ixedit-dialog tr.ixedit-condition-blank td.ixedit-conditiondetails {

}


.ixedit-dialog td.ixedit-basicdetails table td, 
.ixedit-dialog td.ixedit-actiondetails table td, 
.ixedit-dialog td.ixedit-conditiondetails table td,
.ixedit-dialog td.ixedit-commentdetails table td {
	padding: 3px 6px 3px 2px !important;
}





.ixedit-dialog input[type="text"],
.ixedit-dialog select,
.ixedit-dialog textarea {
	width: 100% !important;
	padding: 2px !important;
	border: 1px solid #cccccc !important;
}


.ixedit-dialog input[type="text"] {
	height: 16px !important;
}



.ixedit-dialog input[type="text"],
.ixedit-dialog textarea {
	background-color: #666666; /* Not important */
	background-image: url(<?php echo $server_prefix_url;?>/images/bg-textbox.png);
	background-repeat: repeat-x;
	background-position: left -1px;
}

.ixedit-dialog select {
	background-color: #555555 !important;
	height: 22px;
}


.ixedit-dialog-aboutbox input[type="text"],
.ixedit-dialog-aboutbox textarea {
	background-color: #663333;
}
.ixedit-dialog-aboutbox select {
	background-color: #330000 !important;
}
.ixedit-dialog-aboutbox .ui-dialog-titlebar,
.ixedit-dialog-aboutbox .ui-dialog-content,
.ixedit-dialog-aboutbox .ui-dialog-buttonpane {
	background-color: red !important;
}


.ixedit-dialog td.ixedit-labelarea-default {
	width: 80px !important;
	text-align: right !important;
}


.ixedit-dialog td.ixedit-labelarea-small {
	width: 50px;
	text-align: right;
}

.ixedit-dialog td.ixedit-labelarea-xsmall {
	width: 30px;
	text-align: right;
}

.ixedit-dialog td.ixedit-labelarea-medium {
	width: 70px;
	text-align: right;
}

.ixedit-dialog td.ixedit-labelarea-large {
	width: 100px;
	text-align: right;
}

.ixedit-dialog td.ixedit-labelarea-xlarge {
	width: 130px;
	text-align: right;
}

.ixedit-dialog td.ixedit-labelarea-xxlarge {
	width: 160px;
	text-align: right;
}

.ixedit-dialog td.ixedit-inputarea-xxlarge {
	width: 350px;
}

.ixedit-dialog td.ixedit-inputarea-xxlarge {
	width: 250px;
}

.ixedit-dialog td.ixedit-inputarea-xlarge {
	width: 200px;
}

.ixedit-dialog td.ixedit-inputarea-large {
	width: 140px;
}

.ixedit-dialog td.ixedit-inputarea-medium {
	width: 120px;
}

.ixedit-dialog td.ixedit-labelarea-mediumsmall {
	width: 80px;
}

.ixedit-dialog td.ixedit-inputarea-small {
	width: 70px;
}

.ixedit-dialog td.ixedit-inputarea-xsmall {
	width: 60px;
}

.ixedit-dialog td.ixedit-inputarea-xxsmall {
	width: 20px;
}


.ixedit-dialog table td.ixedit-labelarea-checkbox {
	text-align: left !important;
}

.ixedit-dialog td.ixedit-inputarea-checkbox {
	padding-right: 3px !important;
	width: 18px;
}


.ixedit-dialog td.subparambuttonarea {
	width: 50px;
}










.ixedit-dialog td.ixedit-tinybtnarea {
	width: 80px !important;
	vertical-align: middle !important;
	text-align: left !important;
	/* border-left: 1px dotted #666666; */

	text-align: center !important;
}

.ixedit-dialog td.ixedit-basicdetails, 
.ixedit-dialog td.ixedit-actiondetails, 
.ixedit-dialog td.ixedit-conditiondetails,
.ixedit-dialog td.ixedit-tinybtnarea {
	border-bottom: 1px solid #444444 !important;
}

.ixedit-dialog div.ixedit-commentinputs td.ixedit-tinybtnarea {
	border-bottom: none !important;
}






.ixedit-dialog .ixedit-blankcond-prompt, 
.ixedit-dialog .ixedit-unknowncommand-prompt {
	text-align: center !important;
	margin: 0 auto !important;
	color: #999999 !important;
	width: 430px; /* Fixed for Safari. table-layout: fixed does bad */
}




.ixedit-dialog td.ixedit-inputarea-xray {
	width: 35px !important;
}



.ixedit-dialog td.ixedit-tinybtnarea button, 
.ixedit-dialog button.ixedit-subparam-addbutton, 
.ixedit-dialog button.subparam-removebutton,
.ixedit-dialog button.ixedit-commandhelp,
.ixedit-dialog button.ixedit-xraybtn,
button.ixedit-xraycancel,
#ixedit-routebtn {
	/* text-indent: -9999999px; */
	-moz-border-radius: 8px !important;
	-webkit-border-radius: 8px !important;
	border: 1px solid #ffffff !important;
	background-color: transparent !important;
	background-repeat: no-repeat !important;
	padding: 0;
	margin: 0 2px;
	font-size: 1px;
	line-height: 1px;
}

.ixedit-dialog button.ixedit-commandhelp {
	margin-left: 0 !important;
}



.ixedit-dialog button.ixedit-addaction, 
.ixedit-dialog button.ixedit-addcondition {
	width: 16px !important; 
	height: 16px !important; 
	background-image: url(<?php echo $server_prefix_url;?>/images/tiny-plus.png) !important;
	background-position: -1px center !important;
}


.ixedit-dialog button.ixedit-addaction-h,
.ixedit-dialog button.ixedit-addcondition-h {
	background-position: -17px center !important;
}


.ixedit-dialog button.ixedit-removeaction, 
.ixedit-dialog button.ixedit-removecondition {
	width: 16px !important; 
	height: 16px !important; 
	background-image: url(<?php echo $server_prefix_url;?>/images/tiny-minus.png) !important;
	background-position: -1px center !important;
}


.ixedit-dialog button.ixedit-removeaction-h,
.ixedit-dialog button.ixedit-removecondition-h {
	background-position: -17px center !important;
}


.ixedit-dialog button.ixedit-subparam-addbutton {
	width: 16px !important; 
	height: 16px !important; 
	background-image: url(<?php echo $server_prefix_url;?>/images/tiny-plus-sub.png) !important;
	background-position: left center !important;
	border: none !important;
}

.ixedit-dialog button.ixedit-subparam-addbutton-h {
	background-position: right center !important;
}

.ixedit-dialog button.subparam-removebutton {
	width: 16px !important; 
	height: 16px !important; 
	background-image: url(<?php echo $server_prefix_url;?>/images/tiny-minus-sub.png) !important;
	border: none !important;
}

.ixedit-dialog button.ixedit-subparam-removebutton-h {
	background-position: right !important;
}


.ixedit-dialog button.ixedit-commandhelp {
	width: 16px !important; 
	height: 16px !important; 
	background-image: url(<?php echo $server_prefix_url;?>/images/tiny-help.png) !important;
	background-position: -1px center !important;
}


.ixedit-dialog button.ixedit-commandhelp-h {
	background-position: -17px center !important;
}



.ixedit-dialog button.ixedit-xraybtn {
	width: 28px !important; 
	height: 16px !important; 
	background-image: url(<?php echo $server_prefix_url;?>/images/tiny-xray.png) !important;
	background-position: -1px center !important;
}

.ixedit-dialog button.ixedit-xraybtn-pushed{
	background-position: -29px center !important;
}



button.ixedit-xraycancel {
	width: 16px !important; 
	height: 16px !important; 
	background-image: url(<?php echo $server_prefix_url;?>/images/tiny-x.png) !important;
	background-position: -1px center !important;
	margin: 0 8px !important;
	vertical-align: middle;
}

button.ixedit-xraycancel-pushed {
	background-position: -17px center !important;
}


.ixedit-dialog #ixedit-routebtn {
	width: 28px !important;
	height: 16px !important;
	background-image: url(<?php echo $server_prefix_url;?>/images/tiny-route.png) !important;
	background-position: -1px center !important;
	position: absolute;
	top: 50%;
	margin-top: -8px;
	margin-left: 6px;
}

.ixedit-dialog #ixedit-utility button.ixedit-pushed {
	background-position: -29px center !important;
}

/* For IE 7 to adjust background position */
.ixedit-msie-old button.ixedit-addaction, 
.ixedit-msie-old button.ixedit-addcondition,
.ixedit-msie-old button.ixedit-removeaction, 
.ixedit-msie-old button.ixedit-removecondition,
.ixedit-msie-old button.ixedit-commandhelp,
.ixedit-msie-old button.ixedit-xraybtn,
.ixedit-msie-old button.ixedit-xraycancel,
.ixedit-msie-old #ixedit-routebtn {
	background-position: -2px center !important;
}

/* For IE 7 to adjust background position */
.ixedit-msie-old button.ixedit-addaction-h,
.ixedit-msie-old button.ixedit-addcondition-h,
.ixedit-msie-old button.ixedit-removeaction-h,
.ixedit-msie-old button.ixedit-removecondition-h,
.ixedit-msie-old button.ixedit-commandhelp-h,
.ixedit-msie-old button.ixedit-xraycancel-pushed {
	background-position: -18px center !important;
}

.ixedit-msie-old button.ixedit-xraybtn-pushed,
.ixedit-msie-old #ixedit-utility button.ixedit-pushed {
	background-position: -30px center !important;

}

.ixedit-dialog div#ixedit-listheader {
	overflow: hidden !important;
	overflow-x: hidden !important;
	height: 18px;
	background-image: url(<?php echo $server_prefix_url;?>/images/bg-light-listheader.png) !important;
	background-repeat: repeat-x;
	background-position: left top;
}

.ixedit-dialog div#ixedit-listbody {
	overflow: auto !important;
	overflow-x: hidden !important;
	position: relative;
}




.ixedit-dialog table.ixedit-table {

	/*width: 100%;*/

	font-size: 12px !important;
	cursor: default !important;
	position: relative;
	empty-cells: show;
	border-right: 1px solid #333333 !important;
}

.ixedit-dialog table.ixedit-table-header {
	border-right: 1px solid #666666 !important;
}

.ixedit-dialog table.ixedit-table-body {
	border-bottom: 1px solid #3f3f3f !important;
}







.ixedit-dialog table.ixedit-table-body tr.inactive td {
	/*color: #666666 !important;*/
	opacity: 0.5;
	filter: alpha(opacity=50); /* for IE */
}

.ixedit-dialog table.ixedit-table-body tr.inactive td.ixedit-column-check {
	opacity: 1;
	filter: alpha(opacity=100); /* for IE */
}

.ixedit-dialog table.ixedit-table th, .ixedit-dialog table.ixedit-table td {
	overflow: hidden !important;
	-moz-user-select: none !important;
	-khtml-user-select: none !important;
	user-select: none !important;
	vertical-align: middle !important;
	white-space: nowrap !important;
	text-align: left !important;
	font-weight: normal !important;
	line-height: 15px !important;
	border-right: 1px solid #666666 !important;
}

.ixedit-dialog table.ixedit-table th {
	padding: 0 5px !important;
	height: 18px !important;
	line-height: 18px !important;
	font-size: 10px !important;
}
.ixedit-dialog table.ixedit-table th.selected {
	background-image: url(<?php echo $server_prefix_url;?>/images/bg-light-listheader.png) !important;
	background-repeat: repeat-x !important;
	background-position: 0 -30px !important;
}

.ixedit-dialog table.ixedit-table td {
	padding: 2px 5px !important;
}

.ixedit-dialog .ixedit-table td.ixedit-column-check {
	text-align: center !important;
}

.ixedit-dialog .ixedit-table .ixedit-column-comment {
	border-right: none !important;
}


.ixedit-dialog table.ixedit-table-body tr.selected {
	background-color: #3875d7 !important;
}

.ixedit-dialog table.ixedit-table-body tr.ui-selected td {
	background-color: red !important;
}

.ixedit-dialog table.ixedit-table-body tr.ixedit-odd {
	background-image: url(<?php echo $server_prefix_url;?>/images/bg-light-5.png) !important;
}






.ixedit-dialog-shaded {
	width: 100px !important;
	height: 30px !important;
}

.ixedit-dialog-shaded .ui-dialog-titlebar {
	-webkit-border-top-left-radius: 8px !important;
	-webkit-border-top-right-radius: 8px !important;
	-moz-border-radius-topleft: 8px !important;
	-moz-border-radius-topright: 8px !important;
	-webkit-border-bottom-left-radius: 8px !important;
	-webkit-border-bottom-right-radius: 8px !important;
	-moz-border-radius-bottomleft: 8px !important;
	-moz-border-radius-bottomright: 8px !important;
	color: #ff0000 !important;
}



/* X-Ray */

	#ixedit-xrayedbox {
		margin: 0 !important;
		padding: 0 !important;
		position: absolute !important;
		background-color: transparent !important;
		z-index: 9990 !important;
		border: 1px solid pink !important;
		background-image: url(<?php echo $server_prefix_url;?>/images/bg-red-50.png)
	}
	#ixedit-xrayselectorbox {
		width: 180px !important;
		position: absolute !important;
		z-index: 9991 !important;
		background-color: transparent;
		margin: 0 !important;
		padding: 0 !important;
		/*border: 1px solid black;*/
	}
	#ixedit-selectorcontent {
		width: 158px;
		-webkit-border-radius: 8px !important;
		-moz-border-radius: 8px !important;
		border: 1px solid #999999 !important;
		margin-left: 20px !important;
		/* background-color: #ffffcc; */
		background-image:url(<?php echo $server_prefix_url;?>/images/bg-selectorlist-y.png);
		background-position: right;
		background-repeat: repeat-y;
		padding: 5px 0;
		font-size: 12px;
		line-height: 16px;
		font-family: 'Lucida Grande', Arial, sans-serif, 'ヒラギノ角ゴ Pro W3', 'Hiragino Kaku Gothic Pro' !important;
	}
	#ixedit-selectormenu li {
		color: #000000 !important;
	}


	#ixedit-selectorarrow {
		width: 21px;
		height: 20px;
		position: absolute;
		top: 4px;
		background-image:url(<?php echo $server_prefix_url;?>/images/selectorarrow-y.png);
		background-position: left;
		margin: 0;
		padding: 0;
	}
	.ixedit-selectorarrow-right {
		background-position: right !important;
	}

	#ixedit-selectormenu {
		margin: 0 !important;
		padding: 0 !important;
		list-style-type: none
	}
	.ixedit-selectormenuitem {
		margin: 0 !important;
		padding: 0 10px !important;
		overflow: hidden;
	}
	.ixedit-selectormenuitem.selected {
		background-color: #ffcc00;
		cursor: default !important;
	}
	#ixedit-xrayguidebox {
		-webkit-border-radius: 8px !important;
		-moz-border-radius: 8px !important;
		background-image: url(<?php echo $server_prefix_url;?>/images/bg-dark-80.png) !important;
		margin: 0;
		padding: 0;
		width: 400px;
		height: 50px;
		z-index: 9000;
		font-family: 'Lucida Grande', Arial, sans-serif, 'ヒラギノ角ゴ Pro W3', 'Hiragino Kaku Gothic Pro' !important;

	}
#ixedit-xrayguidebox p {
	margin: 0;
	padding: 0;
	line-height: 50px;
	text-align: center;
	color: white;
	font-size: 12px;
}

