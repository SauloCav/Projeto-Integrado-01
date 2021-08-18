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
			
			<?php $MyList->PrintList(1); ?>
			<a href="Quest_03.php" class="btn btn-block btn btn-outline-success">Proximo</a>
            <a href="../welcome.php" class="btn btn-block btn-link bg-light">Parar</a>
			<div id="prize">
			<h3><br> Acertar: R$ 5 Mil || Parar: R$ 1 Mil || Errar: R$ 500</h3>
			</div>

		</section>
	</main>
</body>
</html>