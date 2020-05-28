<?php
	class ParcoursController {
		
		public function datatable() {
			//client rest

			$parcoursList = array(
				new Parcours("commande 1", "nom 1"),
				new Parcours("commande 2", "nom 2")
			);

			require_once('views/pages/parcours/datatable.php');
		}

		public function create() {	
			if (isset($_GET['postback'])) {
				// appel client REST

				if(empty($_POST['valeur']))
				$error_message = 'Erreur lors de l\'ajout';
				else
				$success_message = 'Ajouté avec succès !';
				
			}

			require_once('views/pages/parcours/create.php');

		}

		public function edit() {
			require_once('views/pages/parcours/edit.php');
		}
	}

?>
