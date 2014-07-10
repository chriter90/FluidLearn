<?php
 
	class corsoController extends baseController{
	 
		public function index(){
 
			/* Recupero l'id del post da mostrare da $_GET */
			$corso_nome = $_GET['nome'];
			$corso_anno = $_GET['anno'];

			 
			/* Se non è stato passato alcun corso al controller ritorno alla pagina principale */
			if(!isset($corso_nome) || $corso_nome == "" || !isset($corso_anno) || $corso_anno == ""){
				header("Location:index.php");
				exit;
			}
			 
			/* Creo un istanza del modello corso, per poter utilizzare i suoi metodi */
			$corso = new Corso($this->registry->db);
			$corso->setNome($corso_nome);
			$corso->setAnno($corso_anno);
			
			echo $corso->getNome(). ' '.$corso->getAnno();
			//$nodi_data = $blog->get_nodi();
 
			/* Se non ho trovato nessun post con l'id specificato torno alla pagina principale 
			if($post_data == NULL){
				header("Location:index.php");
				exit;
			}
			 
			/* Preparo i risultati della query da passare alla vista 
			$this->registry->template->post = $post_data;
			 
			/* Show the view 
			$this->registry->template->show('posts');*/
		}
}

?>