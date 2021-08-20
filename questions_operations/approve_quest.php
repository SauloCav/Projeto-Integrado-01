<?php

	session_start();

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
        #quest {
            width: 1400px; 
        	padding: 40px;
        }
        .wrapper h1 {text-align: center}
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
	</style>
</head>
<body>
	<main>
		<section class="container wrapper"> 

        <?php

            require_once '../config/config.php';

            echo '<h2 class="display-5">Deseja realmente aprovar esta questão?</h2>';

            $param_key = $_SESSION["key"];
            
            $quest = "SELECT *FROM questoes_respostas WHERE (id_questao = $param_key)";
            $ques = $mysql_db->query($quest) or die($mysql_db->error);

            $dado = $ques->fetch_array();

            echo "<div id='quest'>";

                echo "<br><h3><strong> Pergunta: " . $dado['pergunta'] . "</strong></h3>";
                echo "<h3><strong> Resposta correta: " . $dado['resp_correta'] . "</strong></h3>"; 
                echo "<h3><strong> Resposta incorreta 1: " . $dado['resp_a'] . "</strong></h3>";
                echo "<h3><strong> Resposta incorreta 2: " . $dado['resp_b'] . "</strong></h3>";
                echo "<h3><strong> Resposta incorreta 3: " . $dado['resp_c'] . "</strong></h3><br><br>";

            echo "</div>";

            echo '<input type="submit" name="sim" class="btn btn-block btn btn-outline-dark" value="Sim">';
            echo '<input type="submit" name="nao" class="btn btn-block btn btn-outline-dark" value="Não">';

        ?>

		</section>
	</main>
</body>
</html>