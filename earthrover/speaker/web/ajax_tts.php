<?php

$text = $_POST["str"];
$gender = $_POST["gen"];

$text=filter_text($text);

$cmd="sudo python /var/www/html/earthrover/speaker/speaker_tts.py '".$text."' '".$gender."' &";

os.system($cmd);

//removes apostrophe from a word. it can break the text to speech functionality 
function filter_text($str){
	
	if(strpos($str, "'"))
		{
			$str1=str_replace("'","",$str);
			return $str1;
		}
	
		return $str;
}


?>
