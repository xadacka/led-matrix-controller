<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 

// image upload code, ignore
$target_dir = "/home/pi/led-matrix-controller/www/external/upload/";
$target_file = $target_dir . "file.jpg";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// end ignore



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

include("external/externalcode.php"); // this is for loading external code, see readme.md for more information

//these flags are for the footer, the emoji will show if there's been no action on that variable.
$textclear ="❕"; 
$textreplace ="❕"; 
$externalclear ="❕"; 
$externalreplace ="❕"; 


$visInternalCheck = isset($_POST['updateint']); //check to see if the update screen checkbox is ticked
$visImgFS = isset($_POST['imgfs']); //check to see if the image fs checkbox is ticked
$visImgFSTick = isset($_POST['imgfstick']); //check to see if the image fs checkbox is ticked
$filename = "/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/scrolltext.py";
$visMessage = strip_tags($_POST['message']);  
$visImgClear = strip_tags($_POST['imgclear']); // ticker image, ignore
$visIntro = strip_tags($_POST['intro']);
$visColour = strip_tags($_POST['colour']);
$vis1Colour = strip_tags($_POST['1colour']);
$visAnimation = strip_tags($_POST['animation']);
//$visImage = strip_tags($_POST['image']); // ignore, image for tv ticker
$visImage = "upload/file.jpg";
$visClear = strip_tags($_POST['clear']);
$file = '/var/www/html/listclean.txt'; 
$newfile = '/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/scrolltext.py'; 

include("external/externalstocks.php"); // this is for loading external code, see readme.md for more information

// image files for tv, also ignore
$image = '/home/pi/led-matrix-controller/www/external/image.txt'; 
$imgfile = '/var/www/html/listclean.txt'; 
$newimgfile = '/home/pi/led-matrix-controller/www/external/image.txt'; 

// clock code
if ($visAnimation == "clock"){
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/');
$output = shell_exec('sudo ./time.sh > /dev/null 2>/dev/null &');
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
    
$ext .= "$visIntro $visMessage"; // ignore or delete, for internal use.


//clear the old ticker file
if (!copy($file, $newfile)) { 
$textclear ="❌"; 
} 
else{
$textclear ="✅";
}
// clear the old external file (ignore)
if (!copy($fileext, $newfileext)) { 
$externalclear ="❌";
} 
else{
$externalclear ="✅";
}
//write the new ticker file
$fp = fopen ($filename, "a");
if ($fp) {
fwrite ($fp, $msg);
fclose ($fp);
$textreplace ="✅";
}
// write the new external file (igonore)
$fq = fopen ($external, "a");
if ($fq) {
fwrite ($fq, $ext);
fclose ($fq);
$externalreplace ="✅";
}
//end ignore
}


// ticker image remover 
if ($visImgClear != ""){
$output = shell_exec('rm /home/pi/led-matrix-controller/www/external/upload/file.jpg');
$output = shell_exec('cp /home/pi/led-matrix-controller/www/external/upload/blank.jpg /home/pi/led-matrix-controller/www/external/upload/file.jpg');
$output = shell_exec('/home/pi/led-matrix-controller/www/external/scripts/config/ticker.sh');
}

if ($visImgFS == "1"){
$output = shell_exec('/home/pi/led-matrix-controller/www/external/scripts/config/image.sh > /dev/null 2>/dev/null &');
}

if ($visImgFSTick == "1"){
$output = shell_exec('/home/pi/led-matrix-controller/www/external/scripts/config/imagetick.sh > /dev/null 2>/dev/null &');
}


// ignore or delete, for internal use.
if ($visExternalCheck == "1"){
$output = shell_exec('/home/pi/led-matrix-controller/www/external/scripts/config/ticker.sh > /dev/null 2>/dev/null &');
}
//end ignore
//you need this one
if ($visInternalCheck == "1"){
$output = shell_exec('sudo /home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/php.sh > /dev/null 2>/dev/null &');
}
//when user clicks clear button
if ($visClear == "clear"){
$msg .= "text = ((\"No \", (0, 0, 0)), (\"Content\", (0, 0, 0)))"; //set led ticker to empty black message
$fp = fopen ($filename, "a");
if ($fp) {
fwrite ($fp, $msg);
fclose ($fp);
}
//reload panel(s)
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/');
$output = shell_exec('sudo ./php.sh > /dev/null 2>/dev/null &');
chdir('/home/pi/led-matrix-controller/www/external/scripts/config/');
$output = shell_exec('./clear.sh > /dev/null 2>/dev/null &');
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

if ($visAnimation == "gpints"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./guinnesspints.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}

if ($visAnimation == "birthday"){
$output = shell_exec('sudo killall -9 demo');
$old_path = getcwd();
chdir('/home/pi/led-matrix-controller/scripts/');
$output = shell_exec('sudo ./birthday.sh > /dev/null 2>/dev/null &');
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
 
                        <?php include("external/externalsimple.php"); //ignore this ?>
 
                        <div class="empty-space">
                            <div class="meta-container wow fadeInUp">
                                <div class="wow fadeInUp detail-item watermark credits">
                                    <span class="text-description credits-text" style="color: #ffffff">powered by 
                  <a href="http://xer0.design" style="color: #cccccc; font-weight: 700">xer0.design
                  </a>   -   licenced under GPL 3.0  -   <a href="https://github.com/xer0design/led-matrix-controller" style="color: #cccccc; font-weight: 700">source</a>
                </span> <!-- removing this footer is a violation of the GPL. -->
                                </div>
                                <div class="wow fadeInUp detail-item watermark credits">
                                    <span class="text-description credits-text" style="color: #ffffff">Status of last action: <?php echo "Text Clear: $textclear - External Clear: $externalclear - Text Replace: $textreplace - External Replace: $externalreplace. - Bubble Clear: $bubbleclear - Bubble Replace: $bubblereplace";?>
                </span> 
                                </div>
                                <div class="wow fadeInUp detail-item watermark credits">
                                    <span class="text-description credits-text" style="color: #ffffff">✅ = Successful. ❕ = Not Requested. ❌ = Failed.
                </span> 
                                </div>
                            </div>
                        </div>
                        <!-- JAVASCRIPT -->
                        <!-- Animations -->
                        <script src="js/wow.min.js">
                        </script>
                        <script>
                            new WOW().init();
                        </script>
                        <!-- Scrollwheel Smoothing -->
                        <script>
                            $(function() {
                                var $window = $(window);
                                var scrollTime = 0.2;
                                var scrollDistance = 270;
                                $window.on("mousewheel DOMMouseScroll", function(event) {
                                    event.preventDefault();
                                    var delta = event.originalEvent.wheelDelta / 120 || -event.originalEvent.detail / 3;
                                    var scrollTop = $window.scrollTop();
                                    var finalScroll = scrollTop - parseInt(delta * scrollDistance);
                                    TweenMax.to($window, scrollTime, {
                                        scrollTo: {
                                            y: finalScroll,
                                            autoKill: true
                                        },
                                        ease: Power1.easeOut,
                                        overwrite: 5
                                    });
                                });
                            });
                        </script>
        </body>

        </html>
