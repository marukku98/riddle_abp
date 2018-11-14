<?php
session_start();
error_reporting(0);

//incluimos el archivo conexión.
require "conexion.php";

//Recogemos las variables con que inciaremos la sesión.
$username = $_POST['username']; 
$password = $_POST['password'];

//Hacemos un select a la BD.
$sql = "SELECT * FROM usuarios WHERE username ='$username' AND password ='$password'";

//Ejecutamos la consulta.
    
//Creamos un array de datos.    
$datos = array();
    //Obtenemos una fila de resultados como matriz asociativa y la almacenamos 
    //en una variable, con la posición pertañente.
    while($row = mysqli_fetch_array($result)){
	   $response = array("username"=>$row[0], "password"=>$row[1], "name"=>$row[2], "surname"=>$row[3],"email"=>$row[4],"admin"=>$row[5]);
    }
    
    //Comprueba si se ha logeado bien o no.
    if(!$response) {
        echo "Error al logear!";
    } else {
        $_SESSION['username'] = $response['username'];
        $_SESSION['name'] = $response['name'];
        $_SESSION['surname'] = $response['surname'];
        $_SESSION['email'] = $response['email'];        
        header($location);
        die();
    }
?>