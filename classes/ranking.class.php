<?php
require_once 'action.class.php';

class Ranking extends Action{
	public function __construct(){ //tabela ranking
		parent::__construct('ranking');
	}

	public function getList(){ // lista todas as pontuações ordenando por ordem decrescente
		return $this->query("SELECT * FROM $this->tabela ORDER BY pts DESC");
	}
}
?>