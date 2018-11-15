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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $carpeta; ?>assets/css/index.css">

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg" style="background-color: #32CBED;">
      <a class="navbar-brand" href="index.php">
        <div class="page-header">
          <!-- <h1>RIDDLE</h1> -->
          <img src="/riddle_abp/assets/img/titulo.png" style="max-height: 200px; max-width: 200px;" alt="">
        </div>
      </a>
      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto"></ul>
        <a class="navbar-brand">
          <h5><a class="text-white" href="login.php">Iniciar Sesion</a> </h5>
        </a>
        <div class="vertical-divider"></div>
        <a class="navbar-brand">
          <h5><a class="text-white" href="register.php">Registrate</a> </h5>
        </a>
      </div>
    </nav>

    <div id="navigation">
      <nav class="navbar navbar-expand-lg navbar-light py-1" style="background-color: #45B8D2;">
        <div class="navbar-collapse collapse navbars" id="navbar2">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link col-2 text-white" href="index.php">MENU</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link col-2 text-white" href="gamesGrid.php">JUEGOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link col-2 text-white" href="contact.php">CONTACTO</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

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
            <a href=""> Team Riddle</a>
        </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->

</body>

<script>
  $(function () {
    $('#myList a:last-child').tab('show')
  })
</script>

</html>