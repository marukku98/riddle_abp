<?php
    $direccion = $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/";
    $carpeta = "/riddle_abp/";

    require_once $direccion . "php/librerias/ti.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php startblock("titulo"); ?>

        <?php endblock(); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo $carpeta; ?>assets/css/bootstrap.min.css">
    <script src="<?php echo $carpeta; ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $carpeta; ?>assets/js/popper.min.js"></script>
    <script src="<?php echo $carpeta; ?>assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo $carpeta; ?>assets/css/login_register.css">

</head>

<body>
    <div class="center">
<a href="index.php"><img src="<?php echo $carpeta; ?>assets/img/title.png" class="title" ></a>
    <div class="container">
        <?php startblock('principal'); ?>

        <?php endblock(); ?>
    </div>
    </div>
</body>
</html>