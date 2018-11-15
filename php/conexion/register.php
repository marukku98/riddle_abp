<?php
session_start();

//Incluimos el archivo de conexión
include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php";


if(isset($_POST['insertarUser'])){     
    //Recibir los datos y almacenar en variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (strcmp($password, $password2) == 0) {
        //Comprueba que no este duplicado el username.
        $verificar = selectUserByEmail($email);
        if($verificar > 0){  
            header('Location: /riddle_abp/php/body/register.php');
    }

    //Ejecuta la consulta.
    //Consulta para insertar a la BD.
    insertarUsers($username, $email, $password);

    } else {
        echo "Las contraseñas no coinciden.";
    }       

}
?>