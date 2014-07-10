<?php
	session_start();
	include 'controller/DBController.php';
	class Insegnante /*implements Docente */{
		private $nome, $cognome;
		private $login, $password;
		
		/*public getAttivita(){
		}*/			

		public function __construct($db, $l, $pwd){
			$this->dbms = $db;
			$this->login = $l;
		       	$this->password = $pwd;
		}

		public function whoIs(){
			return $this->nome.' '.$this->cognome;
		}
		
		public function setNome($n){
			$this->nome = $n;
		}

		public function setCognome($c){
			$this->cognome = $c;
		}

		public function getUser(){	
			return $this->login;
		}		
	
		public function signin(){
			$dbc = new DBController($this->dbms);
			$ins = $dbc->controllaCredenzialiIns($this->login, $this->password);
			if($ins) {
				//$this->_user = $stud; // store it so it can be accessed later
				$_SESSION['login'] = $ins[0]['login'];
				$_SESSION['password'] = $ins[0]['password'];
				$_SESSION['nome'] = $ins[0]['nome'];
				$_SESSION['cognome'] = $ins[0]['cognome'];
				return $ins[0];
			}
			return false;
		}

	}


?>
