#!/usr/local/bin/python

import RPi.GPIO as GPIO

subprocess.run("xbacklight -set 0", shell=TRUE)

#Run on PI
sudo apt-get install xbacklight
xbacklight -set 0
xbacklight -set 100