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
				<h1 class="display-5">Pergunta 06</h1>
			</div>
			
			<?php $obj = $MyList->findObject(5); ?>

			<?php
				if(array_key_exists('buttom', $_POST)) {
					$_SESSION["prize"] = 150000;
					header('location: playerOver.php');
				}
				elseif (array_key_exists('buttomCorrect', $_POST)) {
					header('location: Quest_07.php');
				}
				elseif (array_key_exists('parar', $_POST)) {
					$_SESSION["prize"] = 300000;
					header('location: playerStop.php');
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

					echo "<br/><br/>";
					echo '<input type="submit" name="parar" class="btn btn-block btn btn-outline-dark" value="Parar">';
	
				?>

				<br/><br/>
				
			</form>

			<div id="prize">
			<h3><br> Acertar: R$ 500 Mil || Parar: R$ 300 Mil || Errar: R$ 150 Mil</h3>
			</div>

		</section>
	</main>
</body>
</html>