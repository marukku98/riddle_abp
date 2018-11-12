<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Riddle
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">    
    <script src="../../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>  -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/login_register.css">

</head>

<body>
<a href="index.php"><img src="assets/title.png" class="title" ></a>

    <div class="container">

        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h4 class="card-title">Inicia sesión</h4><br>
                <form action="" method="POST">
                    <div class="form-group row">
                        <input type="text" class="form-control col-12" placeholder="Email" name="email" id="email"
                            required>
                    </div>
                    <div class="form-group row">
                        <input type="password" class="form-control col-12" placeholder="Password" name="password" id="password"
                            required>
                    </div>
                    <br>
                    <div class="form-group row">
                        <button type="submit" name="" class="btn btn-primary col-12">Entrar</button>
                    </div>

                    <p>No tienes cuenta? <a href="register.php">Registrate!</a></p>
                </form>
            </div>
        </div>
    </div>

</body>


</html>