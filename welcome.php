<?php

	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: index.php');
		exit;
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show do Milhão</title>
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
				<h1 class="display-5">Bem Vindo ao Show do Milhão <?php echo $_SESSION['nickname']; ?></h1>
			</div>

			<a href="./Game/init.php" class="btn btn-block btn btn-outline-success">Jogar</a>
			<a href="edit_account.php" class="btn btn-block btn-outline-warning">Editar Conta</a>
			<a href="question_board.php" class="btn btn-block btn btn-outline-info">Painel de Perguntas</a>
			<a href="ranking.php" class="btn btn-block btn btn btn-outline-primary" >Hall da Fama</a>
			<a href="logout.php" class="btn btn-block btn-link bg-light" href="welcome.php">Deslogar</a>

		</section>
	</main>
</body>
</html>