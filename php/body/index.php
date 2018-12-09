<?php require_once "../templates/master.php" ?>

<?php startblock("titulo"); ?> Index
<?php endblock(); ?>

<?php startblock("principal"); ?>
</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators" styel="z-index: -1;">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" style="z-index: -1;">
      <img class="d-block w-100 slide" src="/riddle_abp/assets/img/bg-game.jpg" alt="First slide">
      <div class="container">
        <div class="carousel-caption text-left">
          <h1 class="title-font title-corousel">PEARL HARBOR</h1>
          <p class="text-font text-corousel">Revive el ataque militar de Japón contra Estados Unidos en una base naval en Hawaii.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item" style="z-index: -1;">
      <img class="d-block w-100 slide" src="/riddle_abp/assets/img/proximamente.png" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
        </div>
      </div>
    </div>
    <div class="carousel-item" style="z-index: -1;">
      <img class="d-block w-100 slide" src="/riddle_abp/assets/img/proximamente.png" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container mt-5 mb-5">
  <div class="row text-center text-font">
    <div class="col-lg-4">
      <img class="rounded-circle" src="/riddle_abp/assets/img/diviertete.png" alt="Generic placeholder image"
        width="140" height="140">
      <h2 class="title-font mt-3">Diviertete</h2>
      <p>Disfruta de nuestros juegos únicos y familiares. Entreteneos investigando como resolver nuestros enigmas
      de la forma más eficaz posible. Serás capaz de completarlos todos?</p>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="rounded-circle" src="/riddle_abp/assets/img/aprendee.png" alt="Generic placeholder image"
        width="140" height="140">
      <h2 class="title-font mt-3">Aprende</h2>
      <p>Conoce los acontecimientos más relevantes de la historia con nuestros enigmas. Infórmate de cuando, donde y porque sucedió cada hecho.
      Todo de una forma muy fácil y senzilla, simplemente mientras juegas. </p>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="rounded-circle" src="/riddle_abp/assets/img/compartee.png" alt="Generic placeholder image"
        width="140" height="140">
      <h2 class="title-font mt-3">Comparte</h2>
      <p>Comparte con tus amigos y familiares la experencia que has tenido con nuestros juegos. Anímalos a prender nuevos hechos mientras pasan un buen rato.
     </p>
    </div>
    <!-- /.col-lg-4 -->
  </div>
</div>

<a name="scroll"></a>

<h3 class="title-font header bg-second" style="text-align: center;">Sobre nosotros</h3>

<div class="container">
  <!-- START THE FEATURETTES -->

  <div class="row featurette">
    <div class="col-md-7 m-auto">
      <h2 class="featurette-heading title-font">Artur Alcoverro
        <span class="text-muted">senpai.</span>
      </h2>
      <p class="lead text-font">Donec ullamcorper nulla non metus auctor fringilla. </p>
      <ul class="list-group list-group-flush text-font">
        <li class="list-group-item">
          <i class="far fa-envelope"></i> artur.bcn1998@gmail.com</li>
        <li class="list-group-item">
          <i class="fab fa-linkedin"></i> Artur Alcoverro</li>
        <li class="list-group-item">
          <i class="fab fa-twitter-square"></i> @ArturAlcoverro</li>
      </ul>

    </div>
    <div class="col-md-5">
      <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="/riddle_abp/assets/img/Artur_Avatar.png"
        alt="Generic placeholder image">
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2 m-auto">
      <h2 class="featurette-heading title-font">Toni Altamirano
        <p>
          <span class="text-muted">Prove yourself and Rise</span>
        </p>
      </h2>
      <p class="lead text-font">Programador back-end y front-end.</p>

      <ul class="list-group list-group-flush text-font">
        <li class="list-group-item">
          <i class="far fa-envelope"></i> mansoksama@gmail.com</li>
        <li class="list-group-item">
          <i class="fab fa-linkedin"></i> Toni Altamirano</li>
        <li class="list-group-item">
          <i class="fab fa-twitter-square"></i> @Mansok</li>
      </ul>

    </div>
    <div class="col-md-5 order-md-1">
      <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="/riddle_abp/assets/img/Toni_Avatar.png"
        alt="Generic placeholder image">
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 m-auto">
      <h2 class="featurette-heading title-font">Marc González
        <span class="text-muted">Checkomeito.</span>
      </h2>
      <p class="lead text-font">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo
        cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.
      </p>
      <ul class="list-group list-group-flush text-font">
        <li class="list-group-item">
          <i class="far fa-envelope"></i> marc.gonzalez.sds@gmail.com</li>
        <li class="list-group-item">
          <i class="fab fa-linkedin"></i> Marc González</li>
        <li class="list-group-item">
          <i class="fab fa-twitter-square"></i>
        </li>
      </ul>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-fluid mx-auto" src="/riddle_abp/assets/img/Marc_Avatar.png" data-src="holder.js/500x500/auto"
        alt="Generic placeholder image">
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2 m-auto">
      <h2 class="featurette-heading title-font">Martí Soler
        <span class="text-muted">See for yourself.</span>
      </h2>
      <p class="lead text-font">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo
        cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.
      </p>

      <ul class="list-group list-group-flush text-font">
        <li class="list-group-item">
          <i class="far fa-envelope"></i> emdicmarti@gmail.com</li>
        <li class="list-group-item">
          <i class="fab fa-linkedin"></i> Martí Soler</li>
        <li class="list-group-item">
          <i class="fab fa-twitter-square"></i>
        </li>
      </ul>

    </div>
    <div class="col-md-5 order-md-1">
      <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="/riddle_abp/assets/img/Marti_Avatar.png"
        alt="Generic placeholder image">
    </div>
  </div>
</div>

<!-- /END THE FEATURETTES -->
<?php endblock(); ?>