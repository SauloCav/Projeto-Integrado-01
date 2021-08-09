<?php 
header('Content-Type: text/html; charset=utf-8'); //evita que os carateres com acentos fiquem bugados
header("Access-Control-Allow-Origin: *"); //aceita requisições de qualquer lugar
//$_SERVER['HTTP_REFERER']; //impede que o usuário acesse o ranking direto na url
require_once("classes/ranking.class.php"); //chama a classe ranking.class
$ranking = new Ranking();

	//validação de campos vazios
	if($_POST['nome'] == ""){
		die("0");
	}else 

	if($_POST['pts'] == ""){
		die("0");
	}

	if($ranking->add()) //se for true retorna 1 
		die("1");
	else //se não, 0
	die("0");
?>