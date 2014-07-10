<?php
 
	class loginController extends baseController{
	 
		public function index(){
			/* This instruction allows the view to execute modules */
			$this->registry->template->modules = $this->registry->modules;
			/* Show the view */
			$this->registry->template->show('login');
		}
		
		public function login(){
			$login = $_POST['login'];
			$password = $_POST['password'];
			$perm = $_POST['permessi'];
			
			if($perm == "studente")
				$this->loginStudente($login, $password);
			else if($perm == "docente")
				$this->loginInsegnante($login, $password);
		}

		public function loginStudente($login, $password){
			if($login == TRUE && $password == TRUE){
				$studente = new Studente($this->registry->db,$login, $password);
				if($studente->signin())
					header("Location:index.php");
				else
					header("Location:index.php?rt=error/errorLogin");
				
			} 
		}
		
		public function loginInsegnante($login, $password){
			if($login == TRUE && $password == TRUE){
				$insegnante = new Insegnante($this->registry->db,$login, $password);
				if($insegnante->signin())
					header("Location:index.php");
				else
					header("Location:index.php?rt=error/errorLogin");
				
			} 
		}
	}
?>

