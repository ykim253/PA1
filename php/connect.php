<?php

function dbConnect (){
 	$conn =	null;
	$servername = "ykim253.cvetxwotmwj7.us-west-2.rds.amazonaws.com";
	$username = "info344user";
	$password = "krnpride253";
	$dbname = "Testing";
	try {
	   	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
	}
	return $conn;
 }

 ?>