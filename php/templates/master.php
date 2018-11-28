<?php
    session_start();
    $direccion = $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/";
    $carpeta = "/riddle_abp/";

    require_once $direccion . "php/librerias/ti.php";
?>

<!DOCTYPE html>
<html class="">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php startblock("titulo"); ?>

    <?php endblock(); ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Hammersmith+One|Open+Sans|Roboto" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $carpeta; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $carpeta; ?>assets/css/index.css">

  <?php startblock("css"); ?>

  <?php endblock(); ?>

  <script src="<?php echo $carpeta; ?>assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo $carpeta; ?>assets/js/popper.min.js"></script>
  <script src="<?php echo $carpeta; ?>assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">


  <!-- <link rel="stylesheet" type="text/css" href="/riddle_abp/assets/css/jqpuzzle.css" />
<script type="text/javascript" src="/riddle_abp/assets/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="/riddle_abp/assets/js/jquery.jqpuzzle.js"></script> -->

</head>

<style>

</style>

<body class="bg-body">
  <header class="shadow-effect">
    <nav class="navbar navbar-expand-lg navbar-light bg-main">
      <img class="mt-2 mb-2" src="/riddle_abp/assets/img/TITULO.png" height="50">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
        if(isset($_SESSION['user'])){
      ?>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
        <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['user']['username'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Cerrar sesión</a>
        </div>
        </div>
      </div>
      <?php
        }else{
      ?>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
        <form class="form-inline my-2 my-lg-0">
          <a class="bg-transparent border-0 my-2 my-sm boton pr-4" href="register.php">Regístrate</a>
          <a class="btn btn-primary my-2 my-sm-0 boton boton-login" href="login.php">Iniciar Sesión</a>
        </form>
      </div>
      <?php
        }
      ?>

    </nav>

    <nav class="navbar navbar-expand-lg navbar-light p-0 bg-second">
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0  title-font">
          <li class="nav-item">
            <a class="nav-link text-white mr-4 pl-3" href="index.php">MENU<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white mr-4 pl-3" href="gamesGrid.php">JUEGOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white mr-4 pl-3" href="index.php#scroll">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white mr-4 pl-3" href="contact.php">CONTACTO</a>
          </li>

        </ul>
      </div>
    </nav>

  </header>

  <div class="container">
    <?php startblock('principal'); ?>

    <?php endblock(); ?>
  </div>

  <hr>

  <!-- Footer -->
  <footer class="page-footer font-small red">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="">Riddle Team</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

</body>

<!-- <script>
  $(function () {
    $('#myList a:last-child').tab('show')
  })
</script> -->

</html>