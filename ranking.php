<?php

	session_start();

	require_once 'config/config.php';

	$ranking = "SELECT ra.pontuacao, us.nickname
	FROM (ranking ra 
		  JOIN 
          users us
          ON 
          ra.id_usuario = us.id_user) 
	ORDER BY pontuacao DESC LIMIT 10";      

	$ran = $mysql_db->query($ranking) or die($mysql_db->error);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hall da Fama</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
        .wrapper{ 
        	width: 1800px; 
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
				<h1 class="display-5">Hall da Fama</h1>
<<<<<<< HEAD
				<a class="btn btn-block btn-link bg-light" href="welcome.php">Sair</a>
=======
>>>>>>> 218149b4d12fcad60c70c571e86c57419f1eadb9
				<br>
			<table border="1"> 
				<tr> 
					<td>POSIÇÃO</td> 
					<td>PONTUAÇÃO</td> 
					<td>NICKNAME DO JOGADOR</td> 
				</tr> 

				<?php $pos = 1; ?>

				</td><?php while($dado = $ran->fetch_array()) { ?> 
					<tr> 
						<td><?php echo $pos; ?></td>
						<td><?php echo $dado['pontuacao']; ?></td> 
						<td><?php echo $dado['nickname']; ?></td>
						<?php $pos++; ?>
					</tr> 
				<?php } ?> 
			</table>
		</section>
<<<<<<< HEAD

=======
        <section class="container wrapper">
			<div class="page-header">
                <a class="btn btn-block btn-link bg-light" href="question_board.php">Sair</a>
            </section>
        </div>
>>>>>>> 218149b4d12fcad60c70c571e86c57419f1eadb9
	</main>
</body>
</html>

