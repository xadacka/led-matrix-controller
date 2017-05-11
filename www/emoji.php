<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
$visEmoji = strip_tags($_POST['message']);
$visColour = strip_tags($_POST['colour']);
//msg
if ($visColour == ""){
$old_path = getcwd();
chdir('/home/pi/rpi-rgb-led-matrix/examples-api-use/');
$output = shell_exec('sudo ./php.sh > /dev/null 2>/dev/null &');
$nothing = "123";
}
if ($visColour == "finger"){
$old_path = getcwd();
chdir('/home/pi/rpi-rgb-led-matrix/examples-api-use/');
$output = shell_exec('sudo ./finger.sh > /dev/null 2>/dev/null &');
chdir($old_path);
}
if ($visColour == "sword"){
$old_path = getcwd();
chdir('/home/pi/rpi-rgb-led-matrix/examples-api-use/');
$output = shell_exec('sudo ./sword.sh > /dev/null 2>/dev/null &');
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
          <span class="text-subtitle">v1.1a
          </span>
        </div>	
      </div>
      <br>
      <br>
      <span class="text-description" style="font-size: 1.1em">Welcome to xer0.led - simply fill out the fields below to update your screen. Reloading this page, or hitting submit without entering any text will clear your screen if you would like to turn it off. To turn it on, simply enter text and hit submit.
        <form name="logout" method="post" action="sender.php">
          <button type="submit" name="Logout" value="Logout" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Logout.
          </button>
        </form>
        </div>
      <div class="wow fadeInUp content-works"> 
      </div>
      <div name="admin" class="wow fadeInUp content-card" style="margin-top: 0;">
        <span class="text-subtitle" style="font-size: 2em; font-weight: 300; color: #333">Animation Options.
        </span>
        <br>				
        <div class="detail-item">
          <iron-icon class="details-icon" icon="info">
          </iron-icon>
          <span class="text-description">Message changed to "<?php echo $visColour ?>".
            <span>
              </div>
            <br>
            <!-- form -->
            <form method="post" action="emoji.php">
              <!-- message 
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="message" class="mdl-textfield__input" type="text">
                <label class="mdl-textfield__label" for="message" >Emoji:
                </label>
              </div>
              <br>-->
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="colour">
                <input type="radio" id="colour" class="mdl-radio__button" name="colour" value="sword" checked>
                <span class="mdl-radio__label">Sword
                </span>
              </label><br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="red">
                <input type="radio" id="red" class="mdl-radio__button" name="colour" value="finger">
                <span class="mdl-radio__label">Middle Finger
                </span>
              </label><br>
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
<br><br>
              <span class="mdl-chip">
                <span class="mdl-chip__text">
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
