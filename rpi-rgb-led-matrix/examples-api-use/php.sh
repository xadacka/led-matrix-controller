killall -9 demo
killall -9 led-image-viewer
# alt way to activate external 
#/home/pi/led-matrix-controller/www/external/external.sh
cd /home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/
sudo python pithon.py >/dev/null
exit 0
