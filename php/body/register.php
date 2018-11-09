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

    <link rel="stylesheet" href="../../assets/css/registro.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   
</head>

<body>

    <div class="container">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title">Register</h5>
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
                </div>
            
                <div class="form-group row">                       
                    <button type="submit" name="" class="btn btn-primary col-12">Register</button> 
                </div>  

                <p>Already a member? <a href="login.php">Log In</a></p>
            </form>
        </div>
    </div>
</div>
       
</body>


</html>