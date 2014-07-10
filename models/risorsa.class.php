<?php
	
		class Risorsa {
		private $id;
		private $idContr;
		private $idNodo;
		private $idFile;
		private $link;
	
		/* Il costruttore del nostro modello         *
		* fornisce alla classe accesso al database */
		public function __construct($db){
			$this->dbms = $db;
		}

		function getIdRis(){
			return $this->id;
		}

		function setIdRis($id){
			$this->id = $id;
		}

		function getLink(){
			return $this->link;
		}

		function setLink($l){
			$this->link = $l;
		}

		function getIdFile(){
			return $this->idFile;
		}

		function setIdFile($idf){
			$this->idFile = $idf;
		}
		
		function getIdContr(){
			return $this->link;
		}

		function setIdContr($idc){
			$this->idContr = $idc;
		}

		/* Ritorna l'elenco dei metadati associati alle risorse ovvero */
		//public function get_res_meta(){
			/* Questo sarà l'elenco di risorse da restituire */
		//	$meta = array();
			/* Apro una connessione col dbms usando le API fornite dal framework: *
			* Potete trovare le specifiche di queste funzioni nel file              *
			* models/db.class.php                                                  */
		//	$this->dbms->connect();
			/* Ottengo i dati necessari dal database */
		//	$query = "SELECT * FROM risorsa;";
		//	$this->dbms->prepare($query);
		//	if($this->dbms->query()){
		//	$numrows = $this->dbms->numrows();
			/* Creo l'elenco di risorse da restituire */
		//		for ($i = 0; $i < $numrows; $i++){
		//			$res = $this->dbms->fetch("array");
		//			array_push($meta, $res);
		//		}
		//	}
		//	$this->dbms->disconnect();
		//	return $meta;
		//}
		 
		/* Ritorna la risorsa (tutti i dati) corrispondente all'ID delcontributo */
		//public function get_res_by_idContr($contr_id){
			/* Questo conterrà i dati da restituire */
		//	$data = NULL;
			/* Apro una connessione col dbms usando le API fornite dal framework: *
			* Potete trovare le specifiche di queste funzioni nel file              *
			* models/db.class.php                                                  */
		//	$this->dbms->connect();
		//	$query = "SELECT * FROM risorsa WHERE idContr = ".$contr_id.";";
		//	$this->dbms->prepare($query);
		//	if($this->dbms->query()){
				/* Se non ho trovato nessun testo con l'ID specificato devo ritornare NULL, quindi non entro in questo if */
		//		if($this->dbms->numrows() != 0){
		//			$data = $this->dbms->fetch("array");
		//		}
		//	}
		//	$this->dbms->disconnect();
		//	return $data;
		 
		//}

		public function salvaRisorsaDaPost($idContr, $idFile, $link){
			$this->dbms->connect();
			$f = new DBController($this->dbms);
			$idRisorsa = $f->salvaRisorsaDaPost($idContr, $idFile, $link);
			return $idRisorsa;
		}


	}

?>
