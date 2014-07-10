<?php
	
	class Testo {
		private $id;
		private $idContr;
		private $contenuto;
	
		/* Il costruttore del nostro modello         *
		* fornisce alla classe accesso al database */
		public function __construct($db){
			$this->dbms = $db;
		}

		function getIdContr(){
			return $this->idContr;
		}

		function setIdContr($idc){
			$this->idContr = $idc;
		}

		function getContenuto(){
			return $this->contenuto;
		}

		function setContenuto($cont){
			$this->contenuto = $cont;
		}
		
		/* Ritorna l'elenco dei metadati associati ai testi ovvero: *
		* ID, contenuto, idContr       
		public function get_texts_meta(){
			$f = new DBController($this->dbms);
			$meta = $f->get_texts_meta();
			return $meta;
		}*/
		 
		/* Ritorna l'intero testo (tutti i dati) corrispondente all'ID delcontributo 
		public function get_text_by_idContr($contr_id){
			$f = new DBController($this->dbms);
			$data = $f->get_text_by_idContr($contr_id);
			return $data;
		 
		}*/

		/* Salva un nuovo testo nel database, utilizzando i dati provenienti da un form */
		public function salvaTesto($idContr,$content){
			$f = new DBController($this->dbms);
			$idTesto = $f->salvaTesto($idContr,$content);
			return $idTesto;
		}


	}

?>
