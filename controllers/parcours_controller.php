<?php
	class ParcoursController {
		
		public function datatable() {
			require_once('controllers/php-rest-client/rest_client.php');
			$parcours = RestClient::connect('localhost')
					->get('./HexapodApi/api/parcours_controller.php')
					->run();

			$jsondata = json_decode($parcours);
			$parcoursList = array();
			foreach ($jsondata as $data) {
				$parcours2 = new Parcours($data->id,$data->name,$data->command);
				array_push($parcoursList,$parcours2);
			}

			require_once('views/pages/parcours/datatable.php');
		}

		public function delete() {
			require_once('controllers/php-rest-client/rest_client.php');
			//if ((isset($_POST['id']) && !empty($_POST['id'])){
				//echo $_GET['name'];
				//echo "test";
				$parcours = RestClient::connect('localhost')
				->delete('./HexapodApi/api/parcours_controller.php')
			//	->param('id', $_get['name']);
				->run();
			//}


			
			require_once('views/pages/parcours/datatable.php');		
		}

		public function create() {	
			if (isset($_GET['postback'])) {
			//	if ((isset($_POST['name']) && !empty($_POST['name']))
					//&& (isset($_POST['command']) && !empty($_POST['command'])))
					//{
						//$data = new Parcours($_POST['name'],$_POST['command']);
						// appel client REST
						require_once('controllers/php-rest-client/rest_client.php');
						$parcours = RestClient::connect('localhost')
								->post('./HexapodApi/api/parcours_controller.php')
								//->param('name', $data->name)
								//->param('command', $data->command)
								->param('name', 'tata')
								->param('command', 'z+2;s+4;d+3;')
								->run();
						var_dump($parcours);
						echo $parcours;

						if(empty($_POST['valeur']))
						$error_message = 'Erreur lors de l\'ajout';
						else
						$success_message = 'Ajouté avec succès !';
					//}	
			}

			require_once('views/pages/parcours/create.php');

		}

		public function edit() {
			require_once('views/pages/parcours/edit.php');
		}
	}

?>
