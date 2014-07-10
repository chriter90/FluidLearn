<?php
	session_start();
	include 'controller/DBController.php';
	class Studente implements Partecipante {
		private $nome, $cognome;
		private $login, $password;

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
			$stud = $dbc->controllaCredenzialiStud($this->login, $this->password);
			if($stud) {
				//$this->_user = $stud; // store it so it can be accessed later
				$_SESSION['login'] = $stud[0]['login'];
				$_SESSION['password'] = $stud[0]['password'];
				$_SESSION['nome'] = $stud[0]['nome'];
				$_SESSION['cognome'] = $stud[0]['cognome'];
				return $stud[0];
			}
			return false;
		}

	}


?>
