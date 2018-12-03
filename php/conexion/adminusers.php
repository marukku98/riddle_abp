<?php
      if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] != 1 && $_SESSION['user']['role'] != 2){
            header('Location: /riddle_abp/php/body/index.php');            
        }
      }else{
        header('Location: /riddle_abp/php/body/index.php');
      }
if(isset($_POST['delete'])){
    deleteUserByID($_POST['delete']['email']);
    header('Location: /riddle_abp/php/body/admin.php');
}
elseif(isset($_POST['edit'])){
    
}

function openBD(){

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=riddle;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}

function closeBD(){
    return null;
}

function selectUsers(){
    $conn = openBD();
    
    try{
        $sentencia = $conn->prepare("select * from users limit 50");
        $sentencia->execute();
        $result = $sentencia->fetchAll();
        $conn = closeBD();
    }catch(PDOException $e){
            
    }

    return $result;
}

function deleteUserByID($email){
    $conn = OpenBD();

    try{
        $sentencia = $conn->prepare("delete from users where email = :email");
        $sentencia->bindParam(':email', $email);    
        $sentencia->execute();
    }catch(PDOException $e){
        $_SESSION['bd_error']= 'delete error';        
    }

    $conn = closeBD();
}

function editUser($email, $name){
    $conn = OpenBD();
    try{
        $sentencia = $conn->prepare("update users set username = :name where email = :email");
        $sentencia->bindParam(':name', $name);
        $sentencia->bindParam(':email', $email);
        $sentencia->execute();
    }catch(PDOException $e){
        $_SESSION['bd_error']= 'edit error';
    }

    $conn = closeBD();
}
?>