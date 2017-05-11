#!/bin/bash

sleep 10 #to allow the pi to connect to the network before loading
sed -i '1d' /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py
echo "text = ((\"xer0.design \", (90, 0, 213)), (\"" >> /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp
ip addr | grep 'state UP' -A2 | tail -n1 | awk '{print $2}' | cut -f1  -d'/' >> /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp
echo "\", (202, 0, 209)))" >> /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp
sed ':a;N;$!ba;s/\n/ /g' /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp > /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.py
rm -f /home/pi/rpi-rgb-led-matrix/examples-api-use/scrolltext.pytmp

cd /home/pi/rpi-rgb-led-matrix/examples-api-use/
sudo python pithon.py

