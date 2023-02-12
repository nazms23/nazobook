<?php
	
	$host 		= "localhost";
	$dbname 	= "nazobook";
	$charset 	= "utf8";
	$root 		= "root";
	$password 	= "";

	try{
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root, $password);
	}catch(Exception $e){
		echo $e->getMessage();
	}


?>
