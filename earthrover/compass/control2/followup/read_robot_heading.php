<?php

//echo"<h1>hihihihi</h1>";


$myfile = fopen("../../robot_compass/heading.txt", "r") or die("Unable to open file!");
$str = fread($myfile,5);
fclose($myfile);


//$str="29";
echo "$str";
?>
