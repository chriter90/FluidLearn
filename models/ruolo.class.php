<?php

	abstract class Ruolo implements Docente {
		protected Docente role;

		public function __construct(Docente doc) {
			role = doc;
		}
		
		public getAttivita(){
		
		}
	}

?>
