<?php
	if (isset($_GET['controller'])) {
		$controller = $_GET['controller'];
		
		$action = isset($_GET['action'])
					? $_GET['action']
					: 'index';
	}
	else {
		$controller = 'pages';
		$action = 'index';
	}

	if (isset($_GET['json'])) {
		require_once 'views/routes.php';
	}
	else {
		require_once 'views/layout.php';
	}
?>
