<?php

//Inincializamos las variables con los datos de la BD.
$db_name = "";
$mysql_user = "";
$mysql_pass = "";
$server_name = "";

//Creamos una variable conexion que nos permita acceder a la BD.
 
try {
	$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully"; 
	}
catch(PDOException $e)
	{
	echo "Connection failed: " . $e->getMessage();
	}
?>