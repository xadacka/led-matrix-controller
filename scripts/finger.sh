killall -9 demo
killall -9 led-image-viewer
killall -9 text-example
sudo /home/pi/led-matrix-controller/rpi-rgb-led-matrix/utils/led-image-viewer /home/pi/led-matrix-controller/images/fingers.gif --led-rows=16 --led-chain=4 -R 180 >/dev/null
exit 0
