#!/usr/bin/python
# -*- coding: utf-8 -*-

import time
import serial

ser = serial.Serial('/dev/ttyACM1',9600)

while 1:
	x=ser.readline()
	print x
	temp = x.find("temp=")
	vent = x.find("vent=")
	if temp == 0:
		fichier = open("temp.txt", "w")
		fichier.close()
		fichier = open("temp.txt", "w")
		fichier.write(x)
		fichier.close()
		print x
	if vent == 0:
		fichier = open("vent.txt", "w")
		fichier.close()
		fichier = open("vent.txt", "w")
		fichier.write(x)
		fichier.close()
		print x
	 
