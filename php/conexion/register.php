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
        $_SESSION['errorUsername']=$username;  
    }else if(strlen($password) < 6 || strlen($password2) < 6){
        $validation = false;
        $_SESSION['error']= "La contraseña tiene que tener un minimo de 6 carácteres.";
        $_SESSION['errorUsername']=$username;
        $_SESSION['errorEmail']=$email; 
    }else if ($password !== $password2) {
        $validation = false;
        $_SESSION['error'] = "Las contraseñas no coinciden.";
        $_SESSION['errorUsername']=$username;
        $_SESSION['errorEmail']=$email; 
    }else{
        $verificar = selectUserByEmail($email);
        if($verificar > 0){
            $validation = false;
            $_SESSION['error']= "Este email ya esta registrado.";
            $_SESSION['errorUsername']=$username;
        }else{
            $verificar = selectUserByName($username);
            if($verificar > 0){
                $validation = false;
                $_SESSION['error']= "Este nombre de usuario no esta disponible.";
                $_SESSION['errorEmail']=$email;
            }
        }
    }

    if($validation == true){
        insertarUsers($username, $email, $password);
        header('Location: /riddle_abp/php/body/login.php');
    }else{
        header('Location: /riddle_abp/php/body/register.php');
    }

}

?>