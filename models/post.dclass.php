<?php

class Post extends contributo{
	
	private $id;
	private $part;
	private $isdraft;
	private $unidida;
	private $titolo;
	private $corpo;
	private $risorsaAll;
	private $dataPubb;
	private $etichettaNodo;
	private $visibilita;
	private $dbms;
	
	
	/* Il costruttore del nostro modello         *
	* fornisce alla classe accesso al database */
	public function __construct($db){
		$this->dbms = $db;
	}
	/*function __construct($id, $part, $isdraft, $titolo, $corpo, $risorsaAll, $dataPubb, $etichettaNodo, $visibilita, $db){
		$this->id = $id;
		$this->part = $part;
		$this->isdraft = $isdraft;
		$this->titolo = $titolo;
		$this->corpo = $corpo;
		$this->risorsaAll = $risorsaAll;
		$this->dataPubb = $dataPubb;
		$this->etichettaNodo = $etichettaNodo;
		$this->visibilita = $visibilita;
		$this->dbms = $db;

	}	*/

	/* Ritorna l'elenco dei metadati associati ai post ovvero: *
	* ID, titolo, autore, descrizione (opzionale), data       */
	public function get_posts_meta(){
		/* Questo sarà l'elenco di post da restituire */
		$meta = array();
		/* Apro una connessione col dbms usando le API fornite dal framework: *
		* Potete trovare le specifiche di queste funzioni nel file              *
		* models/db.class.php                                                  */
		$this->dbms->connect();
		/* Ottengo i dati necessari dal database */
		$query = "SELECT * FROM post ORDER BY dataPubb;";
		$this->dbms->prepare($query);
		if($this->dbms->query()){
		$numrows = $this->dbms->numrows();
		/* Creo l'elenco di post da restituire */
			for ($i = 0; $i < $numrows; $i++){
				$post = $this->dbms->fetch("array");
				array_push($meta, $post);
			}
		}
		$this->dbms->disconnect();
		return $meta;
	}




}
 
?>
