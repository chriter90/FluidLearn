<?php
 
	class DBController{
		private $dbms;
		public function __construct($db){
			$this->dbms = $db;
		}
		
		/* Ritorna l'elenco dei metadati associati ai corsi ovvero: *
		* nome, anno accedemico       */
		public function get_courses_meta(){
			/* Questo sarà l'elenco dei corsi da restituire */
			$meta = array();
			/* Apro una connessione col dbms usando le API fornite dal framework: *
			* Potete trovare le specifiche di queste funzioni nel file              *
			* models/db.class.php                                                  */
			$this->dbms->connect();
			/* Ottengo i dati necessari dal database */
		
			$query = 'SELECT * FROM corso';
			$this->dbms->prepare($query);
			if($this->dbms->query()){
				$numrows = $this->dbms->numrows();
			/* Creo l'elenco dei corsi da restituire */
				for ($i = 0; $i < $numrows; $i++){
					$corso = $this->dbms->fetch("array");
					array_push($meta, $corso);
				}
			}
			$this->dbms->disconnect();
			return $meta;
		}
		
		
		/* Salva un nuovo file nel database, utilizzando i dati provenienti da un form */
		public function salvaFile($percorso){
			$this->dbms->connect();
			$query_file = 'INSERT INTO file (percorso) VALUES (\''.$percorso.'\')';
			$this->dbms->prepare($query_file);
			$this->dbms->query();
			//print($query_file);
			$idFile = $this->dbms->get_insert_id();
			$this->dbms->disconnect();
			return $idFile;
		}
		
		//public function get_texts_meta(){
			/* Questo sarà l'elenco di testo da restituire */
		//	$meta = array();
			/* Apro una connessione col dbms usando le API fornite dal framework: *
			* Potete trovare le specifiche di queste funzioni nel file              *
			* models/db.class.php                                                  */
		//	$this->dbms->connect();
			/* Ottengo i dati necessari dal database */
		//	$query = "SELECT * FROM testo;";
		//	$this->dbms->prepare($query);
		//	if($this->dbms->query()){
		//	$numrows = $this->dbms->numrows();
			/* Creo l'elenco di testo da restituire */
		//		for ($i = 0; $i < $numrows; $i++){
		//			$text = $this->dbms->fetch("array");
		//			array_push($meta, $text);
		//		}
		//	}
		//	$this->dbms->disconnect();
		//	return $meta;
		//}
		
		/* Ritorna l'intero testo (tutti i dati) corrispondente all'ID delcontributo */
		//public function get_text_by_idContr($contr_id){
			/* Questo conterrà i dati da restituire */
		//	$data = NULL;
			/* Apro una connessione col dbms usando le API fornite dal framework: *
			* Potete trovare le specifiche di queste funzioni nel file              *
			* models/db.class.php                                                  */
		//	$this->dbms->connect();
		//	$query = "SELECT * FROM testo WHERE idContr = ".$contr_id.";";
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
		
		/* Salva un nuovo testo nel database, utilizzando i dati provenienti da un form */
		public function salvaTesto($idContr,$content){
			$this->dbms->connect();
			$query_testo = 'INSERT INTO testo (idContr, contenuto) VALUES (\''.$idContr.'\',\''.$content.'\')';
			$this->dbms->prepare($query_testo);
			$this->dbms->query();
			//print($query_testo);
			$idTesto = $this->dbms->get_insert_id();
			$this->dbms->disconnect();
			return $idTesto;
		}
		
		public function salvaRisorsaDaPost($idContr, $idFile, $link){
			$this->dbms->connect();
			$query_risorsa = 'INSERT INTO risorsa (idContr,idFile,link) VALUES (\''.$idContr.'\', \''.$idFile.'\', \''.$link.'\')';
			$this->dbms->prepare($query_risorsa);
			$this->dbms->query();
			//print($query_risorsa);
			$idRisorsa = $this->dbms->get_insert_id();
			$this->dbms->disconnect();
			return $idRisorsa;
		}
		
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
		
			$query = 'SELECT d.id, d.part, d.titolo, d.contenuto, d.visibilita, nodo.nome nodo, d.unidida, d.dataPubb, d.percorso, d.link FROM (SELECT g.id, g.part, g.titolo, g.contenuto, g.visibilita, g.unidida, g.dataPubb, file.percorso, g.link, g.etichettaNodo FROM (SELECT p.id, p.part, p.titolo, p.contenuto, p.visibilita, p.unidida, p.dataPubb, p.risorsaAll, risorsa.idFile, risorsa.link, p.etichettaNodo FROM (SELECT DISTINCT contributo.id, post.part, contributo.titolo, testo.contenuto, contributo.visibilita, post.unidida, post.dataPubb, post.risorsaAll, post.etichettaNodo FROM post, contributo, testo WHERE contributo.id = post.id AND contributo.id = testo.idContr AND post.isdraft = 0) p LEFT JOIN risorsa ON p.risorsaAll = risorsa.id) g LEFT JOIN file ON g.idFile = file.id) d LEFT JOIN nodo ON d.etichettaNodo = nodo.id ORDER BY d.dataPubb';
			$this->dbms->prepare($query);
			if($this->dbms->query()){
				$numrows = $this->dbms->numrows();
			/* Creo l'elenco di post da restituire */
				for ($i = 0; $i < $numrows; $i++){
					$post = $this->dbms->fetch("array");
					/*$queryRis = 'SELECT risorsa.id, risorsa.idFile, risorsa.link FROM risorsa, post WHERE risorsa.id = '.$post['id'].' AND '.$post['risorsaAll'].' IS NOT NULL;';
					$this->dbms->prepare($queryRis);*/
					array_push($meta, $post);
				}
			}
			$this->dbms->disconnect();
			return $meta;
		}
	
		public function get_drafts_meta(){
			/* Questo sarà l'elenco di post da restituire */
			$meta = array();
			/* Apro una connessione col dbms usando le API fornite dal framework: *
			* Potete trovare le specifiche di queste funzioni nel file              *
			* models/db.class.php                                                  */
			$this->dbms->connect();
			/* Ottengo i dati necessari dal database */
			$query = 'SELECT g.id, g.part, g.titolo, g.contenuto, g.visibilita, g.unidida, g.dataPubb, file.percorso, g.link FROM (SELECT p.id, p.part, p.titolo, p.contenuto, p.visibilita, p.unidida, p.dataPubb, p.risorsaAll, risorsa.idFile, risorsa.link FROM (SELECT DISTINCT contributo.id, post.part, contributo.titolo, testo.contenuto, contributo.visibilita, post.unidida, post.dataPubb, post.risorsaAll FROM post, contributo, testo WHERE contributo.id = post.id AND contributo.id = testo.idContr AND post.isdraft = 1) p LEFT JOIN risorsa ON p.risorsaAll = risorsa.id) g LEFT JOIN file ON g.idFile = file.id ORDER BY g.dataPubb';
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
	
		public function get_post_by_id($post_id){
			/* Questo conterrà i dati da restituire */
			$data = NULL;
			/* Apro una connessione col dbms usando le API fornite dal framework: *
			* Potete trovare le specifiche di queste funzioni nel file              *
			* models/db.class.php                                                  */
			$this->dbms->connect();
			$query = "SELECT * FROM post WHERE id = ".$post_id.";";
			$this->dbms->prepare($query);
			if($this->dbms->query()){
				/* Se non ho trovato nessun post con l'ID specificato devo ritornare NULL, quindi non entro in questo if */
				if($this->dbms->numrows() != 0){
					$data = $this->dbms->fetch("array");
				}
			}
			$this->dbms->disconnect();
			return $data;
		 
		}
	
		/* Ritorna tutti i nodi */
		public function get_nodi(){

			/* Questo sarà l'elenco di nodi da restituire */
			$data = array();
			/* Apro una connessione col dbms usando le API fornite dal framework: *
			* Potete trovare le specifiche di queste funzioni nel file              *
			* models/db.class.php                                                  */
			$this->dbms->connect();
			/* Ottengo i dati necessari dal database */
			$query = "SELECT * FROM nodo";
			$this->dbms->prepare($query);
			if($this->dbms->query()){
			$numrows = $this->dbms->numrows();
			/* Creo l'elenco di nodi da restituire */
				for ($i = 0; $i < $numrows; $i++){
					$nodo = $this->dbms->fetch("array");
					array_push($data, $nodo);
				}
			}
			$this->dbms->disconnect();
			return $data;
		}
	
		/* Ritorna tutte le unità didattiche */
		public function get_unita(){

			/* Questo sarà l'elenco di unita da restituire */
			$uni = array();
			/* Apro una connessione col dbms usando le API fornite dal framework: *
			* Potete trovare le specifiche di queste funzioni nel file              *
			* models/db.class.php                                                  */
			$this->dbms->connect();
			/* Ottengo i dati necessari dal database */
			$query = "SELECT * FROM unita WHERE data_attivazione IS NOT NULL AND data_attivazione <= now();";
			$this->dbms->prepare($query);
			if($this->dbms->query()){
				$numrows = $this->dbms->numrows();
			/* Creo l'elenco di unita da restituire */
				for ($i = 0; $i < $numrows; $i++){
					$unita = $this->dbms->fetch("array");
					array_push($uni, $unita);
				}
			}
			$this->dbms->disconnect();
			return $uni;
		}
	
			public function salvaPost($idContr,$isdraft,$uda,$idTesto,$idRisorsa,$nodo){
			$this->dbms->connect();
			$today = date('Y-m-d H:i:s',time()); /* Ottengo la data odierna */
			$query_post = 'INSERT INTO post(id,isdraft,unidida,corpo,risorsaAll,dataPubb,etichettaNodo) VALUES (\''.$idContr.'\',\''.$isdraft.'\',\''.$uda.'\',\''.$idTesto.'\',\''.$idRisorsa.'\',\''.$today.'\',\''.$nodo.'\')';
			$this->dbms->prepare($query_post);
			$this->dbms->query();
			print($query_post);
			$this->dbms->disconnect();
		}
	
		public function salvaContributo($titolo, $visibilita){
			$this->dbms->connect();
			$query_contr = 'INSERT INTO contributo(titolo,visibilita) VALUES (\''.$titolo.'\', \''.$visibilita.'\')';
			$this->dbms->prepare($query_contr);
			$this->dbms->query();
			//print($query_contr);
			$idContr = $this->dbms->get_insert_id();
			$this->dbms->disconnect();
			return $idContr;
		}

		public function controllaCredenzialiStud($login, $password){
			$stud = array();                                               
			$this->dbms->connect();
			/* Ottengo i dati necessari dal database */
			$query_stud = 'SELECT * FROM studente WHERE login = \''.$login.'\' AND password = \''.$password.'\'';
			//echo $query_stud;
			$this->dbms->prepare($query_stud);
			if($this->dbms->query()){
				$numrows = $this->dbms->numrows();
				for ($i = 0; $i < $numrows; $i++){
					$s = $this->dbms->fetch("array");
					array_push($stud, $s);
				}
				$this->dbms->disconnect();
				return $stud;
			}
			else return false;
		}
		
		public function controllaCredenzialiIns($login, $password){
			$ins = array();                                               
			$this->dbms->connect();
			/* Ottengo i dati necessari dal database */
			$query_ins = 'SELECT * FROM insegnante WHERE login = \''.$login.'\' AND password = \''.$password.'\'';
			//echo $query_stud;
			$this->dbms->prepare($query_ins);
			if($this->dbms->query()){
				$numrows = $this->dbms->numrows();
				for ($i = 0; $i < $numrows; $i++){
					$d = $this->dbms->fetch("array");
					array_push($ins, $d);
				}
				$this->dbms->disconnect();
				return $ins;
			}
			else return false;
		}
	
	}
?>
