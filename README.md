Note: This is still beta and will be changing and needs to be tidied up a bit but it all works pretty well, just install it and control it from the web interface.

led-matrix-controller
=====================
Web based controller for led panels. This code is designed for Raspberry Pi using HUB75 led panels. You can buy the panels cheap from China, or get them off eBay or adafruit or a multitude of other places.

Clone the repository into your home folder (/home/pi - you'll have to edit setup.sh if using another directory) and then you can cd in and run setup.sh. The setup script will install apache2 and move the required files into the web directory and change a few permissions for apache. The only way this can work is by letting www-data (apache, php) access the GPIO pins. By default, they require sudo - the setup script allows www-data to access them. This is a minor security issue but shouldn't be too bad.

Notes before starting
---------------------
Currently, the code is designed for 4 32x16 panels in series from chain 1 - will soon be adding an option on the web interface for changing how many panels you have and how they're chained. You can manually change this now to add/remove panels by changing the flags in the bash scripts but this will be horribly time consuming for you. Best just wait it out.

You should probably wire the panels before running the scripts as once it's installed, it'll show you the pi's IP on the screen but you can leave that until after if you like. Wiring diagram is [here](./wiring.md)

Automated Setup
---------------
We strongly recommend running raspbian-lite as opposed to the full version, you can download the image [here](https://www.raspberrypi.org/downloads/raspbian/)

To use this code, simply run the command below. You'll be asked if you'd like to upgrade all packages on the system, you probably won't need to, especially if running a freshly downloaded image, but it's never really a bad idea to be up to date.

The setup script will clone into /home/pi - as of now it'll only work in this folder.

Of course, piping unknown scripts into bash isn't generally good security policy but if you've any doubts just take a look at the install script yourself and you'll see all is in order.

```
curl -sSL https://raw.githubusercontent.com/xer0design/led-matrix-controller/master/setup.sh | bash
```


This will automate everything and will reboot after, once the reboot is finished you should see your Pi's IP address scrolling across the screen and from there, you can type it into your browser and start using your panel.

The default password for the web interface is "password". Because of course it is. 

Manual Setup
------------
We wouldn't recommend it. But we will add instructions soon. If you want, just open [setup.sh](./setup.sh) to see what's happening, it's all commented out.

Basic configuration
===================

Password Management
-------------------
As default, the password protected access is both not fully enabled, and set to the default password "password". You should fix both of these things in a live environment. If go just type [/sender.php](/www/sender.php) after the pi's ip address, you'll have full control without the need to login. This is useful on closed networks and when testing (so you don't get logged out every few minutes), but to enable password verification for the sender screen, you'll need to edit [sender.php](/www/sender.php) and remove the comments from the first section. This will ensure no one else can access your system. This is especially important considering some scripts can be run with sudo through the web ui - not ideal. 

To change the password, modify [login.php](www/login.php) and edit the third line - obviously, you should also enable password authentication on sender.php as listed above.

Fonts
-----
If you're not too fond of the standard font, American Captain, that's cool, we get it, it's quite easy to change. Edit the file [pithon.py](rpi-rgb-led-matrix/examples-api-use/pithon.py) (yes, we're awful at naming files). You'll see a few examples listed but commented out, just comment out the standard font and uncomment an alternative. If none of them do it for you, you can copy any .ttf font you like into the directory and link to it. In fact, it doesn't even have to be in the same directory. You may have to change the font size when selecting something else. 

Animations
----------
There are many included animations, to use these just select the one you want on the web interface and click submit. I personally use this code myself for work in bars and clubs so the included animations are mostly drinks company logos and the like. I've included a photoshop file animations.psd which should make it easy to drop your own images in and replicate the animations. Or, of course, you can make your own from scratch. To add them to the web interface, edit senders.php to include links to your files, or if you want just point the premade ones to your own files if you don't plan on using mine.

Animations should be made the same size as your display. I.E. if you're using 2 32x16 panels, make sure your animations are 64x16 and so on.) As of 1.5, we cloned the most recent code from [Hzeller](https://github.com/hzeller/rpi-rgb-led-matrix), so we now have video functionality, but we haven't added any standard examples yet. h.264 seems to run very well, so we'd recommend that. 

Copyright & Licensing
_________
We've no doubts you know how GPL 3.0 works, but just to make things extra clear, you're fully allowed to use this code for both personal and commercial use, but you must keep all copyright notices in tact and share your changes under the same conditions. 
You can change the title section of the page if you like, the xer0.design led-matrix-controller vX.X bit with the icon, but the footer must be kept under all circumstances, along with notices inside the code. This code is offered as-is, with no warranty.
