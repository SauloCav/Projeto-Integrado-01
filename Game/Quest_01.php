<?php

	session_start();

	include 'linked_list.php';

	require_once '../config/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jogo</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
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
				<h1 class="display-5">Pergunta 01</h1>
			</div>

			<?php $obj = $MyList->findObject(0); ?>

			<?php
				if(array_key_exists('buttom', $_POST)) {
					wrongAnswer();
				}
				elseif (array_key_exists('buttomCorrect', $_POST)) {
					correctAnswer();
				}
				function correctAnswer() {
						header('location: Quest_02.php');
				}
				function wrongAnswer() {
					header('location: playerOver.php');
				}
			?>

			<h5 class="display-5">Id da Questão: <?php echo "$obj[0]";?> </h5>
			<h3 style="text-align: center;" class="display-5"><strong> <?php echo "$obj[1]";?> </strong></h3>

			<form method="post">
				<input type='submit' name='buttomCorrect' 
					class='btn btn-block btn-outline-warning' value= '<?php echo "$obj[2]";?>' />
				<input type='submit' name='buttom' 
					class='btn btn-block btn btn-outline-info' value= '<?php echo "$obj[3]";?>' />
				<input type='submit' name='buttom' 
					class='btn btn-block btn btn btn-outline-primary' value= '<?php echo "$obj[4]";?>' />
				<input type='submit' name='buttom' 
					class='btn btn-block btn btn-outline-dark' value= '<?php echo "$obj[5]";?>' /> <br/><br/>
			</form>

			<a href="Quest_02.php" class="btn btn-block btn btn-outline-success">Proximo</a>
            <a href="../welcome.php" class="btn btn-block btn-link bg-light">Parar</a>
			<div id="prize">
			<h3><br> Acertar: R$ 1 Mil || Parar: R$ 0 || Errar: R$ 0</h3>
			</div>

		</section>
	</main>
</body>
</html>