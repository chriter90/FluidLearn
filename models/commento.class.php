<?php
 
 	include 'controller/DBController.php';

	/* Questo è il modello del nostro Post */
	class Commento extends Contributo{
	 
		private $dbms;
		private $id;
		private $part;
		private $unidida;
		private $titolo;
		private $corpo;
		private $risorsaAll;
		private $dataPubb;
		private $etichettaNodo;
		private $visibilita;

		/* Il costruttore del nostro modello         *
		* fornisce alla classe accesso al database */
		public function __construct($db){
			$this->dbms = $db;
			$this->id = 0;
			$this->part = 0;
			$this->titolo = "";
			$this->corpo = new Testo($db);
			$this->risorsaAll = new Risorsa($db);
			$this->dataPubb = "";
			$this->etichettaNodo = "";
			$this->visibilita = "classe";
		}

	
		/*public function __construct($part, $isdraft, $unidida, $titolo, $corpo, $risorsaAll, $dataPubb, $etichettaNodo, $visibilita){
			//$this->id = $id;
			$this->part = $part;
			$this->isdraft = $isdraft;
			$this->titolo = $titolo;
			$this->corpo = new Testo($corpo);
			$this->risorsaAll = $risorsaAll;
			$this->dataPubb = $dataPubb;
			$this->etichettaNodo = $etichettaNodo;
			$this->visibilita = $visibilita;
		}*/	


		/* Ritorna l'elenco dei metadati associati ai post ovvero: *
		* ID, titolo, autore, descrizione (opzionale), data       */
		public function get_comments_meta(){
			$f = new DBController($this->dbms);
			$meta = $f->get_comments_meta();
			return $meta;
		}
	
	
		/* Ritorna l'intero post (tutti i dati) corrispondente all'ID assegnato */
		public function get_comment_by_id($post_id){
			$f = new DBController($this->dbms);
			$data = $f->get_comment_by_id($post_id);
			return $data;
		 
		}

		/* Permette di settare la visibilità       */
		public function setInfoVisib($visib){
			$this->visibilita = $visib;
		}
		
		/* Permette di ottenere la visibilità       */
		public function getInfoVisib(){
			return $this->visibilita;
		}
		
		/* Permette di settare il testo       */
		public function setInfoTesto($t){
			$this->corpo->setContenuto($t);
		}
		
		/* Permette di settare il titolo       */
		public function setInfoTitolo($t){
			$this->titolo = $t;
		}
			
		/* Permette di settare il nodo associato       */
		public function setInfoNodo($n){
			$this->etichettaNodo = $n;
		}
	
		/* Permette di ottenere il nodo associato       */
		public function getInfoNodo(){
			return $this->etichettaNodo;
		}

		/* Permette di settare l'unita' di riferimento     */
		public function setInfoUDA($unidida){
			$this->unidida = $unidida;
		}
	
		/* Permette di ottenere l'unita' di riferimento      */
		public function getInfoUDA(){
			return $this->unidida;
		}

		/* Permette di ottenere il titolo       */
		public function getInfoTitolo(){
			return $this->titolo;
		}
	
		/* Permette di ottenere il testo       */
		public function getInfoTesto(){
			return $this->corpo->contenuto;
		}

		/* Permette di settare la risorsa allegata     */
		public function setInfoRisorsa($ris){
			$this->risorsaAll->setIdRis($ris);
		}
	
		/* Permette di ottenere la risorsa allegata      */
		public function getInfoRisorsa(){
			return $this->risorsaAll->getIdRis();
		}


		/* Ritorna tutti i commenti relativi al post di id dato */
		public function get_comments_for($post_id){
		/* TODO */
		}
	
		/* Ritorna tutti i nodi */
		public function get_nodi(){
			$f = new DBController($this->dbms);
			$data = $f->get_nodi();
			return $data;
		}

		/* Ritorna tutte le unità didattiche */
		public function get_unita(){
			$f = new DBController($this->dbms);
			$uni = $f->get_unita();
			return $uni;
		}

	 
		/* Salva un nuovo post nel database, utilizzando i dati provenienti da un form */
		public function salvaCommento($idContr,$isdraft,$idTesto,$idRisorsa){
			$f = new DBController($this->dbms);
			$f->salvaCommento($idContr,$isdraft,$this->getInfoUDA(),$idTesto,$idRisorsa,$this->getInfoNodo());
		}
		
		public function salvaContributo(){
			$f = new DBController($this->dbms);
			$idContr = $f->salvaContributo($this->getInfoTitolo(), $this->getInfoVisib());
			return $idContr;
		}


		/* Salva un nuovo commento nel database, utilizzando i dati provenienti da un form, e l'id del post corrente */
		public function save_comment($form_post_data, $post_id){
		/* TODO */
		}
 
}