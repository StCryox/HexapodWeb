<?php
	class ParcoursController {
		
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

			$jsondata = json_decode($parcours);	
			
			$parcoursList = array();
				foreach ($jsondata as $data) {
					$parcours2 = Parcours::withId($data->id,$data->name,$data->command);
					array_push($parcoursList,$parcours2);
				}

			require_once('views/pages/parcours/datatable.php');
		}

		public function delete() {
			if(!empty($_GET['id'])) {

				require_once('controllers/php-rest-client/rest_client.php');
					$parcours = RestClient::connect('localhost')
						->delete('./HexapodApi/api/parcours_controller.php')				
						->param('id', $_GET['id'])
						->run();	
						echo '<div class="container"><div class="row"><h4>'.$parcours.'</h4></div></div>'; 	
			}
		}

		public function create() {	
			if(!empty($_POST['name'])) {

				$data =  new Parcours($_POST['name'], $_POST['command']);

				require_once('controllers/php-rest-client/rest_client.php');
					$parcours = RestClient::connect('localhost')
						->post('./HexapodApi/api/parcours_controller.php')
						->param('id', 0)
						->param('name', $data->name)
						->param('command', $data->command)
						->run();
						echo '<div class="container"><div class="row"><h4>'.$parcours.'</h4></div></div>'; 		
			}	
		}

		public function edit() {
			if(!empty($_GET['id'])) {

				//$command = $_POST['command1']."+".$_POST['command2'];
				//$data =  new Parcours($_POST['name'],$command);

				require_once('controllers/php-rest-client/rest_client.php');
					$parcours = RestClient::connect('localhost')
						->post('./HexapodApi/api/parcours_controller.php')
						->param('id', $_GET['id'])
						->param('name', "taAta")
						->param('command', "tata")
						->run();
						//echo '<div class="container"><div class="row"><h4>'.$parcours.'</h4></div></div>'; 	
						//var_dump($parcours);
						//echo $_GET['id'];	
			}
		}
	}

?>
