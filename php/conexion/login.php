<?php require_once $_SERVER['DOCUMENT_ROOT']."/riddle_abp/php/conexion/conexion.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

$res = selectUser($email, $password);

if(count($res)==0){
    $res = selectUserByEmail($email);
    $_SESSION['email'] = $email;

    if($res==0){
        $_SESSION['error']='Este correo no pertenece a ninguna cuenta.';
    }else{
        $_SESSION['error']='Contraseña incorrecta.';
    }
    
    header("Location: /riddle_abp/php/body/login.php");

}
else{
    $_SESSION['username'] = $res[0]["username"];
    $_SESSION['email'] = $res[0]["email"];
    $_SESSION['role'] = $res[0]["role"];
    header("Location: /riddle_abp/php/body/index.php");
}

?>