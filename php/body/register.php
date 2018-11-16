<?php require_once "../templates/user.php" ?>

<?php startblock("titulo"); ?>
 Login
<?php endblock(); ?>

<?php startblock("principal"); ?>
   <div class="card" style="width: 20rem;">
       <div class="card-body">
           <h4 class="card-title">Crea tu cuenta</h4><br>

           <form action="/riddle_abp/php/conexion/register.php" method="POST">
               <div class="form-group row">                      
               <input type="text" class="form-control col-12"  placeholder="Username" name="username" id="Username" required>
               </div>

               <div class="form-group row">                      
                   <input type="email" class="form-control col-12"  placeholder="Email" name="email" id="email" required>
               </div>

                <div class="form-group row">                      
                   <input type="password" class="form-control col-12"  placeholder="Password" name="password" id="password" required>
                   <small id="password" class="form-text text-muted"> * Mínimo 6 carácteres</small>
               </div>

                <div class="form-group row">                      
                   <input type="password" class="form-control col-12"  placeholder="Repeat password" min="6" name="password2" id="password" required>
               </div><br>
               <div class="form-group row">                      
                   <button type="submit" name="insertarUser" class="btn btn-primary col-12">Registrate</button>
               </div> 

               <p>Ya tienes cuenta? <a href="login.php">Inicia sesión.</a></p>
           </form>
       </div>
   </div>
<?php endblock(); ?>



