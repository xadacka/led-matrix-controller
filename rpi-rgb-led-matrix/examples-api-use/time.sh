killall -9 demo
killall -9 led-image-viewer
killall -9 video-viewer
killall -9 text-example
#cd /home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use
(while :; do date +%T ; sleep 0.2 ; done) | /home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/text-example -f /home/pi/led-matrix-controller/rpi-rgb-led-matrix/fonts/9x18B.bdf -C 128,0,0 --led-rows=16 --led-chain=4 >/dev/null
exit 0

