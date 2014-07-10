<?php
	

	class File {
		private $id;
		private $percorso;
	
		/* Il costruttore del nostro modello         *
		* fornisce alla classe accesso al database */
		public function __construct($db){
			$this->dbms = $db;
		}

		function getPercorso(){
			return $this->percorso;
		}

		function setPercorso($p){
			$this->percorso = $p;
		}
		
		/* Salva un nuovo file nel database, utilizzando i dati provenienti da un form */
		public function salvaFile($percorso){
			$f = new DBController($this->dbms);
			$idFile = $f->salvaFile($percorso);
			return $idFile;
			
		}


	}

?>
