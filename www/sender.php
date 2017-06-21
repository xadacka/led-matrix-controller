<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<?php 
#by default, sender.php can be loaded without password. uncomment this section and the page will not load without correct password

#session_start(); 
#if($_SESSION['username']) { // check that session 
#if($_POST['Logout'] == 'Logout') { // check for form submit
#session_destroy(); // destroy the session to logout
#header('Location: login.php'); // redirect back to login page
#}
#} else {
#echo "Access Denied";
#header('Location: index.php'); // redirect back to login page
#}
?>

<?php


//ignore this section.
$eXternal = strip_tags($_POST['eXternal']);
if ($eXternal == "tl"){
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/www/external/');
$output = shell_exec('./tl.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
if ($eXternal == "tr"){
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/www/external/');
$output = shell_exec('./tr.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
if ($eXternal == "bl"){
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/www/external/');
$output = shell_exec('./bl.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
if ($eXternal == "br"){
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/www/external/');
$output = shell_exec('./br.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
if ($eXternal == "uncle"){
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/www/external/');
$output = shell_exec('./uncle.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
if ($eXternal == "clear"){
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/www/external/');
$output = shell_exec('./empty.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
//end ignore section

$filename = "/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/scrolltext.py";
$external = "/home/pi/led-matrix-controller/www/external/ticker.txt";
$visMessage = strip_tags($_POST['message']);
$visIntro = strip_tags($_POST['intro']);
$visColour = strip_tags($_POST['colour']);
$vis1Colour = strip_tags($_POST['1colour']);
$visAnimation = strip_tags($_POST['animation']);
$visClear = strip_tags($_POST['clear']);
$file = '/var/www/html/listclean.txt'; 
$newfile = '/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/scrolltext.py'; 
$fileext = '/home/pi/led-matrix-controller/www/external/clear.txt'; 
$newfileext = '/home/pi/led-matrix-controller/www/external/ticker.txt'; 
// Clear old file
if (!copy($file, $newfile)) { 
echo "There has been an error. Screen has not been cleared $file..."; 
} 
else{
echo "Successfully cleared screen.";
}
// Clear old external file
if (!copy($fileext, $newfileext)) { 
echo "There has been an error. Screen has not been cleared $file..."; 
} 
else{
echo "Successfully cleared screen.";
}
// Capture and send to screen.
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
$ext .= "$visIntro $visMessage"; //internal use
//write the file
$fp = fopen ($filename, "a");
if ($fp) {
fwrite ($fp, $msg);
fclose ($fp);
}
//this second section is for internal use, ignore or delete it if you want.
$fq = fopen ($external, "a");
if ($fq) {
fwrite ($fq, $ext);
fclose ($fq);
}
//reload
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/');
$output = shell_exec('sudo ./php.sh > /dev/null 2>/dev/null &');
chdir('/home/pi/led-matrix-controller/www/external');
$output = shell_exec('sudo ./external.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
if ($visClear == "clear"){
$msg .= "text = ((\"No \", (0, 0, 0)), (\"Content\", (0, 0, 0)))";
$fp = fopen ($filename, "a");
if ($fp) {
fwrite ($fp, $msg);
fclose ($fp);
}
//reload
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/');
$output = shell_exec('sudo ./php.sh > /dev/null 2>/dev/null &');
chdir('/home/pi/led-matrix-controller/www/external');
$output = shell_exec('./empty.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
// End Capture
?>
<?php
// Start Animation
if ($visAnimation == ""){
//do nothing
}

// details on how the code works
if ($visAnimation == "fingers"){ // what string the form is sending
$output = shell_exec('sudo killall -9 demo'); // kill the current text, if it's on
$old_path = getcwd(); // save the current directory
chdir('/home/pi/led-matrix-controller/scripts/'); // change to animation script directory 
$output = shell_exec('sudo ./finger.sh > /dev/null 2>/dev/null &'); //execute the animation script. you'll need a new script for every animation
chdir($old_path); // return to the original directory 
}

if ($visAnimation == "gpints"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./guinnesspints.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "tuamstars"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./tuamstars.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "gins"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./gins.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "checkin"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./checkin.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "eggplants"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./eggplant.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "smiles"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./smiles.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "heiniken"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./heineken.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "guinness"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./guinness.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "blogo"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./blogo.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "hophouse"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./hophouse.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "carlsberg"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./carlsberg.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "teams"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./teams.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "budweiser"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./budweiser.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "liverpool"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./liverpool.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "lastdrinks"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./lastdrinks.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
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
          <span class="text-subtitle">v1.4
          </span>
        </div>	
      </div>
      <br>
      <br>
      <span class="text-description" style="font-size: 1.1em">Welcome to xer0.led version 1.3b<br><br>To enter text, use the first section. Please note that if using only one colour, ONLY type on the message box, not the intro box. An empty message box will result in no message.<br><br>To use a premade animation, just select one and hit submit. We'll be adding more animations soon.<br><br>To turn off the screen, scroll to the very bottom and hit disable.
        <form name="logout" method="post" action="sender.php">
          <button type="submit" name="Logout" value="Logout" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Logout.
          </button>
        </form>
        </div>
      <div class="wow fadeInUp content-works"> 
      </div>
      <div name="admin" class="wow fadeInUp content-card" style="margin-top: 0;">
        <span class="text-subtitle" style="font-size: 2em; font-weight: 300; color: #333">Text Modification.
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
            <form method="post" action="sender.php">
              <!-- intro -->
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="intro" class="mdl-textfield__input" type="text">
                <label class="mdl-textfield__label" for="intro">(OPTIOMAL)Intro Text: 
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
                <label class="mdl-textfield__label" for="message" >(MANDATORY)Message Text:
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
              <span class="mdl-chip">
                <span class="mdl-chip__text">
                  <?php
$file = "/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/scrolltext.py"; // read the current text file
$f = fopen($file, "r");
while ( $line = fgets($f, 1000) ) {
print $line;
}
?>
                </span>
              </span>
            </div>
            </div>
      <div class="wow fadeInUp content-works"> 
      </div>
      <div name="admin" class="wow fadeInUp content-card" style="margin-top: 0;">
        <span class="text-subtitle" style="font-size: 2em; font-weight: 300; color: #333">Animation Loader.
        </span>
        <br>				
        <div class="detail-item">
          <iron-icon class="details-icon" icon="info">
          </iron-icon>
          <span>Animaton changed to: "
            <?php echo $visAnimation ?>.
            <span>
              </div>
            <br>
            <!-- form -->
            <form method="post" action="sender.php">
              <!-- intro -->                
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="blogo">
                <input type="radio" id="blogo" class="mdl-radio__button" name="animation" value="blogo" checked>
                <span class="mdl-radio__label">Brogue Logo
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="checkin">
                <input type="radio" id="checkin" class="mdl-radio__button" name="animation" value="checkin">
                <span class="mdl-radio__label">Brogue - Check In On Facebook
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="liverpool">
                <input type="radio" id="liverpool" class="mdl-radio__button" name="animation" value="liverpool">
                <span class="mdl-radio__label">Liverpool
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="gpints">
                <input type="radio" id="gpints" class="mdl-radio__button" name="animation" value="gpints">
                <span class="mdl-radio__label">Guinness Pint Glasses
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="fingers">
                <input type="radio" id="fingers" class="mdl-radio__button" name="animation" value="fingers">
                <span class="mdl-radio__label">Middle Fingers
                </span>
              </label><br><label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="eggplants">
                <input type="radio" id="eggplants" class="mdl-radio__button" name="animation" value="eggplants">
                <span class="mdl-radio__label">Eggplants
                </span>
              </label><br><label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="tuamstars">
                <input type="radio" id="tuamstars" class="mdl-radio__button" name="animation" value="tuamstars">
                <span class="mdl-radio__label">Tuam Stars - Come on the stars!
                </span>
              </label><br>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="gins">
                <input type="radio" id="gins" class="mdl-radio__button" name="animation" value="gins">
                <span class="mdl-radio__label">Want a gin? (logos)
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="heineken">
                <input type="radio" id="heineken" class="mdl-radio__button" name="animation" value="heiniken">
                <span class="mdl-radio__label">Heineken
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="guinness">
                <input type="radio" id="guinness" class="mdl-radio__button" name="animation" value="guinness">
                <span class="mdl-radio__label">Guinness
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="carlsberg">
                <input type="radio" id="carlsberg" class="mdl-radio__button" name="animation" value="carlsberg">
                <span class="mdl-radio__label">Carlsberg
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="budweiser">
                <input type="radio" id="budweiser" class="mdl-radio__button" name="animation" value="budweiser">
                <span class="mdl-radio__label">Budweiser
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="hophouse">
                <input type="radio" id="hophouse" class="mdl-radio__button" name="animation" value="hophouse">
                <span class="mdl-radio__label">Hophouse
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="teams">
                <input type="radio" id="teams" class="mdl-radio__button" name="animation" value="teams">
                <span class="mdl-radio__label">Premier League Teams
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="lastdrinks">
                <input type="radio" id="lastdrinks" class="mdl-radio__button" name="animation" value="lastdrinks">
                <span class="mdl-radio__label">Last Drinks
                </span>
              </label><br>
              <br>  
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
              
                </span>
              </span>
            </div>
            </div>
                  <div class="wow fadeInUp content-works"> 
      </div>
            <?php include("external/external.php"); //ignore this ?>
      <div name="admin" class="wow fadeInUp content-card" style="margin-top: 0;">
        <span class="text-subtitle" style="font-size: 2em; font-weight: 300; color: #333">Screen Clear.
        </span>
        <br>				
        <div class="detail-item">
          <iron-icon class="details-icon" icon="info">
          </iron-icon>
          <span>Press the button below if you want to turn off the screen.
            <span>
              </div>
            <br>
            <!-- form -->
            <form method="post" action="sender.php">
              <!-- clear -->
                <input type="hidden" value="clear" name="clear" />
              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit" >
                Disable
              </button>
            </form>
            <div>
              <br>
              <br>
              
                </span>
              </span>
            </div>
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
