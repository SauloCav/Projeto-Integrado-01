<?php

	session_start();

    require_once '../config/config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $param_prize = $_SESSION["prize"];
        $param_id_usuario = $_SESSION["id_user"];

        $sql = "INSERT INTO ranking(pontuacao, id_usuario) VALUES('$param_prize', '$param_id_usuario')";

        if ($stmt = $mysql_db->prepare($sql)) {

            if ($stmt->execute()) {

                if ($stmt = $mysql_db->prepare($sql)) {
                    if(array_key_exists('reiniciar', $_POST)){
                        header('location: init.php');
                    }
                    if(array_key_exists('sair', $_POST)){
                        header('location: ../welcome.php');
                    }
                }   
                else {
                    echo "Algo deu errado, Tente Novamente!";
                }

            } 
            else {
                echo "Algo deu errado, Tente Novamente!";
            }

            $stmt->close();	
        }

        $mysql_db->close();

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Derrota</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/12130brain_109577.ico" />
	<style>
        .wrapper{ 
        	width: 350px; 
        	padding: 30px; 
        }
        .wrapper h1 {text-align: center}
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
        button{
            margin: 0 15px;
        }
	</style>
</head>
<body>
    <section class="container wrapper">
        <h1>Você perdeu, tente outra vez!</h1> <br/>
        <h2 class="display-5"><strong>Seu Prêmio: <?php echo $_SESSION["prize"];?> </strong></h2>
        <img src="../img/game-over-5a5de74d4c669298preview.png" alt="Error" width="96%">
    </section>
    <div class="container wrapper">
        <form method="post">
            <input type="submit" name="reiniciar" class="btn btn-block btn btn-outline-dark" value="Reiniciar">
            <input type="submit" name="sair" class="btn btn-block btn-link bg-light" value="Sair">
        </form>
    </div>
</body>
</html>