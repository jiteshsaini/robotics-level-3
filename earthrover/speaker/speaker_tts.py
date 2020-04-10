#Project: Earthrover
#Created by: Jitesh Saini

import RPi.GPIO as GPIO
import os, sys

text = sys.argv[1]
gender = sys.argv[2]

print "text: ", text
print "gender: ", gender

speaker_light = 9 #17

GPIO.setmode(GPIO.BCM)
GPIO.setup(speaker_light, GPIO.OUT)
blink = GPIO.PWM(speaker_light, 3) #frequency
blink.start(0)
blink.ChangeDutyCycle(50) #start blinking the mouthpiece LED as the text is converted to speech

#str1="testing speaker"

cmd_speak="sudo espeak -ven-us+" + gender + "5 -s120 " + "'" + text + "'"

os.system(cmd_speak)

blink.ChangeDutyCycle(0) #stop blinking the mouthpiece LED

GPIO.output(speaker_light, False)
