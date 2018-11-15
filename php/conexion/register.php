<?php

//Incluimos el archivo de conexión
require "conexion.php";

//Recibir los datos y almacenar en variables
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];


if (strcmp($password, $password2) == 0) {
    //Consulta para insertar a la BD.
    $insertar = "INSERT INTO usuarios(username, password, name, email)"
            . "VALUES ('$username', '$password','$name', '$surname', '$email')";

    //Comprueba que no este duplicado el username.
    $verificar = mysqli_query($con, "SELECT * FROM  usuarios WHERE email = '$email'");
    if(mysqli_num_rows($verificar) > 0){
        echo 'Este email ya está registrado';           
        exit;    
    }
    //Ejecuta la consulta.
    $resultado = mysqli_query($con, $insertar);

    //Comprueba si el registro a dado algún error o no.
    if (!$resultado){
        echo '<br> Error al registrarse';
    }
    else{      
        header('Location: index.php');     
    }
    //Cerrar conexion
    mysqli_close($con);
    
} else {
    echo "Las contraseñas no coinciden.";
}
?>