echo "please do not use this, it is unfinished code and will almost certainly break something. press ctrl+c to cancel"
sleep 10
#update apt
echo "updating pakcage lists"
sudo apt update 
#upgrade all packages
echo "upgrading all packages on system"
sudo apt -y upgrade
#install apache2 
echo "installing apache2 required extensions to run the web ui"
sudo apt install apache2 php5 python -y
#add www-data to sudoers 
echo "adding apache to sudoers - this is needed to access gpio pins"
################
#install tools for generating images
echo "installing tools required for generating images and text on the fly"
sudo apt-get install libgraphicsmagick++-dev libwebp-dev -y
#enter examples and make
echo "making required programs"
cd rpi-rgb-led-matrix/examples-api-use
make
#enter utilities and make
cd ../utils 
make led-image-viewer
cd ..
#move website data into apache directory
echo "moving required files to web directory"
sudo rm -rf /var/www
sudo cp -r www /var/
sudo chmod -R 777 /var/www/
sudo chown -R www-data:www-data /var/www
#add cronjob to display ip address on boot
echo "adding cronjob to show ip address on boot"
###############
#reboot
echo "system will now reboot. after reboot, you should see the ip address on your led panel. go to that address to update the screen. the default password is \"password\"."
sleep 1
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
