<?php
	class PagesController {
		
		public function index() {
			$description = 'Bienvenue sur le site de gestion de l\'hexapode.';

			require_once('views/pages/index.php');
		}

		public function error() {
			require_once('views/pages/error.php');
		}
	}
?>