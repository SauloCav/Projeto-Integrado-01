<?php

	session_start();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Pergunta</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
    <style type="text/css">
        .wrapper{ 
            width: 1500px; 
        	padding: 40px;  
        }
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
    </style>
</head>
<body>
<main class="container wrapper">
        <section>
            <h2>Adicionar Pergunta</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <div class="form-group <?php echo (!empty($questao_err)) ? 'has-error' : ''; ?>">
                    <label>Questão:</label>
                    <input type="text" name="questao" class="form-control" value="<?php echo $questao; ?>">
                    <span class="help-block"><?php echo $questao_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($resposta_certa_err)) ? 'has-error' : ''; ?>">
                    <label>Resposta Correta:</label>
                    <input type="text" name="resposta_certa" class="form-control" value="<?php echo $resposta_certa; ?>">
                    <span class="help-block"><?php echo $resposta_certa_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($resposta_a_err)) ? 'has-error' : ''; ?>">
                    <label>Resposta Incorreta 01:</label>
                    <input type="text" name="resposta_a" class="form-control" value="<?php echo $resposta_a; ?>">
                    <span class="help-block"><?php echo $resposta_a_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($resposta_b_err)) ? 'has-error' : ''; ?>">
                    <label>Resposta Incorreta 02:</label>
                    <input type="text" name="resposta_b" class="form-control" value="<?php echo $resposta_b; ?>">
                    <span class="help-block"><?php echo $resposta_b_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($resposta_c_err)) ? 'has-error' : ''; ?>">
                    <label>Resposta Incorreta 03:</label>
                    <input type="text" name="resposta_c" class="form-control" value="<?php echo $resposta_c; ?>">
                    <span class="help-block"><?php echo $resposta_c_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-primary" value="Enviar">
                    <a class="btn btn-block btn-link bg-light" href="../question_list.php">Cancelar</a>
                </div>
            </form>
        </section>
    </main>     
</body>

</html>