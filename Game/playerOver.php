<?php

	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Over</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
        .wrapper{ 
        	width: 350px; 
        	padding: 30px; 
        }
        .wrapper h1 {text-align: center}
        .wrapper form .form-group span {color: red;}
        button{
            margin: 0 15px;
        }
	</style>
</head>
<body>
    <section class="container wrapper">
        <h1>Você perdeu, tente outra vez!</h1>
        <img src="../img/game-over-5a5de74d4c669298preview.png" alt="Error" width="96%">
    </section>
    <div class="container wrapper">
        <a href="init.php" class="btn btn-block btn btn-outline-dark">Reiniciar</a>
        <a href="../welcome.php" class="btn btn-block btn-link bg-light">Sair</a>
    </div>
</body>
</html>