<?php

	session_start();

	require_once '../config/config.php';

	class Node {
		public $data;
		public $num;
		public $next;
	}
	
	class LinkedList {
		public $head;
	
		public function __construct(){
			$this->head = null;
		}
	
		public function findObject($number) {
			$temp = new Node();
			$temp = $this->head;

			if($temp != null) {
				while($temp != null) {
					if($temp->num === $number){
						return $temp->data;
					}
					$temp = $temp->next;
				}
				echo "\n";
			} 
			else {
				echo "The list is empty.\n";
			}
		}

	};

	$quests = "SELECT * FROM questoes_respostas WHERE id_questao IS NOT NULL AND valida = 'v'"; 
    $ques = $mysql_db->query($quests) or die($mysql_db->error);
    $row = mysqli_fetch_all($ques);
    $_SESSION["prize"] = 0;

    shuffle($row);

    $MyList = new LinkedList();

    $first = new Node();
    $first->data = $row[$row[0][0]];
    $first->next = null;
    $first->num = 0;
    $MyList->head = $first;

    $second = new Node();
    $second->data = $row[$row[1][0]];
    $second->next = null;
    $second->num = 1;
    $first->next = $second;

    $third = new Node();
    $third->data = $row[$row[2][0]];
    $third->next = null;
    $third->num = 2;
    $second->next = $third;

    $fourth = new Node();
    $fourth->data = $row[$row[3][0]];
    $fourth->next = null;
    $fourth->num = 3;
    $third->next = $fourth;

    $fifth = new Node();
    $fifth->data = $row[$row[4][0]];
    $fifth->next = null;
    $fifth->num = 4;
    $fourth->next = $fifth;

    $sixth = new Node();
    $sixth->data = $row[$row[5][0]];
    $sixth->next = null;
    $sixth->num = 5;
    $fifth->next = $sixth;

    $seventh = new Node();
    $seventh->data = $row[$row[6][0]];
    $seventh->next = null;
    $seventh->num = 6;
    $sixth->next = $seventh;

?>