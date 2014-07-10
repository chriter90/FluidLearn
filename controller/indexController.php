<?php
 
/* This is the main controller for the site index */
 
	class indexController extends baseController{
 
		/* Implement index controller */
		public function index(){
		 
			/* Set all template vars, this will be used in the view */
			$this->registry->template->title = 'FluidLearn';
			 
			/* This instruction allows the view to execute modules */
			$this->registry->template->modules = $this->registry->modules;
			
			$corsi = new Corso($this->registry->db);
			$elenco_corsi = $corsi->get_courses_meta();
			
			$this->registry->template->corsi = $elenco_corsi;

			
			/* Crea un istanza del modello e recupera l'elenco dei post 
			$blog = new Post($this->registry->db);
			$post_list = $blog->get_posts_meta();
			 
			/* Ora possiamo passare i dati alla vista, che si occuperà di formattarli *
			* come più ci piace e mostrarli                                           
			 
			$this->registry->template->posts = $post_list;*/
			 
			/* Show the view */
			$this->registry->template->show('index');
		 
		}
	}
 
?>
