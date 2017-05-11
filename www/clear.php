<?php 
$file = '/var/www/html/listclean.txt'; 
$newfile = '/home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py'; 
?>

</b></li></ul>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />

<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title>xer0.tv admin</title>
</head>


<body>

<div id="topbar">
	
<div id="title">
		xer0.led admin</div>
</div>

<div id="content">
<ul class="pageitem"> <li class="textbox"><?php
if (!copy($file, $newfile)) { 
echo "There has been an error. List has not been cleared $file..."; 
} 
else{
echo "Successfully cleared list.";
}?></li></ul>

	<form method="post" action="sender.php"l>
		<fieldset><span class="graytitle">Add New Message</span>
		<ul class="pageitem">
			<li class="bigfield"><input name ="message" placeholder="Your Message Here" type="text" /></li>


<input name ="application_name" value="xer0.tv 0.3a" type="hidden"</li> 
		</ul>
         <input type="hidden" name="external" value="YES" /> 
			<li class="button">
			<input name="Send message!" type="submit" value="Submit input" /></li>
		</ul>
        
		
		</fieldset></form>
        
        

<span class="graytitle">Current Messages:</span>
<ul class="pageitem">
	<li class="textbox"><ul><?php
$file = "list.txt";
$f = fopen($file, "r");
while ( $line = fgets($f, 1000) ) {
print $line;
}
?></ul></li></ul>

<span class="graytitle">Extra Options:</span>
<ul class="pageitem"> 
	<li class="textbox"><b><a href="clear.php">Clear Message List.</a> </b></li></ul>
    

        
        
</div>
<div id="footer">
	xer0.led 0.4a - copyright 2017 <a href="http://xer0.design/">xer0.design</a><</div>
</body>
