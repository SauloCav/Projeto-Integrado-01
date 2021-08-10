<?php

session_start();
 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
}
 
require_once 'config/config.php';
 
// Define variables and initialize with empty values
$new_password = $confirm_password = '';
$new_username = $new_username_err = '';
$new_nickname = $new_nickname_err = '';
$new_password_err = $confirm_password_err = '';
 
// Processing form data when form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty(trim($_POST['new_username']))){
        $new_username_err = 'Insira seu novo Nome de Usuário!';     
    } else {

        // Prepare a select statement
        $sql = 'SELECT id_user FROM users WHERE username = ?';

        if ($stmt = $mysql_db->prepare($sql)) {
            // Set parmater
            $param_username = trim($_POST['username']);

            // Bind param variable to prepares statement
            $stmt->bind_param('s', $param_username);

            // Attempt to execute statement
            if ($stmt->execute()) {
                
                // Store executed result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $new_username_err = 'Esse Nome de Usuário já foi escolhido!';
                } else {
                    $new_username = trim($_POST['new_username']);
                }
            } else {
                echo "Oops! ${$new_username}, Algo deu errado, Tente Novamente!";
            }

            // Close statement
            $stmt->close();
        } else {

            // Close db connction
            $mysql_db->close();
        }
    }

    if (empty(trim($_POST['new_nickname']))) {
        $new_nickname_err = "Insira seu Nickname!";
    }
    else{
        $new_nickname = trim($_POST["new_nickname"]);
    }

    // Validate new password
    if(empty(trim($_POST['new_password']))){
        $new_password_err = 'Insira a senha!';     
    } elseif(strlen(trim($_POST['new_password'])) < 6){
        $new_password_err = 'A Senha deve ter no mínimo 6 caracteres!';
    } else{
        $new_password = trim($_POST['new_password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST['confirm_password']))){
        $confirm_password_err = 'Insira a confirmação da senha!';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = 'As Senhas nao Batem!';
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err) && empty($new_username_err) && empty($new_nickname_err)){

        $param_username = $new_username;
        $param_password = password_hash($new_password, PASSWORD_DEFAULT);
        $param_nickname = $new_nickname;
        $param_id = $_SESSION["id_user"];

        $sql = "UPDATE users SET username = '$param_username', password = '$param_password', nickname = '$param_nickname' WHERE id_user = '$param_id'";
        
        if($stmt = $mysql_db->prepare($sql)){
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Algo deu errado, tente novamente mais tarde!";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysql_db->close();
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
            <h2>Mudar Senha</h2>
            <p class="text-center">Insira sua nova senha</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <div class="form-group <?php echo (!empty($new_username_err)) ? 'has-error' : ''; ?>">
                    <label>Novo Nome de Usuário:</label>
                    <input type="text" name="new_username" class="form-control" value="<?php echo $new_username; ?>">
                    <span class="help-block"><?php echo $new_username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($new_nickname_err)) ? 'has-error' : ''; ?>">
                    <label>Novo Nickname:</label>
                    <input type="text" name="new_nickname" class="form-control" value="<?php echo $new_nickname; ?>">
                    <span class="help-block"><?php echo $new_nickname_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <label>Nova Senha:</label>
                    <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                    <span class="help-block"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirmar Senha:</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-primary" value="Enviar">
                    <a class="btn btn-block btn btn-outline-dark" href="delete.php">Remover Conta</a>
                    <a class="btn btn-block btn-link bg-light" href="welcome.php">Cancelar</a>
                </div>
            </form>
        </section>
    </main>    
</body>

</html>