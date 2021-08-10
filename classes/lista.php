<?php 
header('Content-Type: text/html; charset=utf-8');//evita que os carateres com acentos fiquem bugados
header("Access-Control-Allow-Origin: *");
//aceita requisições de qualquer lugar
//$_SERVER['HTTP_REFERER']; //impede que o usuário acesse o ranking direto na url
require_once("classes/ranking.class.php");
$ranking = new Ranking();

$getRanking = $ranking->getList();

$position = 1;

foreach ($getRanking as $showRanking) { //listagem de usuários e suas pontuações 
		echo $position."º ".$showRanking->nome." - ".$showRanking->pts." metros |";
		$position++;
}
?>