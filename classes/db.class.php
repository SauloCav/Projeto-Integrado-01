<?php
error_reporting(0);
	//classe que conecta com o banco de dados
	class Db extends PDO{
		
		private $host 		= 'localhost'; //localhost
		private $user		= 'root'; //nome usuário banco de dados
		private $password	= ''; // senha do banco de dados
		private $dbname 	= 'ranking'; //nome do banco de dados


		private $type		= 'mysql';
		private $port		= 3306;

		protected $conn;
		
	
		
		function query($sql){
			$r = parent::query($sql);
			$r->setFetchMode(PDO::FETCH_OBJ);
			return $r;
		}

		public function __construct(){
		        try{
		           	$this->conn = parent::__construct($this->type.":host=".$this->host.";port=".$this->port.";dbname=".$this->dbname, $this->user, $this->password);
		        } catch(PDOException $e){
		            die("connection failed, try again.");
		        }
		}

		public function getLastInsertId()
		{
			$stmt = parent::query("SELECT LAST_INSERT_ID()");
			$lastId = $stmt->fetch(PDO::FETCH_NUM);
			return $lastId[0];
		}
		    
		public function getConn(){
		        return $this->conn;
		}
		    
		//fechar conexão no DB

		public function __destruct(){
		        $this->conn = null;
		}	
	}
?>
