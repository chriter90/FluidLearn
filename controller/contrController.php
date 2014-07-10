<?php
 
	class contrController extends baseController{
	 
		public function index(){
 
			/* Recupero l'id del post da mostrare da $_GET */
			$post_id = $_GET['id'];
			 
			/* Se non è stato passato alcun id al controller ritorno alla pagina principale */
			if(!isset($post_id) || $post_id == ""){
				header("Location:index.php");
				exit;
			}
			 
			/* Creo un istanza del modello blog, per poter utilizzare i suoi metodi */
			$blog = new Post($this->registry->db);
			$post_data = $blog->get_post_by_id($post_id);
			$nodi_data = $blog->get_nodi();
 
			/* Se non ho trovato nessun post con l'id specificato torno alla pagina principale */
			if($post_data == NULL){
				header("Location:index.php");
				exit;
			}
			 
			/* Preparo i risultati della query da passare alla vista */
			$this->registry->template->post = $post_data;
			 
			/* Show the view */
			$this->registry->template->show('posts');
		}

		public function new_post(){
			/* Show the view */
			$this->registry->template->title = 'FluidLearn';
			$blog = new Post($this->registry->db);
			$nodi_data = $blog->get_nodi();
			$this->registry->template->nodo = $nodi_data;
			$unita_data = $blog->get_unita();
			$this->registry->template->unita = $unita_data;
			$this->registry->template->show('new_post');
		}
		
		public function draft(){
			/* Set all template vars, this will be used in the view */
			$this->registry->template->title = 'FluidLearn';
			 
			/* This instruction allows the view to execute modules */
			$this->registry->template->modules = $this->registry->modules;
			 
			/* Crea un istanza del modello e recupera l'elenco dei post */
			$blog = new Post($this->registry->db);
			$post_list = $blog->get_drafts_meta();
			 
			/* Ora possiamo passare i dati alla vista, che si occuperà di formattarli *
			* come più ci piace e mostrarli                                           */
			 
			$this->registry->template->posts = $post_list;
			 
			/* Show the view */
			$this->registry->template->show('drafts');			


		}			
		
		public function delete_draft(){
			/* Show the view */
			$blog = new Post($this->registry->db);
			$nodi_data = $blog->get_nodi();
			$this->registry->template->nodo = $nodi_data;
			$unita_data = $blog->get_unita();
			$this->registry->template->unita = $unita_data;
			$this->registry->template->show('delete_draft');
		}

		/* Salvo il post ricevuto tramite il form e reindirizzo all'homepage */
		public function creaPost(){

			$titolo = $_POST['post_title'];
			$testo = $_POST['post_content'];
			$nodo = $_POST['post_nod'];
			$unit = $_POST['post_unita'];
			$visibilita = $_POST['post_visib'];
			if(isset($_POST['post_draft']))
				$isdraft = $_POST['post_draft'];
			else
				$isdraft = 0;
			if($titolo == TRUE && $testo == TRUE && $unit == TRUE){
				$p = new Post($this->registry->db);
				$t = new Testo($this->registry->db);
				$t->setContenuto($testo);

				$p->setInfoTitolo($titolo);
				$p->setInfoVisib($visibilita);
				$p->setInfoTesto($t);
				$p->setInfoUDA($unit);
				$p->setInfoNodo($nodo);
				
				$idContr = $p->salvaContributo();
				echo $idContr.'</br>';
				$idTesto = $t->salvaTesto($idContr, $t->getContenuto());
				if($_FILES['post_ris']['size']){
					include 'includes/upload.php';
					$ris = $name;
					$risorsa = new Risorsa($this->registry->db);
					$file = new File($this->registry->db);
					$file->setPercorso($ris);
					$idFile = $file->salvaFile($ris);
					$risorsa->setIdFile($idFile);
					$idRisorsa = $risorsa->salvaRisorsaDaPost($idContr, $idFile,""); 
				}else {
					if($_POST['post_link'] != ''){
						$link = $_POST['post_link'];
						$risorsa = new Risorsa($this->registry->db);
						$risorsa->setLink($link);
						$idRisorsa = $risorsa->salvaRisorsaDaPost($idContr, "", $link);
					}
					else 
						$idRisorsa = "NULL";
				}
				$p->setInfoRisorsa($idRisorsa);
				$p->salvaPost($idContr,$isdraft,$idTesto,$idRisorsa);
				//header("Location:index.php");
			} else {	
				$this->new_post();				
				echo "E' obbligatorio inserire i campi Titolo, Testo e Unita' di riferimento";
				return;
			}
			/* Reindirizza all'index */
			
		}
		 
	}
?>
