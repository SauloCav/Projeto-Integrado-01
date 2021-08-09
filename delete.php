<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
}
 
require_once 'config/config.php';
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $param_id = $_SESSION["id_user"];
    $sql = "DELETE FROM users WHERE id_user = $param_id";

    if (mysqli_query($mysql_db, $sql)) {
        echo "Deletado com sucesso!";
        session_destroy();
        header("location: index.php");
        exit();
    } else {
        echo "Erro ao Deletar!";
    }

}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
    <style type="text/css">
        .wrapper{ 
            width: 500px; 
            padding: 20px; 
        }
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
    </style>
</head>
<body>
    <main class="container wrapper">
        <section>
            <h2>Deletar Conta</h2>
            <p class="text-center">Deseja realmente excluir essa conta?</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-primary" value="Sim">
                    <a class="btn btn-block btn-link bg-light" href="welcome.php">Cancelar</a>
                </div>
            </form>
        </section>
    </main>    
</body>

</html>