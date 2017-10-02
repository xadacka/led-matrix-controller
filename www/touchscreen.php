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
            <title>xer0-led touchscreen display</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <style>
                table {
                      pointer-events: initial;
                }

            </style>

        </head>

        <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
            <!-- Save for Web Slices (ledmatrix screen site) -->



            <table id="Table_01" width="800" height="480" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="9">
                        <img src="images/touchscreen_01.jpg" width="800" height="31" alt=""></td>
                </tr>
                <tr>
                    <td rowspan="8">
                        <img src="images/touchscreen_02.jpg" width="10" height="449" alt=""></td>

                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="clock" name="animation" />
                        <td>
                            <input type="image" src="images/time.jpg" alt="Time" />
                        </td>
                    </form>

                    <td rowspan="8">

                        <img src="images/touchscreen_04.jpg" width="20" height="449" alt=""></td>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="blogo" name="animation" />
                        <td>
                            <input type="image" src="images/logo.jpg" alt="Logo" />
                        </td>
                    </form>
                    <td rowspan="8">
                        <img src="images/touchscreen_06.jpg" width="20" height="449" alt=""></td>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="liverpool" name="animation" />
                        <td>
                            <input type="image" src="images/liverpool.jpg" alt="Liverpool" />
                        </td>
                    </form>
                    <td rowspan="8">
                        <img src="images/touchscreen_08.jpg" width="20" height="449" alt=""></td>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="gpints" name="animation" />
                        <td>
                            <input type="image" src="images/guinness.jpg" alt="Guinness Pints" />
                        </td>
                    </form>
                    <td rowspan="8">
                        <img src="images/touchscreen_10.jpg" width="10" height="449" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <img src="images/touchscreen_11.jpg" width="180" height="16" alt=""></td>
                    <td>
                        <img src="images/touchscreen_12.jpg" width="180" height="16" alt=""></td>
                    <td>
                        <img src="images/touchscreen_13.jpg" width="180" height="16" alt=""></td>
                    <td>
                        <img src="images/touchscreen_14.jpg" width="180" height="16" alt=""></td>
                </tr>
                <tr>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="fingers" name="animation" />
                        <td>
                            <input type="image" src="images/fingers.jpg" alt="Middle Fingers" />
                        </td>
                    </form>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="eggplants" name="animation" />
                        <td>
                            <input type="image" src="images/eggplants.jpg" alt="Egg Plants" />
                        </td>
                    </form>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="birthday" name="animation" />
                        <td>
                            <input type="image" src="images/birthday.jpg" alt="Happy Birthday" />
                        </td>
                    </form>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="tuamstars" name="animation" />
                        <td>
                            <input type="image" src="images/tuamstars.jpg" alt="Tuam Stars" />
                        </td>
                    </form>
                </tr>
                <tr>
                    <td>
                        <img src="images/touchscreen_19.jpg" width="180" height="17" alt=""></td>
                    <td>
                        <img src="images/touchscreen_20.jpg" width="180" height="17" alt=""></td>
                    <td>
                        <img src="images/touchscreen_21.jpg" width="180" height="17" alt=""></td>

                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="carlsberg" name="animation" />
                        <td rowspan="3">
                            <input type="image" src="images/carlsberg.jpg" alt="Carlsberg" />
                        </td>
                    </form>
                </tr>
                <tr>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="gins" name="animation" />
                        <td>
                            <input type="image" src="images/wantagin.jpg" alt="Want A Gin>" />
                        </td>
                    </form>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="heineken" name="animation" />
                        <td>
                            <input type="image" src="images/heineken.jpg" alt="Heineken" />
                        </td>
                    </form>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="guinness" name="animation" />
                        <td>
                            <input type="image" src="images/guinness-25.jpg" alt="Guinness" />
                        </td>
                    </form>
                </tr>
                <tr>
                    <td>
                        <img src="images/touchscreen_26.jpg" width="180" height="14" alt=""></td>
                    <td>
                        <img src="images/touchscreen_27.jpg" width="180" height="14" alt=""></td>
                    <td>
                        <img src="images/touchscreen_28.jpg" width="180" height="14" alt=""></td>
                </tr>
                <tr>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="budweiser" name="animation" />
                        <td>
                            <input type="image" src="images/budweiser.jpg" alt="Budweiser" />
                        </td>
                    </form>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="hophouse" name="animation" />
                        <td>
                            <input type="image" src="images/hophouse.jpg" alt="Hop House 13" />
                        </td>
                    </form>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="lastdrinks" name="animation" />
                        <td>
                            <input type="image" src="images/lastdrinks.jpg" alt="Last Drinks" />
                        </td>
                    </form>
                    <form method="post" action="touchscreen.php">
                        <input type="hidden" value="clear" name="clear" />
                        <td>
                            <input type="image" src="images/disable.jpg" alt="Tuam Stars" />
                        </td>
                    </form>
                </tr>
                <tr>
                    <td>
                        <img src="images/touchscreen_33.jpg" width="180" height="55" alt=""></td>
                    <td>
                        <img src="images/touchscreen_34.jpg" width="180" height="55" alt="Previous Page"></td>
                    <td>
                        <img src="images/touchscreen_35.jpg" width="180" height="55" alt="Next Page"></td>
                    <td>
                        <img src="images/touchscreen_36.jpg" width="180" height="55" alt=""></td>
                </tr>
            </table>
            <!-- End Save for Web Slices -->


        </body>

        </html>
