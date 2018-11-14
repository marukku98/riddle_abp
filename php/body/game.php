<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Riddle
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/riddle_abp/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/riddle_abp/assets/css/game.css">
    <script src="/riddle_abp/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/riddle_abp/assets/js/popper.min.js"></script>
    <script src="/riddle_abp/assets/js/bootstrap.min.js"></script>

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
                    <h5>
                        <a class="text-white" href="login.php">Iniciar Sesion</a>
                    </h5>
                </a>
                <div class="vertical-divider"></div>
                <a class="navbar-brand">
                    <h5>
                        <a class="text-white" href="register.php">Registrate</a>
                    </h5>
                </a>
            </div>
        </nav>

        <div id="navigation">
            <nav class="navbar navbar-expand-lg navbar-light py-1" style="background-color: #45B8D2;">
                <div class="navbar-collapse collapse navbars" id="navbar2">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link col-2 text-white" href="">MENU</a>
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

    <div class="container title">
        <h2>Attack on Pearl Harbor</h2>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">

                <a href="enigma1.php">
                <div class="game">
                    <div class="gameText">
                        <h5 class="m-0">Nivel 1</h5>
                        <p>Preparativos para la batalla</p>
                    </div>
                </div>
                </a>

            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
                <div class="game lockedImg">
                    <div class="gameText">
                        <h5 class="m-0">Nivel 2</h5>
                        <p>Primera oleada</p>
                    </div>
                    <div class="lockHover"></div>

                </div>

            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
                <div class="game lockedImg">
                    <div class="gameText">
                        <h5 class="m-0">Nivel 3</h5>
                        <p>Segunda oleada</p>
                    </div>
                    <div class="lockHover"></div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
                <div class="game lockedImg">
                    <div class="gameText">
                        <h5 class="m-0">Nivel 4</h5>
                        <p>Las consequencias</p>
                    </div>
                    <div class="lockHover"></div>

                </div>
            </div>

        </div>
    </div>






</body>

</html>