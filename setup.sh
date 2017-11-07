	#!/bin/bash

#   copyright xer0.design - licenced under gpl 3.0
#   https://github.com/xer0design/led-matrix-controller

clear

echo "                ___      _           _             "
echo "__  _____ _ __ / _ \  __| | ___  ___(_) __ _ _ __  "
echo "\ \/ / _ \ '__| | | |/ _\` |/ _ \/ __| |/ _\` | '_ \ "
echo " >  <  __/ |  | |_| | (_| |  __/\__ \ | (_| | | | |"
echo "/_/\_\___|_|   \___(_)__,_|\___||___/_|\__, |_| |_|"
echo "                                       |___/       "
echo " "
echo "welcome to led-matrix-controller by xer0.design"
echo " "
echo "this usually takes about 10-20 minutes, depending on if you update packages."
echo " "
echo "go get yourself a cup of coffee and your screen will turn on and display the login ip address when finished."
echo " "
echo "the default webui password is password - change this."
sleep 15

#clone into correct directory and prepare install
cd /home/pi
git clone https://github.com/xer0design/led-matrix-controller.git
cd led-matrix-controller

#update apt
sudo apt update
#install git if it's not already installed
sudo apt install git
#install apache2
echo "installing apache2 required extensions to run the web ui"
sudo apt install apache2 php5 python python-dev python-imaging python-pip -y
#allowing gpio pins to be run by www-data, and www-data to run the 3 scripts we need sudo for.
echo "allowing all users to access gpio and run the scripts we need"
sudo adduser www-data gpio
sudo adduser pi gpio
echo "www-data ALL=NOPASSWD: /home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/php.sh, /home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/pithon.py, /home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/loadpithon.sh, /home/pi/led-matrix-controller/scripts/*, /home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/time.sh" >> /etc/sudoers
#below is alternative method, this will allow www-data to run ANY command though so make sure only you have access to website. disabled as default for security.
#echo "chmod 666 /dev/mem" >> /etc/rc.local
#install tools for generating images
echo "installing tools required for generating images and text on the fly"
sudo apt-get install libgraphicsmagick++-dev libwebp-dev -y
sudo pip install Pillow emoji
#enter examples and make
echo "making required programs"
cd rpi-rgb-led-matrix/examples-api-use
make
#add video programs, enter utilities and make image and video
sudo apt-get install libavcodec-dev libavformat-dev libswscale-dev
cd ../utils 
make video-viewer
make led-image-viewer
cd ../..
#disable pi sound
echo "dtparam=audio=off" >> /boot/config.txt
cat <<EOF | sudo tee /etc/modprobe.d/blacklist-rgb-matrix.conf
blacklist snd_bcm2835
EOF
sudo update-initramfs -u
#setup apache
echo "setting up web controller"
#remove current html directory
sudo rm -rf /var/www/html
#make symlink for website to load from current folder and make sure permissions are okay
sudo ln -s /home/pi/led-matrix-controller/www/ /var/www/html
sudo chmod -R 777 www
sudo chown -R www-data:www-data www
#add cronjob to display ip address on boot
echo "adding cronjob to show ip address on boot"
sudo echo "@reboot /home/pi/led-matrix-controller/scripts/ip.sh" >> /var/spool/cron/crontabs/pi
clear
printf  "system will reboot in 10 seconds.\nafter reboot, led panel should show your your screen ip\ngo to that address to update the screen.\n\nthe default password is \"password\".\n\n"
sleep 5
echo "5"
sleep 1
echo "4"
sleep 1
echo "3"
sleep 1
echo "2"
sleep 1
echo "1"
sleep 1
echo "goodbye"
sudo reboot
exit
