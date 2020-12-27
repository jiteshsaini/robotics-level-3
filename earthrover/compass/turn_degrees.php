<?php
include_once '../vars.php';

$deg=$_POST["heading_cmd"];
/*
$myfile = fopen("comm.txt", "w") or die("Unable to open file!");
fwrite($myfile, $deg);
fclose($myfile);
*/
global $course;
$course=get_current_heading();

turn($deg);

echo"done";

function turn($h_final){
	//set_speed('30');
	global $course;
	$h=get_current_heading();
	$h_current=intval($h);
	
	$k=0;
	while($h_current != $h_final){

		$arr=get_dir_deg($h_current,$h_final);
		$dir=$arr[0];
		$degrees=$arr[1];
		$accuracy_factor=get_accuracy_factor($degrees);
		
		move($dir);
		$delay=$degrees*$accuracy_factor; //turning time  (milliseconds of motion. lesser the degrees, lesser the time)
		echo "direction: $dir , Angle difference: $degrees ,delay= $delay<br>";
	
		usleep($delay * 1);
		move('s');
		usleep(300*1000); //pause between turning moves
		
		$h=get_current_heading();
		$h_current=intval($h);
		
		$k=$k+1;
		//if($k>30)
			//break;
	}
	$course=$h_current;
	echo"<h2>settled in attempts: $k, new course: $course</h2>";
	//set_speed('50');
}

function get_accuracy_factor($deg){
	if ($deg>90)
		$k=7000;
		
	if ($deg>=45 and $deg<=90)
		$k=6500;
		
	if ($deg>=6 and $deg<45)
		$k=2100;
	
	if ($deg<6)
		$k=1;
		/*
	if ($deg>=150)
		$k=9000;
	
	if ($deg>=120 and $deg<150)
		$k=8000;
	
	if ($deg>=90 and $deg<=120)
		$k=7000;
	
	if ($deg>=45 and $deg<90)
		$k=6500;
		
	if ($deg>=10 and $deg<45)
		//$k=500;
		$k=3500;
	
	if ($deg<10)
		$k=10;
		
	
	//echo "acc: $k<br>";
	* */
	return $k;
}


function get_dir_deg($current,$final){
	$diff=abs($final-$current);
	
	if ($diff<=180){
		if($final>$current)
			$dir='r';
		else
			$dir='l';
		
		$deg=$diff;
	}
	else{
		if($final>$current){
			//final is bigger
			$dir='l';
			$deg=360-$final+$current;
			
		}
		else{
			//current is bigger
			$dir='r';
			$deg=360-$current+$final;
		}
			
	}
	
	$arr[0]=$dir;
	$arr[1]=$deg;
	
	return $arr;
}


function get_current_heading(){
	$myFile = "robot_compass/heading.txt";

	$fr=fopen($myFile, 'r') or die("can't open file");
	$h=fread($fr, '5');
	fclose($fr);
	
	return $h;
}


/*
function process_str($str){
	//set_speed('50');
	global $course;
	
	$arr=str_split($str, 1);

	for($i=0;$i<sizeof($arr);$i++){
	
		$dir=$arr[$i];
	
		if($dir=="l")
			turn_left('90');
		elseif($dir=="r")
			turn_right('90');
		else{
			
			move($dir);
			usleep(1000 * 1000); //forward back motion time
			turn($course);
		}
		
		move('s');
		sleep(1); //pause between f r l commands
	}
}
*/

/*
function turn_left($deg){
	$h=get_current_heading();
	$h_current=intval($h);
	
	$h_final=$h_current-$deg;
	if($h_final<0)
		$h_final=360-abs($h_final);
	
	//echo"left: $h_final<br>";
	turn($h_final);
}
function turn_right($deg){
	$h=get_current_heading();
	$h_current=intval($h);
	
	$h_final=$h_current+$deg;
	if($h_final>=360)
		$h_final=$h_final-360;
	
	//echo"right: $h_final<br>";
	
	turn($h_final);
}
*/

?>
