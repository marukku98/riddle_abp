<?php
require_once "adminusers.php";
if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['delete'])){
    if($_POST['delete']['role'] < $_SESSION['user']['role']
        && $_POST['delete']['email'] != $_SESSION['user']['email']){
        deleteUserByID($_POST['delete']['email']);    
    }
}elseif(isset($_POST['edit'])){
    if($_POST['edit']['role']<$_SESSION['user']['role']){
        editUser($_POST['edit']['email'], $_POST['edit']['name']);
    }

}elseif(isset($_POST['change'])){
    changePermission($_POST['change']['email'], $_POST['change']['role']);
}
header('Location: /riddle_abp/php/body/admin.php');
?>