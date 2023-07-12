<?php
$host="localhost";
		$user="root";
		$pass="";
		$base="resaux";
		$conn= mysqli_connect( $host,$user,$pass,$base);
		if (!$conn) {
			
			die("connecion echec:".mysqli_connect_error());
		}

	
error_reporting(0);
ini_set("display-ERROR", 1);



?>