<?php
	class ParcoursController {
		private $_success_message = '';
		private $_error_message = '';
		public $_parcoursData = array();
		public $parcoursList = array();
			
		private function isJson($string) {
			json_decode($string);
			return (json_last_error() == JSON_ERROR_NONE);
		   }

		public function datatable() {
			if (isset($_GET['postback']))
				$this->create();
			else if(isset($_GET['delete']))
				$this->delete();
			else if(isset($_GET['update']))
				$this->edit();

			require_once('controllers/php-rest-client/rest_client.php');
				$parcours = RestClient::connect('localhost')
						->get('./HexapodApi/api/parcours_controller.php')
						->run();
								
			
			if($this->isJson($parcours)) {
				$jsondata = json_decode($parcours);	
				foreach ($jsondata as $data) {
					$parcours2 = Parcours::withId($data->id,$data->name,$data->command);
					array_push($this->parcoursList,$parcours2);
				}
			}
			else
				$this->_error_message = 'Aucun parcours n\'a été trouvé.';
			
				

			require_once('views/pages/parcours/datatable.php');
		}

		public function delete() {
			if(!empty($_GET['id'])) {

				require_once('controllers/php-rest-client/rest_client.php');
					$parcours = RestClient::connect('localhost')
						->delete('./HexapodApi/api/parcours_controller.php')				
						->param('id', $_GET['id'])
						->run();		
						$this->_success_message = 'Le parcours a été supprimé.';
			}
		}

		public function create() {	
			if(!empty($_POST['name']) && !empty($_POST['command'])) {

				$this->_parcoursData['parcours'] = array(
					'name' 	  => $_POST['name'],
					'command' => $_POST['command']
				);
				require_once('controllers/php-rest-client/rest_client.php');
					$parcours = RestClient::connect('localhost')
						->post('./HexapodApi/api/parcours_controller.php')	
						->header('Content-Type', 'application/json')
						->param($this->_parcoursData)
						->run();

					if($parcours == '400 : La syntaxe de la requête est erronée.')
						$this->_error_message = 'Le nom de parcours existe déjà.';
					else
						$this->_success_message = 'Le parcours a été crée.';	
			}	
			else 
				$this->_error_message = 'Les champs ne peuvent être vide.';
		}

		public function edit() {
			
				if(!empty($_POST['namePutVal']) && !empty($_POST['commandPutVal'])) {
					
					$this->_parcoursData['parcours'] = array(
						'name' 	  => $_POST['namePutVal'],
						'command' => $_POST['commandPutVal']
					);
					
					require_once('controllers/php-rest-client/rest_client.php');
						$parcours = RestClient::connect('localhost')
							->put('./HexapodApi/api/parcours_controller.php?id='.$_POST['idPutVal'])
							->header('Content-Type', 'application/json')
							->param($this->_parcoursData)
							->run();
							$this->_success_message = 'Le parcours a été modifié.';		
							
				}
				else 
					$this->_error_message = 'Les champs ne peuvent être vide.';	
			
		}
	}

?>
