<?php

	session_start();

	require_once 'config/config.php';

	$consulta = "SELECT * FROM questoes_respostas WHERE id_questao IS NOT NULL"; 
	$cons = $mysql_db->query($consulta) or die($mysql_db->error);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		foreach ($_POST as $key => $value) {
			$_SESSION["key"] = $key;
			$_SESSION["value"] = $value;
		}

		if ($_SESSION["value"] === 'Editar') {
			header('location: ./questions_operations/edit_quest.php');
		}

		if ($_SESSION["value"] === 'Aprovar') {
			header('location: ./questions_operations/approve_quest.php');
		}

		if ($_SESSION["value"] === 'Excluir') {
			header('location: ./questions_operations/delete_quest.php');
		}

		if ($_SESSION["value"] === 'Denunciar') {
			header('location: ./questions_operations/denounce_quest.php');
		}

	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de Perguntas</title>
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
				<h1 class="display-5">Lista de Perguntas Adicionadas</h1>
				<a class="btn btn-block btn-link bg-light" href="question_board.php">Sair</a>
				<br>
			</div>

			<table border="5"> 
				<tr> 
					<td>Questão:</td> 
					<td>Resposta Correta:</td> 
					<td>Resposta Incorreta 01:</td> 
					<td>Resposta Incorreta 02:</td> 
					<td>Resposta Incorreta 03:</td> 
					<td>(Válida(v)  Inválida(I))</td> 
				</tr> 
				</td><?php while($dado = $cons->fetch_array()) { ?> 
				<tr> 
					<td><?php echo $dado['pergunta']; ?></td>
					<td><?php echo $dado['resp_correta']; ?></td> 
					<td><?php echo $dado['resp_a']; ?></td>
					<td><?php echo $dado['resp_b']; ?></td>
					<td><?php echo $dado['resp_c']; ?></td>
					<td><?php echo $dado['valida']; ?>
					<?php $_SESSION["dados"] = $dado;?>

					<form method="post">
						<?php if ($dado['valida'] === 'i') {
							echo '<td> <input type="submit" name='.$_SESSION["dados"][0].' class="btn btn-block btn btn-outline-dark" value="Editar"> </td>';
							echo '<td> <input type="submit" name='.$_SESSION["dados"][0].' class="btn btn-block btn btn-outline-dark" value="Aprovar"> </td>';
							echo '<td> <input type="submit" name='.$_SESSION["dados"][0].' class="btn btn-block btn btn-outline-dark" value="Excluir"> </td>';
						}
						else {
							echo '<td> <input type="submit" name='.$_SESSION["dados"][0].' class="btn btn-block btn btn-outline-dark" value="Denunciar"> </td>';
						} 
						?> 
					</form>

				</tr> 
				<?php } ?> 
			</table>	

		</section>
	</main>
</body>
</html>
