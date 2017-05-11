#!/usr/bin/env python
# -*- coding: utf-8 -*- 
from __future__ import unicode_literals
import emoji
import os
import scrolltext
#from PIL import ImageFont
#from PIL import Image
#from PIL import ImageDraw
from PIL import Image, ImageDraw, ImageFont, ImageFilter

#f = open("/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/scrolltext.txt")
#print(f.read())

text = scrolltext.text

#standard san serif font
font = ImageFont.truetype("/usr/share/fonts/truetype/freefont/FreeSans.ttf", 16)
#more styalized
#font = ImageFont.truetype("/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/TooMuchInk.ttf", 16)
#pretty but no numbers and doesn't scale as well
#font = ImageFont.truetype("/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/hellovetica.ttf", 10)

all_text = ""
for text_color_pair in text:
    t = text_color_pair[0]
    all_text = all_text + t
 
print(all_text)
width, ignore = font.getsize(all_text)
print(width)
 
 
im = Image.new("RGB", (width + 30, 16), "black")
draw = ImageDraw.Draw(im)
 
x = 0;
for text_color_pair in text:
    t = text_color_pair[0]
    c = text_color_pair[1]
    print("t=" + t + " " + str(c) + " " + str(x))
    draw.text((x, 0), t, c, font=font)
    x = x + font.getsize(t)[0]
 
im.save("/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/test.ppm")
 
os.system("/home/pi/led-matrix-controller/rpi-rgb-led-matrix/examples-api-use/demo -D 1 test.ppm --led-rows=16 --led-chain=4")
