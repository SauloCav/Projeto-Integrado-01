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
        	width: 800px; 
        	padding: 20px; 
        }
        .wrapper h1 {text-align: center}
        .wrapper form .form-group span {color: red;}
	</style>
</head>
<body>
	<main>
		<section class="container wrapper">
			<div class="page-header">
				<h1 class="display-5">Bem Vindo ao Show do Milhão <?php echo $_SESSION['username']; ?></h1>
				<h1 class="display-5">Seu Nickname: <?php echo $_SESSION['nickname']; ?></h1>
			</div>

			<a class="btn btn-block btn btn-outline-success" href="welcome.php">Jogar</a>
			<a href="edit_account.php" class="btn btn-block btn-outline-warning">Editar Conta</a>
			<a class="btn btn-block btn btn-outline-info" href="welcome.php">Lista de Perguntas Adicionadas</a>
			<a class="btn btn-block btn btn btn-outline-primary" href="welcome.php">Hall da Fama</a>
			<a href="logout.php" class="btn btn-block btn-outline-danger">Sair</a>

		</section>
	</main>
</body>
</html>