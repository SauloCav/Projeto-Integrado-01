<?php

	session_start();

	require_once 'config/config.php';

	$consulta = "SELECT * FROM questoes_respostas"; 
	$cons = $mysql_db->query($consulta) or die($mysql_db->error);

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
			</div>

			<table border="1"> 
				<tr> 
					<td>Questão:</td> 
					<td>Resposta Correta 01:</td> 
					<td>Resposta Incorreta 01:</td> 
					<td>Resposta Incorreta 02:</td> 
					<td>Resposta Incorreta 03:</td> 
					<td>(Válida(v)  Inválida(I))</td> 
				</tr> 
				<?php while($dado = $cons->fetch_array()) { ?> 
				<tr> 
					<td><?php echo $dado['pergunta']; ?></td>
					<td><?php echo $dado['resp_correta']; ?></td> 
					<td><?php echo $dado['resp_a']; ?></td> 
					<td><?php echo $dado['resp_b']; ?></td> 
					<td><?php echo $dado['resp_c']; ?></td> 
					<td><?php echo $dado['valida']; ?></td> 
					<td> <a href="questoes_editar.php?codigo=<?php echo $dado['usu_codigo']; ?>">Editar</a> </td> 
					<td> <a href="questoes_excluir.php?codigo=<?php echo $dado['usu_codigo']; ?>">Excluir</a> </td> 
					<td> <a href="questoes_validar.php?codigo=<?php echo $dado['usu_codigo']; ?>">Validar</a> </td> 
					<td> <a href="questoes_validar.php?codigo=<?php echo $dado['usu_codigo']; ?>">Denunciar</a> </td> 
				</tr> 
				<?php } ?> 
			</table>
				
			<br/>
			<a class="btn btn-block btn-link bg-light" href="question_board.php">Sair</a>

		</section>
	</main>
</body>
</html>
