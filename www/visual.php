<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
php 
session_start(); 
if($_SESSION['username']) { // check that session 
if($_POST['Logout'] == 'Logout') { // check for form submit
session_destroy(); // destroy the session to logout
header('Location: login.php'); // redirect back to login page
}
} else {
echo "Access Denied";
header('Location: index.php'); // redirect back to login page
}
>

<?php
$filename = "/home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py";
$visMessage = strip_tags($_POST['message']);
$visIntro = strip_tags($_POST['intro']);
$visColour = strip_tags($_POST['colour']);
$visVisual = strip_tags($_POST['visual']);
$vis1Colour = strip_tags($_POST['1colour']);
$visAppName = strip_tags($_POST['application_name']);
#$visColour = $_POST['colour'];
$file = '/var/www/html/listclean.txt'; 
$newfile = '/home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py'; 
// Clear old file
if (!copy($file, $newfile)) { 
echo "There has been an error. List has not been cleared $file..."; 
} 
else{
echo "Successfully cleared list.";
}
// Log to file
if ($visMessage != ""){
$msg .= "#!/usr/bin/env python\n";
$msg .= "# -*- coding: utf-8 -*-\n";
$msg .= "from __future__ import unicode_literals\n";
$msg .= "text = ((\"";
$msg .= "$visIntro";
$msg .= "\", (";
$msg .= "$vis1Colour";
$msg .= ")), (\"";
$msg .= "$visMessage";
$msg .= "\", (";
$msg .= "$visColour";
$msg .= ")))";
$fp = fopen ($filename, "a");
if ($fp) {
fwrite ($fp, $msg);
fclose ($fp);
}
$old_path = getcwd();
chdir('/home/pi/rpi-rgb-led-matrix/examples-api-use/');
$output = shell_exec('sudo ./php.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
elseif{
$msg .= "text = ((\"No \", (0, 0, 0)), (\"Content\", (0, 0, 0)))";
$fp = fopen ($filename, "a");
if ($fp) {
fwrite ($fp, $msg);
fclose ($fp);
}
$old_path = getcwd();
chdir('/home/pi/rpi-rgb-led-matrix/examples-api-use/');
$output = shell_exec('sudo ./php.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
// End logging
?>


<html>
  <head>
    <title>xer0.led panel manager
    </title>
    <meta name="description" content="led panel manager for xer0.design led displays.">
    <meta name="copyright" content="Copyright © 2017 xer0.design. All Rights Reserved.">
    <meta name="author" content="Florian Stravock">
    <meta name="theme-color" content="#6e4b9e">
    <meta content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes" name="viewport">
    <link rel="stylesheet" href="css/tidy.css">
    <link rel="stylesheet" href="css/animate.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js">
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js">
    </script>
    <script src="bower_components/webcomponentsjs/webcomponents.js">
    </script>
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.css" type="text/css" rel="stylesheet" title="Featherlight Styles" />
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.js" type="text/javascript" charset="utf-8">
    </script>
    <link rel="import" href="bower_components/paper-ripple/paper-ripple.html">
    <link rel="import" href="bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="bower_components/iron-icons/iron-icons.html">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js">
    </script>
  </head>
  <body>
    <div class="container" style="width: 100%">
      <div class="cover-image">
      </div>	
      <div class="desktop-fab-container ">
        <a href="http://xer0.design/">
          <paper-fab class="wow fadeInUp desktop-fab" icon="link">
          </paper-fab>
        </a>
      </div>
      <div class="wow fadeInUp content-card">
        <a href="http://xer0.design/">
          <paper-fab class="mobile-fab" icon="link">
          </paper-fab>
        </a>
        <div class="icon-and-title-flex">
          <img src="img/ic_launcher.png" class="appicon">
          </img>
        <div class="title-container">
          <span class="text-title">xer0.led
          </span>
          <br>
          <div class="intertext-padding">
          </div>
          <span class="text-subtitle">panel manager
          </span>
          <br>
          <div class="intertext-padding">
          </div>
          <span class="text-subtitle">v1.1a
          </span>
        </div>	
      </div>
      <br>
      <br>
      <span class="text-description" style="font-size: 1.1em">Welcome to xer0.led - simply fill out the fields below to update your screen. Reloading this page, or hitting submit without entering any text will clear your screen if you would like to turn it off. To turn it on, simply enter text and hit submit.
        <form name="logout" method="post" action="visual.php">
          <button type="submit" name="Logout" value="Logout" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Logout.
          </button>
        </form>
        </div>
      <div class="wow fadeInUp content-works"> 
      </div>
      <div name="admin" class="wow fadeInUp content-card" style="margin-top: 0;">
        <span class="text-subtitle" style="font-size: 2em; font-weight: 300; color: #333">Adiminstration.
        </span>
        <br>				
        <div class="detail-item">
          <iron-icon class="details-icon" icon="info">
          </iron-icon>
          <span class="text-description" style="color: rgb(<?php echo $visColour ?>)">Message changed to "
            <?php echo $visIntro ?> 
            <?php echo $visMessage ?>".
            <span>
              </div>
            <br>
            <!-- form -->
            <form method="post" action="visual.php">
              <!-- intro -->
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="intro" class="mdl-textfield__input" type="text">
                <label class="mdl-textfield__label" for="intro">Intro Text: 
                </label>
              </div> 
              <br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1white">
                <input type="radio" id="1white" class="mdl-radio__button" name="1colour" value="128,128,128" checked>
                <span class="mdl-radio__label">White
                </span>
              </label> 
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1red">
                <input type="radio" id="1red" class="mdl-radio__button" name="1colour" value="255,0,0">
                <span class="mdl-radio__label">Red
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1orange">
                <input type="radio" id="1orange" class="mdl-radio__button" name="1colour" value="255,128,0">
                <span class="mdl-radio__label">Orange
                </span>
              </label>
              <br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1yellow">
                <input type="radio" id="1yellow" class="mdl-radio__button" name="1colour" value="255,255,0">
                <span class="mdl-radio__label">Yellow
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1green">
                <input type="radio" id="1green" class="mdl-radio__button" name="1colour" value="0,255,0">
                <span class="mdl-radio__label">Green
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1cyan">
                <input type="radio" id="1cyan" class="mdl-radio__button" name="1colour" value="0,255,255">
                <span class="mdl-radio__label">Cyan
                </span>
              </label>
              <br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1lightblue">
                <input type="radio" id="1lightblue" class="mdl-radio__button" name="1colour" value="0,128,255">
                <span class="mdl-radio__label">Blue
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1purple">
                <input type="radio" id="1purple" class="mdl-radio__button" name="1colour" value="191,0,255">
                <span class="mdl-radio__label">Purple
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1pink">
                <input type="radio" id="1pink" class="mdl-radio__button" name="1colour" value="255,0,255">
                <span class="mdl-radio__label">Light Pink
                </span>
              </label>
              <br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="1pinkred">
                <input type="radio" id="1pinkred" class="mdl-radio__button" name="1colour" value="255,0,128">
                <span class="mdl-radio__label">Hot Pink
                </span>
              </label>
              <br>  
              <!-- message -->
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="message" class="mdl-textfield__input" type="text">
                <label class="mdl-textfield__label" for="message" >Message Text:
                </label>
              </div>
              <br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="white">
                <input type="radio" id="white" class="mdl-radio__button" name="colour" value="128,128,128" checked>
                <span class="mdl-radio__label">White
                </span>
              </label>  
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="red">
                <input type="radio" id="red" class="mdl-radio__button" name="colour" value="255,0,0">
                <span class="mdl-radio__label">Red
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="orange">
                <input type="radio" id="orange" class="mdl-radio__button" name="colour" value="255,128,0">
                <span class="mdl-radio__label">Orange
                </span>
              </label>
              <br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="yellow">
                <input type="radio" id="yellow" class="mdl-radio__button" name="colour" value="255,255,0">
                <span class="mdl-radio__label">Yellow
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="green">
                <input type="radio" id="green" class="mdl-radio__button" name="colour" value="0,255,0">
                <span class="mdl-radio__label">Green
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="cyan">
                <input type="radio" id="cyan" class="mdl-radio__button" name="colour" value="0,255,255">
                <span class="mdl-radio__label">Cyan
                </span>
              </label>
              <br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="lightblue">
                <input type="radio" id="lightblue" class="mdl-radio__button" name="colour" value="0,128,255">
                <span class="mdl-radio__label">Blue
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="purple">
                <input type="radio" id="purple" class="mdl-radio__button" name="colour" value="191,0,255">
                <span class="mdl-radio__label">Purple
                </span>
              </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="pink">
                <input type="radio" id="pink" class="mdl-radio__button" name="colour" value="255,0,255">
                <span class="mdl-radio__label">Light Pink
                </span>
              </label>
              <br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="pinkred">
                <input type="radio" id="pinkred" class="mdl-radio__button" name="colour" value="255,0,128">
                <span class="mdl-radio__label">Hot Pink
                </span>
              </label>
              <br>  
              <br> 
              <br>
              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit" >
                Submit
              </button>
            </form>
            <div>
              <br>
              <br>
              <br> Current string:
              <br>
<?php
$file = "/home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py";
$f = fopen($file, "r");
while ( $line = fgets($f, 1000) ) {
print $line;
}
?>
<br><br>
              <span class="mdl-chip">
                <span class="mdl-chip__text">
                  <?php
$file = "/home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py";
$f = fopen($file, "r");
while ( $line = fgets($f, 1000) ) {
print $line;
}
?>
                </span>
              </span>
            </div>
            <!--- reload screen  -->
            <?php

?>
            <!--- reloaded. -->
            </div>
          <div class="empty-space">
            <div class="meta-container wow fadeInUp">
              <div class="wow fadeInUp detail-item watermark credits">
                <span class="text-description credits-text" style="color: #ffffff">powered by 
                  <a href="http://xer0.design" style="color: #cccccc; font-weight: 700">xer0.design
                  </a>
                </span>
              </div>
            </div>	
          </div>
          <!-- ===================================================================================================== -->
          <!-- JAVASCRIPT -->
          <!-- Animations -->
          <script src="js/wow.min.js">
          </script>
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
                  scrollTo : {
                    y: finalScroll, autoKill:true }
                  , ease: Power1.easeOut, overwrite: 5	 
                }
                           );
              }
                        );
            }
             );
          </script>
          </body>
        </html>	
