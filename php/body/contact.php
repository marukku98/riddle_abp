<?php require_once "../templates/master.php" ?>

<link rel="stylesheet" href="/riddle_abp/assets/css/contact.css">

<?php startblock("titulo"); ?>
Contacto
<?php endblock(); ?>

<?php startblock("principal"); ?>

<div id="contacto" class="card col-lg-7 offset-lg-3 bg-light mb-2 mt-4 p-0">
  <!-- <a href="index.php"><img src="<?php echo $carpeta; ?>assets/img/icon.jpg" class="logo" width="50px" height="50px"></a>
  <p>No dudes en contactar con nosotros si tienes cualquier problema o duda.</p><br> -->
  
  <div class="card-header">
    <h3 class="text-center m-0 title-font">FORMULARIO DE CONTACTO</h3>
  </div>

  <div class="card-body p4 text-font">
    <form action="../conexion/correo.php" method="post">
      <div class="form-group">
        <label for="labelName">Nombre</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><span class="fa fa-user"></span></span>
            </div>
            <input type="text" class="form-control" id="InputName" name="name" placeholder="Tu nombre" required>
        </div>
      </div>
      <div class="form-group">
        <label for="labelEmail">Correo eletrónico</label>
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><span class="fa fa-at"></span></span>
            </div>
            <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Tu correo electrónico" required>
        </div>
      </div>
      <div class="form-group ">
        <label for="InputText">Mensaje</label>
        <textarea class="form-control autoExpand" name="message" min-rows="5" rows="4" placeholder="Mensaje a enviar..." required></textarea>
      </div>
      <div class="form-group mb-0">
        <input type="submit" class="btn btn-primary btnSubmit boton boton-login float-right" name="submit" value="Enviar Mensaje">
      </div>
    </form>
  </div>
  

</div>


<?php endblock(); ?>