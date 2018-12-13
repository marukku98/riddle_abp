<?php require_once $_SERVER['DOCUMENT_ROOT']."/riddle_abp/php/conexion/conexion.php";
    session_start();
?>
<script src="/riddle_abp/assets/js/cookies.js"></script>
<?php

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
    
    ?>
        <script>
            setHistorial("try(<?php echo $_SESSION['error']?>)","<?php echo $email;?>");
            window.location = "/riddle_abp/php/body/login.php";
        </script>
    <?php
}
else{

?>
    <script>
        setHistorial("login","<?php echo $email;?>");
    </script>
<?php

    $_SESSION['user'] = array(
        'username'=>$res[0]["username"],
        'email'=>$res[0]["email"],
        'role'=>$res[0]["role"]        
    );  
 

    if(isset($_SESSION['lvl'])){
        $enigma = $_SESSION['lvl'];
        $game = '1';
        $email = $_SESSION['user']['email'];
        $var = selectProgressUser($game, $email); 
         ?>
         
        <?php $var = selectProgressUser($game, $email); 
        
        if($var[0]['progres'] == $enigma-1){  ?>
            <script>              
                window.location = "/riddle_abp/php/body/enigma"+<?php echo $enigma ?>+".php";
            </script>
    <?php }else{ ?>
            <script>
                window.location = "/riddle_abp/php/body/game.php";
            </script>
    <?php }
        ?>
        
        <?php
        unset($_SESSION['lvl']);
    }else{
        if (isset($_SESSION['lastPage'])) {
            $lastPage = $_SESSION['lastPage'];
            unset($_SESSION['lastPage']);
            ?>
                <script>
                    window.location = "/riddle_abp/php/body/" + "<?php echo $lastPage;?>";
                </script>
            <?php

        } else {
            ?>
                <script>
                    window.location = "/riddle_abp/php/body/index.php";
                </script>
            <?php
        }

    }
    
}

?>