<?php require_once "../templates/master.php" ?>

<link rel="stylesheet" href="/riddle_abp/assets/css/gamesGrid.css">

<?php startblock("titulo"); ?>
  Grid
<?php endblock(); ?>

<?php startblock("principal"); ?>
<div class="container">
        <div class="row">

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 p-3">
                <div class="card rounded-0">
                    <img class="card-img-top rounded-0" src="/riddle_abp/assets/img/picGame1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Ataque a Pearl Harbor</h5>
                        <p class="card-text">Revive el ataque militar de Japón contra Estados Unidos en una base naval en Hawaii.</p>
                        <a href="game.php" class="btn btn-primary float-right">Comenzar</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 p-3">
                <div class="card rounded-0">
                    <img class="card-img-top" src="/riddle_abp/assets/img/picGame1.jpg" alt="Card image cap">
                    <div class="card-body p-0">
                        <h5 class="card-title next m-0">Próximamente</h5>                        
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 p-3">
                <div class="card rounded-0">
                    <img class="card-img-top" src="/riddle_abp/assets/img/picGame1.jpg" alt="Card image cap">
                    <div class="card-body p-0">
                        <h5 class="card-title next m-0">Próximamente</h5>        
                    </div>
                </div>
            </div>
            <div class="col-xl-4    col-lg-4 col-md-6 col-sm-12 p-3">
                <div class="card rounded-0">
                    <img class="card-img-top" src="/riddle_abp/assets/img/picGame1.jpg" alt="Card image cap">
                    <div class="card-body p-0">
                        <h5 class="card-title next m-0">Próximamente</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php endblock(); ?>