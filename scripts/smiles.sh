killall -9 demo
killall -9 led-image-viewer
killall -9 text-example
cd /home/pi/rpi-rgb-led-matrix/utils/
sudo /home/pi/rpi-rgb-led-matrix/utils/led-image-viewer smiles.gif --led-rows=16 --led-chain=2 >/dev/null
exit 0
