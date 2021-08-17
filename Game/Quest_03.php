<?php

	session_start();

	include 'linked_list.php';

	require_once '../config/config.php';

	$MyList->PrintList(2);

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
	</style>
</head>
<body>
	<main>
		<section class="container wrapper">
			<div class="page-header">
				<h1 class="display-5">03 <?php echo $_SESSION['nickname']; ?></h1>
			</div>

			<a href="Quest_04.php" class="btn btn-block btn btn-outline-success">04</a>
            <a href="playerOver.php" class="btn btn-block btn btn-outline-success">Derrota</a>
            <a href="playerWin.php" class="btn btn-block btn btn-outline-success">Vitória</a>
            <a href="../welcome.php" class="btn btn-block btn-link bg-light">Sair</a>

		</section>
	</main>
</body>
</html>