<html>
	<head>
		<!-- CHANGE TITLE AND META ACCORDINGLY -->
		<title>xer0.led panel manager</title>
		<meta name="description" content="led panel manager for xer0.design led displays.">
		<meta name="copyright" content="Copyright © 2017 xer0.design. All Rights Reserved.">
		<meta name="author" content="Florian Stravock">
		<meta name="theme-color" content="#6e4b9e">
		<meta content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes" name="viewport">
		<link rel="stylesheet" href="css/tidy.css">
		<link rel="stylesheet" href="css/animate.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
		<script src="bower_components/webcomponentsjs/webcomponents.js"></script>
        <link href="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.css" type="text/css" rel="stylesheet" title="Featherlight Styles" />
        <script src="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="import" href="bower_components/paper-ripple/paper-ripple.html">
		<link rel="import" href="bower_components/paper-fab/paper-fab.html">
		<link rel="import" href="bower_components/iron-icons/iron-icons.html">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	</head>
	<body>
	
		<div class="container" style="width: 100%">
			<!-- COVER IMAGE AND FLOATING BUTTON -->
			<div class="cover-image"></div>	
			<div class="desktop-fab-container ">
				<!-- REPLACE WITH YOUR APP URL -->
     			<a href="http://xer0.design/">
     				<paper-fab class="wow fadeInUp desktop-fab" icon="link"></paper-fab>
     			</a>
			</div>
			
			<!-- ICON, NAME AND DESCRIPTION -->
			<div class="wow fadeInUp content-card">
				<!-- REPLACE WITH YOUR APP URL -->
				<a href="http://xer0.design/">
					<paper-fab class="mobile-fab" icon="link"></paper-fab>
				</a>
				
				<div class="icon-and-title-flex">
					<img src="img/ic_launcher.png" class="appicon"></img>
					<div class="title-container">
						<!-- REPLACE WITH YOUR APP NAME -->
						<span class="text-title">xer0.led panel manager</span>
						<br><div class="intertext-padding"></div>
						<!-- REPLACE WITH YOUR DEV NAME -->
						<span class="text-subtitle">by xer0.design</span>
						<br><div class="intertext-padding"></div>
						<!-- REPLACE WITH YOUR APP PRICE -->
						<span class="text-subtitle">v1.0a</span>
					</div>	
				</div><br><br>
				<!-- REPLACE WITH YOUR APP DESCRIPTION -->
				<span class="text-description" style="font-size: 1.1em">Fill out the fields below. Currently, this verison reloads the panel text every minute, on the minute. Future revisions will live update.		
			</div>
			
			
			<div class="wow fadeInUp content-works"> 
			    
     	    </div>
		
		
		<!-- APP DETAILS -->
		<div class="wow fadeInUp content-card" style="margin-top: 0;">
     		<span class="text-subtitle" style="font-size: 2em; font-weight: 300; color: #333">Content.</span>
			<br><br>
			<!-- EXTRA -->
			
<!-- Textfield with Floating Label -->
<form method="post" action="sender.php">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="message">
    <label class="mdl-textfield__label" for="sample3">Message for screen...</label>
  </div><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="colour">
    <label class="mdl-textfield__label" for="sample3">Colour in format r, g, b</label>
  </div><br>
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit" >
  Submit.
</button>
</form>

<div>
<!-- Basic Chip -->
<span class="mdl-chip">
    <span class="mdl-chip__text"><?php
$file = "/home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py";
$f = fopen($file, "r");
while ( $line = fgets($f, 1000) ) {
print $line;
}
?></span>
</span>
</div>


			
			<!-- ORIGINAL DOWN -->
			

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
		<!-- END EXTRA -->
			<div>
				<!-- REPLACE WITH YOUR APP DETAILS ACCORDINGLY -->
				<div class="detail-item">
					<iron-icon class="details-icon" icon="info"></iron-icon>
					<span class="text-description">Version 1.0a<span>
				</div>
				<div class="detail-item">
					<iron-icon class="details-icon" icon="mail"></iron-icon>
					<span class="text-description">support.led@xer0.design</span>
				</div>
			</div>	
     	</div>
		
		<!-- SPACE BELOW DETAILS -->	
		<div class="empty-space">
			<div class="meta-container wow fadeInUp">
				<div class="wow fadeInUp detail-item watermark credits">
						<span class="text-description credits-text" style="color: #ffffff">powered by <a href="http://xer0.design" style="color: #cccccc; font-weight: 700">xer0.design</a></span>
				</div>
			</div>	
		</div>
			
			
			
			
			
		<!-- ===================================================================================================== -->
			
		<!-- JAVASCRIPT -->
		
		<!-- Animations -->
		<script src="js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
		
		<!-- Scrollwheel Smoothing -->
		<script>
			$(function()
			{	
				var $window = $(window);
				var scrollTime = 0.2;
				var scrollDistance = 270;
				$window.on("mousewheel DOMMouseScroll", function(event)
				{
	
					event.preventDefault();	
					var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
					var scrollTop = $window.scrollTop();
					var finalScroll = scrollTop - parseInt(delta*scrollDistance);
					TweenMax.to($window, scrollTime, 
					{
						scrollTo : { y: finalScroll, autoKill:true }, ease: Power1.easeOut, overwrite: 5	 
						
					});
				});
			});
		</script>
	</body>
</html>	
