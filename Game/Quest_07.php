<?php

	session_start();

	require_once '../config/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jogo</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<link rel="shortcut icon" href="../img/12130brain_109577.ico" />
	<style>
        .wrapper{ 
        	width: 1400px; 
        	padding: 60px; 
        }
        .wrapper h1 {text-align: center}
        .wrapper form .form-group span {color: red;}
		#prize {
			text-align: center;
		}
	</style>
</head>
<body>
	<main>
		<section class="container wrapper">
			<div class="page-header">
				<h1 class="display-5">Pergunta 07</h1>
			</div>

			<?php

				if ($_SERVER['REQUEST_METHOD'] === 'POST') {

					foreach ($_POST as $key => $value) {
						$_SESSION["key"] = $key;
						$_SESSION["value"] = $value;
					}

					if(array_key_exists('buttom', $_POST)) {
						$_SESSION["prize"] = 0;
						header('location: playerOver.php');
					}
					elseif (array_key_exists('buttomCorrect', $_POST)) {
						$_SESSION["prize"] = 1000000;
						header('location: playerWin.php');
					}
					elseif (array_key_exists('parar', $_POST)) {
						$_SESSION["prize"] = 500000;
						header('location: playerStop.php');
					}

					if ($_SESSION["value"] === 'Denunciar') {
						$_SESSION["denounces_from_where"] = 7;
						header('location: ../questions_operations/denounce_quest.php');
					}

				}
			?>

			<br/><h3 style="text-align: center;" class="display-5"><strong> <?php echo $_SESSION["quest_7"][1];?> </strong></h3>

			<form method="post">

				<?php

					$_SESSION['n_respostas'] = 6;

					if (array_key_exists('elimina', $_POST)) {

						$_SESSION["elimina_alternativas"] = 1;

						$divs = array('<div id="divFirst"><input type="submit" name="buttomCorrect" 
						class="btn btn-block btn btn-outline-primary" value= "'.$_SESSION["quest_7"][2].'" /> <br/></div>',
						'<div id="divFirst"><input type="submit" name="buttom" 
						class="btn btn-block btn btn-outline-primary" value= "'.$_SESSION["quest_7"][3].'" /> <br/></div>');

						shuffle($divs);

						echo $divs[0];
						echo $divs[1];
						
					}
					else {

						$divs = array('<div id="divFirst"><input type="submit" name="buttomCorrect" 
						class="btn btn-block btn btn-outline-primary" value= "'.$_SESSION["quest_7"][2].'" /> <br/></div>',
						'<div id="divFirst"><input type="submit" name="buttom" 
						class="btn btn-block btn btn-outline-primary" value= "'.$_SESSION["quest_7"][3].'" /> <br/></div>',
						'<div id="divFirst"><input type="submit" name="buttom" 
						class="btn btn-block btn btn-outline-primary" value= "'.$_SESSION["quest_7"][4].'" /> <br/></div>',
						'<div id="divFirst"><input type="submit" name="buttom" 
						class="btn btn-block btn btn-outline-primary" value= "'.$_SESSION["quest_7"][5].'" /> <br/></div>');

						shuffle($divs);

						echo $divs[0];
						echo $divs[1];
						echo $divs[2];
						echo $divs[3];
					}

					if ($_SESSION["elimina_alternativas"] === 0) {
						echo '<input type="submit" name="elimina" class="btn btn-block btn-outline-warning"value="Eliminar duas Alternativas">';
					}

					echo "<br/><br/>";
					echo '<input type="submit" name='.$_SESSION["quest_7"][0].' class="btn btn-block btn btn-outline-danger" value="Denunciar">';

					echo "<br/><br/><br/>";
					echo '<input type="submit" name="parar" class="btn btn-block btn btn-outline-dark" value="Parar">';
	
				?>
				
			</form>

			<div id="prize">
			<h3><br> Acertar: R$ 1 Milhão || Parar: R$ 500 Mil || Errar: R$ 0</h3>
			</div>

		</section>
	</main>
</body>
</html>