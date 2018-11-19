<?php
session_start();

//Incluimos el archivo de conexión
include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php";

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(isset($_POST['insertarUser'])){     
    //Recibir los datos y almacenar en variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $validation = true;

    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validation = false;
        $_SESSION['error']= "Formato de correo inválido.";     
    }else if(strlen($password) < 6 || strlen($password2) < 6){
        $validation = false;
        $_SESSION['error']= "La contraseña tiene que tener un minimo de 6 carácteres.";
    }else if (strcmp($password, $password2) == 1) {
        $validation = false;
        $_SESSION['error'] = "Las contraseñas no coinciden.";
    }else{
        $verificar = selectUserByEmail($email);
        if($verificar > 0){
            $validation = false;
            $_SESSION['error']= "Este email ya esta registrado.";
        }
    }

    if($validation == true){
        insertarUsers($username, $email, $password);
        header('Location: /riddle_abp/php/body/index.php');
    }else{
        header('Location: /riddle_abp/php/body/register.php');
    }

}

?>