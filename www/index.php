
<html>
	<head>
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
			<div class="cover-image"></div>	
			<div class="desktop-fab-container ">
     			<a href="http://xer0.design/">
     				<paper-fab class="wow fadeInUp desktop-fab" icon="link"></paper-fab>
     			</a>
			</div>
			
			<div class="wow fadeInUp content-card">
				<a href="http://xer0.design/">
					<paper-fab class="mobile-fab" icon="link"></paper-fab>
				</a>
				
				<div class="icon-and-title-flex">
					<img src="img/ic_launcher.png" class="appicon"></img>
					<div class="title-container">
						<span class="text-title">xer0.led panel manager</span>
						<br><div class="intertext-padding"></div>
						<span class="text-subtitle">by xer0.design</span>
						<br><div class="intertext-padding"></div>
						<span class="text-subtitle">v1.6</span>
					</div>	
				</div><br><br>
				<span class="text-description" style="font-size: 1.1em">Welcome to the control panel for xer0.led screens.<br>If this is your first time setting up your screen, please see readme.md for more information.<br><br>If you are on this page because you saw the address on the screen, please kindly inform managment that the screen has been reset, they'll take it from there.<br><br>If you would like to buy a xer0.led setup similar to this, please contact <a href="mailto:led@xer0.design">led@xer0.design</a>		
			</div>
			
			
			<div class="wow fadeInUp content-works"> 
			    
     	    </div>
		
		
		<div class="wow fadeInUp content-card" style="margin-top: 0;">
     		<span class="text-subtitle" style="font-size: 2em; font-weight: 300; color: #333">Administration.</span>
			<br><br>
			<div>
				<div class="detail-item">
					<iron-icon class="details-icon" icon="info"></iron-icon>
					<span class="text-description">Please login to continue.<span>
				</div><br><br>
				

	<form name="loginform" method="post" action="login.php">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input type="hidden" name="user" value="xer0" />
			<input type="text" name="pass" class="mdl-textfield__input" >
			<label class="mdl-textfield__label" for="pass">Password</label>
		</div>  
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit" name="Submit" value="Submit" >
  Submit
</button>
</form>

			</div>	
     	</div>
		

		
		
		<div class="empty-space">
			<div class="meta-container wow fadeInUp">
				<div class="wow fadeInUp detail-item watermark credits">
						<span class="text-description credits-text" style="color: #ffffff">powered by <a href="http://xer0.design" style="color: #cccccc; font-weight: 700">xer0.design</a></span><!-- removing this footer is a violation of the GPL. -->
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
