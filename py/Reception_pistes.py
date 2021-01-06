#!/usr/bin/python
# -*- coding: utf-8 -*-

import time
import serial

ser = serial.Serial('/dev/ttyACM0',9600)

while 1:
	x=ser.readline()
	print x
