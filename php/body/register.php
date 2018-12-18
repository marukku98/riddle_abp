<?php session_start();
 require_once "../templates/user.php" ?>

<?php startblock("titulo"); ?>
Registro
<?php endblock(); ?>

<?php startblock("principal"); ?>
<div class="card text-font" style="width: 20rem;">
    <div class="card-body">
        <h4 class="card-title title-font">Crea tu cuenta</h4>


        <?php 
            if(isset($_SESSION['error'])){
                $error=true;
                echo "<p class='error mb-1 ml-1'>".$_SESSION['error']."</p>";
                unset($_SESSION['error']);
            }
            else{
                echo '</br>';
            }
        ?>

        <form action="/riddle_abp/php/conexion/register.php" method="POST">
            <div class="form-group row">
                <?php 
                    if(isset($_SESSION['errorUsername'])){
                    echo '<input type="text" class="form-control col-12" placeholder="Username" value="'.$_SESSION["errorUsername"].'" name="username" id="Username"
                        required>';
                
                    unset($_SESSION['errorUsername']);
                    }else{
                        echo '<input type="text" class="form-control col-12" placeholder="Username" name="username" id="Username"
                        required>';
                    }
                ?>
            </div>

            <div class="form-group row">
                <?php 
                    if(isset($_SESSION['errorEmail'])){
                        echo '<input type="text" class="form-control col-12" placeholder="Email" value="'.$_SESSION['errorEmail'].'" name="email" id="email" required>';
                        unset($_SESSION['errorEmail']);
                    }else{
                        echo '<input type="text" class="form-control col-12" placeholder="Email" name="email" id="email" required>';
                    }
                ?>
            </div>

            <div class="form-group row">
                <input type="password" class="form-control col-12" placeholder="Password" name="password" id="password"
                    required>
            </div>

            <div class="form-group row">
                <input type="password" class="form-control col-12" placeholder="Repeat password" name="password2" id="password"
                    required>
            </div><br>
            <div class="form-group row">
                <button type="submit" name="insertarUser" class="btn btn-primary col-12 boton boton-login">Registrate</button>
            </div>

            <p class="text-center">Ya tienes cuenta? <a href="login.php">Inicia sesión.</a></p>
        </form>
    </div>
</div>
<?php endblock(); ?>