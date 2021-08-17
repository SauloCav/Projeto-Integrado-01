<?php

	session_start();

	require_once '../config/config.php';

	$quests = "SELECT * FROM questoes_respostas"; 
	$ques = $mysql_db->query($quests) or die($mysql_db->error);
	$row = mysqli_fetch_all($ques);

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
	
		public function PrintList($number) {
			$temp = new Node();
			$temp = $this->head;

			if($temp != null) {
				while($temp != null) {
					if($temp->num === $number){
						echo $temp->data[0]." <br/>";
						echo $temp->data[1]." <br/>";
						echo $temp->data[2]." <br/>";
						echo $temp->data[3]." <br/>";
						echo $temp->data[4]." <br/>";
						echo $temp->data[5]." <br/>";
						echo $temp->data[6]." <br/>";
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

	$MyList = new LinkedList();

	$first = new Node();
	$first->data = $row[0];
	$first->next = null;
	$first->num = 0;
	$MyList->head = $first;

	$second = new Node();
	$second->data = $row[1];
	$second->next = null;
	$second->num = 1;
	$first->next = $second;

	$third = new Node();
	$third->data = $row[2];
	$third->next = null;
	$third->num = 2;
	$second->next = $third;

	$fourth = new Node();
	$fourth->data = $row[3];
	$fourth->next = null;
	$fourth->num = 3;
	$third->next = $fourth;

	$fifth = new Node();
	$fifth->data = $row[4];
	$fifth->next = null;
	$fifth->num = 4;
	$fourth->next = $fifth;

	$sixth = new Node();
	$sixth->data = $row[5];
	$sixth->next = null;
	$sixth->num = 5;
	$fifth->next = $sixth;

	$seventh = new Node();
	$seventh->data = $row[6];
	$seventh->next = null;
	$seventh->num = 6;
	$sixth->next = $seventh;

?>