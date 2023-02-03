<?php
	
	$host 		= "sql309.epizy.com";
	$dbname 	= "epiz_33121242_nazobook";
	$charset 	= "utf8";
	$root 		= "epiz_33121242";
	$password 	= "5f7DyYYmJZDPBP";

	try{
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root, $password);
	}catch(PDOException $error){
		echo $error->getMessage();
	}
	
?>
