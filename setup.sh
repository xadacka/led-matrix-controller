echo "please do not use this, it is unfinished code and will almost certainly break something. press ctrl+c to cancel"
sleep 20
cd rpi-rgb-led-matrix/examples-api-use
make
cd ../utils 
make
cd ..
sudo apt update 
sudo apt -y upgrade
sudo apt install apache2
