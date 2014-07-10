<?php
 
 	include 'controller/DBController.php';

	/* Questo è il modello del nostro Corso */
	class Corso{
	 
		private $dbms;
		private $nome;
		private $anno;

		/* Il costruttore del nostro modello         *
		* fornisce alla classe accesso al database */
		public function __construct($db){
			$this->dbms = $db;
			$this->nome = 0;
			$this->anno = 0;
		}
		
		/* Ritorna l'elenco dei metadati associati ai corsi ovvero: *
		* nome, anno accademico       */
		public function get_courses_meta(){
			$f = new DBController($this->dbms);
			$meta = $f->get_courses_meta();
			return $meta;
		}
		
		/* Permette di settare il nome		*/
		public function setNome($n){
			$this->nome = $n;
		}

		/* Permette di ottenere il nome       */
		public function getNome(){
			return $this->nome;
		}
		
		/* Permette di settare l'anno       */
		public function setAnno($a){
			$this->anno = $a;
		}

		/* Permette di ottenere l'anno       */
		public function getAnno(){
			return $this->anno;
		}
		
	}
	
?>