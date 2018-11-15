<?php session_start();?>
<?php require_once "../templates/user.php";?>

<?php startblock("titulo"); ?>
  Login
<?php endblock();?>

<?php startblock("principal"); ?>
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h4 class="card-title">Inicia sesión</h4><br>
                <form action="/riddle_abp/php/conexion/login.php" method="POST">
                    <div class="form-group row">
                        <input type="text" class="form-control col-12" placeholder="Email" name="email" id="email"
                            required>
                    </div>
                    <div class="form-group row">
                        <input type="password" class="form-control col-12" placeholder="Password" name="password" id="password" required>
                            <?php 
                            if(isset($_SESSION['error'])){
                                echo "<p class='text-danger ml-2' style='font-size: 0.75rem;'>*".$_SESSION['error']."<p>";
                                unset($_SESSION['error']);
                            }else{
                                echo "<p class='text-white' style='font-size: 0.75rem;'>.</p>";
                            }
                            ?>
                            
                    </div>
                    <div class="form-group row">
                        <button type="submit" name="" class="btn btn-primary col-12">Entrar</button>
                    </div>

                    <p>No tienes cuenta? <a href="register.php">Registrate!</a></p>
                </form>
            </div>
        </div>

<?php endblock(); ?>