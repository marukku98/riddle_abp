<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>       
    Riddle
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/login_register.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   
</head>

<body class="my-auto">
<a href="index.php"><img src="assets/title.png" class="title" ></a>


    <div class="container">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h4 class="card-title">Crea tu cuenta</h4><br>
            <form action="" method="POST">
                <div class="form-group row">                       
                <input type="text" class="form-control col-12"  placeholder="Username" name="Username" id="Username" required>
                </div>

                <div class="form-group row">                       
                    <input type="text" class="form-control col-12"  placeholder="Email" name="email" id="email" required>
                </div>

                 <div class="form-group row">                       
                    <input type="password" class="form-control col-12"  placeholder="Password" name="password" id="password" required>
                </div>

                 <div class="form-group row">                       
                    <input type="password" class="form-control col-12"  placeholder="Repeat password" name="password" id="password" required>
                </div><br>
            
                <div class="form-group row">                       
                    <button type="submit" name="" class="btn btn-primary col-12">Registrate</button> 
                </div>  

                <p>Ya tienes cuenta? <a href="login.php">Inicia sesión.</a></p>
            </form>
        </div>
    </div>
</div>
       
</body>


</html>