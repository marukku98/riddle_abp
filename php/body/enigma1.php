<?php require_once "../templates/master.php" ?>

<script src="/riddle_abp/assets/js/cookies.js"></script>
<script src="/riddle_abp/assets/js/jquery-ui.js"></script>
<script src="/riddle_abp/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="/riddle_abp/assets/js/enigma1.js"></script>

<?php startblock("titulo"); ?>
Enigma 1
<?php endblock(); ?>

<?php
if(!isset($_SESSION['user'])){
	$_SESSION['lastPage'] = $_POST['lastpage'];
	$_SESSION['lvl'] = '1';
	header('Location: /riddle_abp/php/body/login.php');
}else{
	// $_SESSION['progres'] = '1';
    // header('Location: /riddle_abp/php/conexion/progres.php');
}
 ?>

<?php startblock("principal"); ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma1.css">

<body>

	<div class="total">
		<div class="container first">

			<h3 class="japan-font">La guerra de Pearl Harbor</h3>

			<p class="font-letter">El ataque a Pearl Harbor fue una ofensiva militar sorpresa efectuada por la Armada Imperial Japonesa
				contra la base naval de los Estados Unidos en Pearl Harbor (Hawái) en la mañana del domingo 7 de
				diciembre de 1941. El ataque pretendía ser una acción preventiva destinada a evitar la intervención de
				la Flota del Pacífico de los Estados Unidos en las acciones militares que el Imperio del Japón estaba
				planeando realizar en el Sureste Asiático contra
				las posesiones ultramarinas del Reino Unido, Francia, Países Bajos y Estados Unidos. </p>

			<div class="planify">
				<h3 class="japan-font">Plan de ataque</h3>

				<p class="font-letter">El Almirante Isoroku Yamamoto a causa de una enfermedad no podrá dirigir el ejército de japón contra la
					guerra a EE.UU. Por eso tu, el
					capitán Genda, te ha ordenado liderar el ataque y llevar a Japón a la victoria, todos dependen de ti!</p>

				<p class="font-letter">Esta es la carta que te ha dejado el almirante: </p>		

				<button class="btn btn-secondary btn-sm carta" data-toggle="modal" data-target="#exampleModaal">Leer carta del almirante</button><br><br>
			</div>
			<button type="button" class="btn btn-primary btn-sm" id="step">Resolver mapas</button>
		</div> 


		<!-- Modal -->
		<div class="modal fade" id="exampleModaal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content bg-transparent border-0">				
					<div class="modal-body">
						<div class="container mw-100 col-xl-12 col-md-8 col-sm-4 mx-auto" id="contain" style="display:none;">
						<section id="content" class="col">
							<form action="">
							<h6>Carta del almirante Yamamoto al capitán Genda pidiéndole que estudie la viabilidad de un ataque
									aéreo a Pearl Harbor.</h6>						
								Febrero de 1941.
								Dependiendo de los cambios que se produzcan en la situación internacional, podríamos vernos
								arrastrados a luchar con Estados Unidos. Si Japón y Estados Unidos fueran a la guerra, tendríamos
								que recurrir a una táctica radical… Deberíamos intentar, con toda la fuerza de nuestras Primera y
								Segunda Divisiones Aéreas, asestar un golpe a la flota estadounidense en Hawái, de forma, que
								durante un tiempo, Estados Unidos no pudiera avanzar hacia el Pacífico occidental. Nuestro objetivo
								sería un grupo de acorazados estadounidenses… No sería fácil llevar a cabo algo así. Pero estoy
								decidido a darlo todo para realizar este plan, supervisando yo mismo las divisiones aéreas. Me
								gustaría que investigara pormenorizadamente la viabilidad de un plan de estas características.
							</form>	
						</section>	
						</div>
					</div>			
				</div>
			</div>
		</div>
	</div> 

	<div class="mapa">

		<h3 class="japan-font">Mapa de la zona de guerra</h3>
		<p class="font-letter">Desencripta los mapas que te ha enviado el Contraalmirante Takijiro Onishi, para poder situaros y reconocer
		la zona!</p>
		<button class="btn btn-info fas fa-exclamation-circle" type="button" data-toggle="modal" data-target="#reglasModal"> Reglas</button>
		<button class="btn btn-success far fa-play-circle" type="button" id="play"> Jugar</button>

		<!-- Puzzle -->
		<div id="engima1">
			<div id="panelJuego" class="font-letter">
				<h3 id="imgTitle font-letter" class="japan-font">Reorganizando los mapas</h3>
				<div id="contadorMov">
					<div>Movimientos:</div>
					<div class="movimientos">0</div>
				</div>
				<div id="timeBox">
					<div>Tiempo:</div> 
					<div id="number">0</div> seg
                </div>				   
				<div class="animation">
					<div class="gif">			
						</div>
					<div class="puzzle">					
						<ul id="puzzGame" class="puzzGame"></ul>
					</div>
					
				</div>

			</div>
			
			<div class="next">
				<button id="newPhoto" type="button" class="btn btn-dark">Siguiente</button>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="pistaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Pista</h5>
						</div>
						<div class="modal-body font-letter">
							La rosa de los vientos tiene que quedar abajo a la izquierda del mapa
						</div>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="pistaModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title font-letter" id="exampleModalLabel">Pista</h5>
						</div>
						<div class="modal-body font-letter">
							La liena divisoria tiene que quedar a la mitad
						</div>
					</div>
				</div>
			</div>

				<!-- Modal -->
			<div class="modal fade" id="correcte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title font-letter" id="exampleModalLabel">Correcte</h5>
						</div>
						<div class="modal-body">
							Ya puedes pasar al puzzle final!
						</div>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="finalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Correcto!</h5>
						</div>
						<div class="modal-body">
							Enhorabuena, has completado el juego! Ya puedes pasar a la siguiente pantalla para el 2 nivel.
						</div>
						<div class="modal-footer">
						<form action="/riddle_abp/php/conexion/progres.php" method="POST">
							<input type="text" name="game" value="1" style="visibility:hidden;">
							<input type="text" name="enigma" value="1" style="visibility:hidden;">
							<button type="submit" id="success" class="btn btn-secondary btn-sm" name="completed" >Continuar</button>
						</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal pistas -->
			<div class="modal fade" id="reglasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title font-letter" id="exampleModalLabel">Reglas del juego</h1>
						</div>
						<div class="modal-body">
							<ul class="list-group list-group-flush font-letter">
								<li class="list-group-item">Hay un total de dos mapas por desencriptar.</li>
								<li class="list-group-item">Uno de los mapas está encriptado de 3x3 y otro tiene más seguridad y es de 4x4.</li>
								<li class="list-group-item">Uno de ellos está programado para que en x tiempo se reinicie si tardas mucho en 
								desencriptarlo. ¿Eres lo suficientemente rápido?</li>
								<li class="list-group-item">Arrastra las piezas para intercambiarlas y resolver el puzzle!</li>						
							</ul>
						</div>
						<div class="modal-footer">
							<button type="button" id="dismiss" class="btn btn-secondary btn-sm" name="completed" data-dismiss="modal">Aceptar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- container -->
</body>

<?php endblock(); ?>

<script type="text/javascript">

	
</script>