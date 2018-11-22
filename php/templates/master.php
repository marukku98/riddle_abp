<?php
    session_start();
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

<body>
  <header class="shadow-effect">
    <!-- <h1>RIDDLE</h1> -->
    <div class="container-fluid bg-main-color">
      <div class=" row">
        <div class="col-xl-9 col-lg-8 col-md-7 col-sm-7">
          <nav class="navbar navbar-expand-lg bg-main-color">
            <a class="navbar-brand" href="index.php">
              <div class="page-header">
                <img src="/riddle_abp/assets/img/titulo.png" height="40" alt="">
              </div>
            </a>
          </nav>

          <nav class="nav nav-pills bg-main-color">
            <a class="nav-item nav-link text-white mr-3 rounded-0 nav-animation" href="index.php">MENU</a>
            <a class="nav-item nav-link text-white mr-3 rounded-0 nav-animation" href="gamesGrid.php">JUEGOS</a>
            <a class="nav-item nav-link text-white mr-3 rounded-0 nav-animation" href="index.php#scroll">ABOUT</a>
            <a class="nav-item nav-link text-white mr-3 rounded-0 nav-animation" href="contact.php">CONTACTO</a>
          </nav>
        </div>


        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 mt-auto mb-auto pr-4 d-block bg-main-color float-right">
          <nav class="navbar justify-content-end bg-main-color">
            <?php
              if(isset($_SESSION['user'])){
            ?>
            <select class="float-right">
                <option selected hidden><?php echo $_SESSION['user']['username']; ?></option>
                <option value="sydney">Perfil</option>
                <option value="melbourne">Cerrar sesión</option>
            </select>
            <?php
              }else{
            ?>
              <a class="boton float-right" href="register.php">Regístrate</a>
              <a class="boton boton-login float-right btn-animation" href="login.php">Iniciar Sesión
              </a>
            <?php
              }
            ?>

          </nav>
        </div>

      </div>
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