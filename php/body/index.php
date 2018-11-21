<?php require_once "../templates/master.php" ?>

<?php startblock("titulo"); ?>
Index
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
          <h1>Pear Harbor</h1>
          <p>Revive el ataque militar de Japón contra Estados Unidos en una base naval en Hawaii. </p>
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

<div class="">
  <div class="container">
    <!-- START THE FEATURETTES -->
    <a name="scroll"></a>

    <h3 style="text-align: center; margin: 20px;">MEET OUR TEAM</h3>
    <div class="row featurette">
      <div class="col-md-7 m-auto">
        <h2 class="featurette-heading">Artur Alcoverro <span class="text-muted">It'll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. </p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="far fa-envelope"></i> artur.bcn1998@gmail.com</li>
          <li class="list-group-item"><i class="fab fa-linkedin"></i> Artur Alcoverro</li>
          <li class="list-group-item"><i class="fab fa-twitter-square"></i> @ArturAlcoverro</li>
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
        <h2 class="featurette-heading">Toni Altamirano
          <p><span class="text-muted">Prove yourself and Rise</span></p>
        </h2>
        <p class="lead">Programador back-end y front-end.</p>

        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="far fa-envelope"></i> mansoksama@gmail.com</li>
          <li class="list-group-item"><i class="fab fa-linkedin"></i> Toni Altamirano</li>
          <li class="list-group-item"><i class="fab fa-twitter-square"></i> @Mansok</li>
        </ul>

      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="/riddle_abp/assets/img/Toni_Avatar.jpeg"
          alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 m-auto">
        <h2 class="featurette-heading">Marc González <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
          semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
          commodo.</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="far fa-envelope"></i> marc.gonzalez.sds@gmail.com</li>
          <li class="list-group-item"><i class="fab fa-linkedin"></i> Marc González</li>
          <li class="list-group-item"><i class="fab fa-twitter-square"></i> </li>
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
        <h2 class="featurette-heading">Martí Soler <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
          semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
          commodo.</p>

        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="far fa-envelope"></i> emdicmarti@gmail.com</li>
          <li class="list-group-item"><i class="fab fa-linkedin"></i> Martí Soler</li>
          <li class="list-group-item"><i class="fab fa-twitter-square"></i></li>
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