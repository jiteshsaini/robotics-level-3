# Robotics Level 3 : Javascript hardware control | Accelerometer | Voice Commands

It is worth exploring the native HTML5 and JavaScript APIs that allow access to hardware components and sensors in our smart phones. 
In this level, the robot will be controlled through few such techniques.
The technique involves serving a web application through webserver running in Raspberry Pi Robot. The application is accessed through a browser on smart phone. 
The Javascript code in the application interacts with the smart phone's sensor and sends the data to Server.
This data is then utilised to control the robotic motion.

The folders containing the code for this level are mentioned below. They are present inside the 'earthrover' directory.

## accelerometer

This folder contains the web application which accesses the accelerometer data of a smart phone. Tilting or moving the phone results in change in x, y & z accelerometer data.
These values are sent to the server, where a php file controls the GPIO pins of the Raspberry Pi as per the data received.

## voice_control

The Javascript code of this application can access the microphone of a smart phone or a laptop through browser and capture the voice input. 
This input is sent over internet to a Speech to Text API known as Web Speech API to get the corresponding text. The text is then sent to the server running on Raspberry Pi where a php file processes it to move the robot as per the apoken command.
<br><br>


More such examples will be added to this repo in future.
