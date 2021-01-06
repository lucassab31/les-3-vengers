#!/usr/bin/python
# -*- coding: utf-8 -*-

import time
import serial

ser = serial.Serial('/dev/ttyACM1',9600)
while 1:
	fichier = open("message.txt", "r")
	contenu = fichier.read()
	fichier.close()
	ser.write(contenu)
	print contenu
	fichier = open("message.txt", "w")
	fichier.close()
	time.sleep(1)
