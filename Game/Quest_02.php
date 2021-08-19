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
				<h1 class="display-5">Pergunta 02</h1>
			</div>
			
			<?php $obj = $MyList->findObject(1); ?>

			<?php
				if(array_key_exists('buttom', $_POST)) {
					wrongAnswer();
				}
				elseif (array_key_exists('buttomCorrect', $_POST)) {
					correctAnswer();
				}
				function correctAnswer() {
						header('location: Quest_03.php');
				}
				function wrongAnswer() {
					$_SESSION["prize"] = 500;
					header('location: playerOver.php');
				}
			?>

			<br/><h3 style="text-align: center;" class="display-5"><strong> <?php echo "$obj[1]";?> </strong></h3>

			<form method="post">

				<?php
					$divs = array('<div id="divFirst"><input type="submit" name="buttomCorrect" 
					class="btn btn-block btn btn-outline-primary" value= "'.$obj[2].'" /> <br/></div>',
					'<div id="divFirst"><input type="submit" name="buttom" 
					class="btn btn-block btn btn-outline-primary" value= "'.$obj[3].'" /> <br/></div>',
					'<div id="divFirst"><input type="submit" name="buttom" 
					class="btn btn-block btn btn-outline-primary" value= "'.$obj[4].'" /> <br/></div>',
					'<div id="divFirst"><input type="submit" name="buttom" 
					class="btn btn-block btn btn-outline-primary" value= "'.$obj[5].'" /> <br/></div>');

					shuffle($divs);
					
					echo $divs[0];
					echo $divs[1];
					echo $divs[2];
					echo $divs[3];
	
				?>

				<br/><br/>
				
			</form>

            <a href="../welcome.php" class="btn btn-block btn btn-outline-dark">Parar</a>
			<div id="prize">
			<h3><br> Acertar: R$ 5 Mil || Parar: R$ 1 Mil || Errar: R$ 500</h3>
			</div>

		</section>
	</main>
</body>
</html>