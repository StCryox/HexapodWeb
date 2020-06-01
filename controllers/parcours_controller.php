<?php
	class ParcoursController {
		
		public function datatable() {
			if (isset($_GET['postback']))
				$this->create();
			else if(isset($_GET['delete']))
				$this->delete();
				
			require_once('controllers/php-rest-client/rest_client.php');
			$parcours = RestClient::connect('localhost')
					->get('./HexapodApi/api/parcours_controller.php')
					->run();

			$jsondata = json_decode($parcours);
			$parcoursList = array();
			foreach ($jsondata as $data) {
				$parcours2 = Parcours::withId($data->id,$data->name,$data->command);
				array_push($parcoursList,$parcours2);
			}

			require_once('views/pages/parcours/datatable.php');
		}

		public function delete() {
			$parcours_id = $_GET['id'];
			require_once('controllers/php-rest-client/rest_client.php');
				$parcours = RestClient::connect('localhost')
				->delete('./HexapodApi/api/parcours_controller.php')				
				->param('id', $parcours_id)
				->run();	
		}

		public function create() {	
			$command = $_POST['command1']."+".$_POST['command2'];
			$data =  new Parcours($_POST['name'],$command);
			require_once('controllers/php-rest-client/rest_client.php');
			$parcours = RestClient::connect('localhost')
					->post('./HexapodApi/api/parcours_controller.php')
					->param('name', $data->name)
					->param('command', $data->command)
					->run();
			echo $parcours;
			if(empty($_POST['name']))
			$error_message = 'Erreur lors de l\'ajout';
			else
			$success_message = 'Ajouté avec succès !';

		}

		public function edit() {
			require_once('views/pages/parcours/edit.php');
		}
	}

?>
