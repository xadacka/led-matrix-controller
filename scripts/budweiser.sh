killall -9 demo
killall -9 led-image-viewer
cd /home/pi/led-matrix-controller/rpi-rgb-led-matrix/utils/
sudo /home/pi/led-matrix-controller/rpi-rgb-led-matrix/utils/led-image-viewer /home/pi/led-matrix-controller/images/bud.gif --led-rows=16 --led-chain=4 >/dev/null
exit 0
