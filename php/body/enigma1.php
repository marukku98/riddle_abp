<?php require_once "../templates/master.php" ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma1.css">
<script src="/riddle_abp/assets/js/jquery-ui.js"></script>
<script src="/riddle_abp/assets/js/enigma1.js"></script>

<?php startblock("titulo"); ?>
Enigma 1
<?php endblock(); ?>

<?php startblock("principal"); ?>

<body>

	<div class="total">
		<div class="container first">

			<h3>La guerra de Pear Harbor</h3>

			<p>El ataque a Pearl Harbor fue una ofensiva militar sorpresa efectuada por la Armada Imperial Japonesa
				contra la base naval de los Estados Unidos en Pearl Harbor (Hawái) en la mañana del domingo 7 de
				diciembre de 1941. El ataque pretendía ser una acción preventiva destinada a evitar la intervención de
				la Flota del Pacífico de los Estados Unidos en las acciones militares que el Imperio del Japón estaba
				planeando realizar en el Sureste Asiático contra
				las posesiones ultramarinas del Reino Unido, Francia, Países Bajos y Estados Unidos. </p>

			<h3>Plan de ataque</h3>

			<p>El Almirante Isoroku Yamamoto a causa de una enfermedad no podrá dirigir el ejército de japón contra la
				guerra a EE.UU. Por eso tu, el
				capitán Genda, te ha ordenado liderar el ataque y llevar a Japón a la victoria, todos dependen de ti!</p>

			<p>Esta es la carta que te ha dejado el almirante</p>

			<button class="btn btn-secondary btn-sm carta">Leer carta del almirante</button><br><br>

		</div>


		<div class="container" id="contain" style="display:none;">
			<section id="content">
				<form action="">
					<h3>Carta del almirante Yamamoto al capitán Genda pidiéndole que estudie la viabilidad de un ataque
						aéreo a Pearl Harbor.</h3>
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
				<!-- form -->

			</section>
			<!-- content -->
			<button class="btn btn-success bt-sm" id="hide" style="float:right;">Leído</button>
		</div>

		<div class="form-row">
			<div id="uno"><img src="/riddle_abp/assets/img/1speeach1.png" alt="Error" height="300px"></div>

			<div id="2" style="float:right;"><img src="/riddle_abp/assets/img/speeach2.png" alt="Error" height="390px"></div>
		</div>
		<div class="container contBtn">
			<button class="btn btn-info btnMapa">Estudiar mapa</button>
		</div>


	</div>

	<div class="mapa">

		<h3>Mapa de la zona de guerra</h3>
		<p>Resuelve el puzzle del mapa de la isla de Hawaii para poder planificar el ataque!</p>

		<!-- Puzzle -->
		<div id="collage">
			<div id="playPanel" style="padding:5px;display:none;">
				<h3 id="imgTitle"></h3>
				<hr />
				<div id="stepBox">
					<div>Steps:</div>
					<div class="stepCount">0</div>
				</div>
				<div style="display:inline-block; margin:auto; width:95%; vertical-align:top;">
					<ul id="sortable" class="sortable"></ul>
				</div>
			</div>

			<!-- Cuando ganas -->
			<div id="gameOver" style="display:none;">
				<div style="background-color: #fc9e9e; padding: 5px 10px 20px 10px; text-align: center; ">
					<h2 style="text-align:center">Completado!!</h2>
					<br /> Lo has resuelto<br />
					wn <span class="stepCount">0</span> pasos.
					<br /><br />
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="pistaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pista</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				La rosa de los vientos tiene que quedar abajo a la izquierda del mapa
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
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Enhorabuena, has completado el puzzle! Ya puedes pasar a la siguiente pantalla para el 2 nivel.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>				
			</div>
			</div>
		</div>
		</div>

	</div>
	<!-- container -->
</body>

<?php endblock(); ?>

<script type="text/javascript">

	$(document).ready(function () {
		$("#uno").hide();
		$("#2").hide();
		$(".btnMapa").hide();
		$(".mapa").hide();
		$(".content").hide();

		$(".carta").click(function () {
			$("#contain").fadeIn(1000); //$("#contain").slideDown(1000);
		});

		$("#hide").click(function () {
			$("#contain").hide(1000);
			$(".first").hide(1000);
			$("#uno").fadeIn();

			var miVar = setInterval(function () { callback2() }, 2000);
			var miVar2 = setInterval(function () { callback3() }, 5000);
		});

		function callback2() {
			$("#2").fadeIn(3000);
		}
		function callback3() {
			$(".btnMapa").show();
		}

		$(".btnMapa").click(function () {
			$(".total").hide(1000);
			$(".mapa").hide();
			$(".mapa").fadeIn(1000);
		});

		$(".puzzlee").click(function () {
			$(".content").fadeIn(1000);
		});
	});

	var images = [
		{ src: '/riddle_abp/assets/img/hawaii3.jpg', title: 'Mapa de Hawaii' }
	];
	$(function () {
		imagePuzzle.startGame(images, 3); // 3 size                       
	});

	/*    setTimeout(function(){
	if(fin){
			alert("LO RESOLVISTE COMPADRE!!")
		}
	},600);
	*/


</script>