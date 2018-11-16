<?php require_once "../templates/master.php" ?>

<link rel="stylesheet" href="/riddle_abp/assets/css/contact.css">

<?php startblock("titulo"); ?>
Index
<?php endblock(); ?>

<?php startblock("principal"); ?>

<div class="container">    
  <form>
    <div class="form-group">
      <label for="labelName">Nombre</label>
      <input type="text" class="form-control" id="InputName" name="name" placeholder="Tu nombre" required>
    </div>
    <div class="form-group">
      <label for="labelEmail">Correo eletrónico</label>
      <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Tu correo electrónico" required>
    </div>
    <div class="form-group ">
      <label for="InputText">Mensaje</label>
      <textarea class="form-control autoExpand" name="message" min-rows="5" placeholder="Mensaje a enviar..." required></textarea>
    </div>
    <div class="enter">
      <input type="submit" class="btn btn-default btnSubmit" name="submit" value="Enviar Mensaje">
    </div>
   
  </form>

</div>


<?php endblock(); ?>