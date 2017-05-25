#!/bin/bash

#   copyright xer0.design - licenced under gpl 3.0
#   https://github.com/xer0design/led-matrix-controller



# allow the pi to connect to the network before loading
sleep 10
# remove the current/old string from the file
sed -i '1d' /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py 
# add the intro to a temporary file
echo "text = ((\"xer0.design \", (90, 0, 213)), (\"" >> /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp 
# get the pi's ip address and add it to the temp file
ip addr | grep 'state UP' -A2 | tail -n1 | awk '{print $2}' | cut -f1  -d'/' >> /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp
# add colour and closing tags to the temp file
echo "\", (202, 0, 209)))" >> /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp
# remove the linebreaks from the tempfile that were created in the above steps, then write the contents to the real file
sed ':a;N;$!ba;s/\n/ /g' /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp > /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py
# delete the temp file
rm -f /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp
# change to proper directory
cd /home/pi/rpi-rgb-led-matrix/examples-api-use/
# run the standard display script to turn the screen on, loading our new file with the ip
sudo python pithon.py

