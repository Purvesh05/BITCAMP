<?php 

function string_check($string){
	global $conn;
	
	$string = mysqli_real_escape_string($conn,trim($string));
	
	return $string;
	
}

function query_check($string){
	global $conn;
	if(!$string){
		die("something went wrong here ".mysqli_error($conn));
	}
}
?>