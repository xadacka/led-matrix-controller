Note: This is unfinished code with lots missing at the moment, if you stumble across this and would like to use it, just star it and check back for when this warning is gone. Using it as is will almost certainly break something.

led-matrix-controller
=====================
Web based controller for led panels. This code is designed for Raspberry Pi using HUB75 led panels. You can buy the panels cheap from China, or get them off eBay or adafruit or a multitude of other places.

Clone the repository into your home folder (/home/pi - you'll have to edit setup.sh if using another directory) and then you can cd in and run setup.sh. The setup script will install apache2 and move the required files into the web directory and change a few permissions for apache. The only way this can work is by letting www-data (apache, php) access the GPIO pins. By default, they require sudo - the setup script allows www-data to access them. This is a minor security issue but shouldn't be too bad.

Notes before starting
---------------------
Currently, the code is designed for two 32x16 panels in series from chain 1 - will soon be adding an option on the web interface for changing how many panels you have and how they're chained. You can manually change this now to add/remove panels by changing the flags in the bash scripts but this will be horribly time consuming for you. Best just wait it out.

You should probably wire the panels before running the scripts as once it's installed, it'll show you the pi's IP on the screen but you can leave that until after if you like. Wiring diagram is [here](./wiring.md)

Automated Setup
---------------
We strongly recommend running raspbian-lite as opposed to the full version, you can download the image [here](https://www.raspberrypi.org/downloads/raspbian/)

To use this code, simply run the commands below. You'll be asked if you'd like to upgrade all packages on the system, you probably won't need to, especially if running a freshly downloaded image, but it's never really a bad idea to be up to date.

The setup script will only work properly if you're cloning into /home/pi - if you'd rather install it somewhere else, you'll need to update the install script to reflect your location.

```
cd /home/pi
git clone https://github.com/xer0design/led-matrix-controller.git
cd led-matrix-controller
chmod +x setup.sh
./setup.sh
```


This will automate everything and will reboot after, once the reboot is finished you should see your Pi's IP address scrolling across the screen and from there, you can type it into your browser and start using your panel.

The detault password for the web interface is "password". Because of course it is. 

Manual Setup
------------
Instructions coming soon. If you want, just open setup.sh to see what's happening, it's all commented out.
