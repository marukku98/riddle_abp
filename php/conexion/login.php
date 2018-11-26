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
    // $username = $res[0]["username"];
    // $email = $res[0]["email"];
    // $role = $res[0]["role"];
    $_SESSION['user'] = array(
        'username'=>$res[0]["username"],
        'email'=>$res[0]["email"],
        'role'=>$res[0]["role"]        
    );  

    if(isset($_SESSION['lastPage'])){
        header("Location: /riddle_abp/php/body/" . $_SESSION['lastPage']);
        unset($_SESSION['lastPage']);
    }else{
        header("Location: /riddle_abp/php/body/index.php");
    }

    
}

?>