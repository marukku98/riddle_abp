<?php session_start();?>
<script src="/riddle_abp/assets/js/cookies.js"></script>

<?php
    if(isset($_SESSION['user'])){        
?>
    <script>
        setHistorial("logout","<?php echo $_SESSION['user']['email'];?>");
    </script>
<?php
        unset($_SESSION['user']);
    }            
?>

<script>
    window.location = "/riddle_abp/php/body/index.php";
</script>

