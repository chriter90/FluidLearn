<?php

	class errorController extends baseController{
		
		public function index(){
			$this->registry->template->error = "Errore 404 - Page not found";
			$this->registry->template->show('error404');
		}
		
		public function errorLogin(){
			$this->registry->template->error = "Username o Password errati!";
			$this->registry->template->show('error');
		}
	}

?>
