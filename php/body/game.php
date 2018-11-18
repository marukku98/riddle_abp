<?php require_once "../templates/master.php" ?>


<?php startblock("titulo"); ?>
  Joc
<?php endblock(); ?>

<?php startblock("css"); ?>
    <link rel="stylesheet" href="/riddle_abp/assets/css/game.css">
    <link rel="stylesheet" href="/riddle_abp/assets/css/play-animation.css">
<?php endblock(); ?>

<?php startblock("principal"); ?>

    <div class="container title">
        <h2>Attack on Pearl Harbor</h2>
    </div>
<div class="row">

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
    <a href="enigma1.php">
    <div class="game">
        <div class="div-text gameText">
            <h5 class="text m-0">Nivel 1</h5>
            <p>Preparativos para la batalla</p>
        </div>
            <div class="game-button play-animation mt-3"></div>

    </div>
    </a>
</div>

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
    <div class="game lockedImg">
        <div class="gameText">
            <h5 class="m-0">Nivel 2</h5>
            <p>Primera oleada</p>
        </div>
        <div class="lockHover"></div>

    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
    <div class="game lockedImg">
        <div class="gameText">
            <h5 class="m-0">Nivel 3</h5>
            <p>Segunda oleada</p>
        </div>
        <div class="lockHover"></div>

    </div>
</div>

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
    <div class="game lockedImg">
        <div class="gameText">
            <h5 class="m-0">Nivel 4</h5>
            <p>Las consequencias</p>
        </div>
        <div class="lockHover"></div>
</div>






</body>

</div>
<?php endblock(); ?>