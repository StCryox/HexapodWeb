<DOCTYPE HTML>
<html>
	<head>
		<title>Gestion de l'hexapode</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<!-- Bootstrap core CSS -->
		<link href="views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
	</head>

	<body>
	
		<!-- Header -->
		<div class="header">
		<?php require_once 'pages/src/header.php'; ?>
			<div class="clearfix"></div>
		</div>

		<!-- Content -->
		<?php require_once 'routes.php'; ?>
		
		<!-- Footer -->
		<div class="footer">
			<div class="clearfix"></div>
		</div>
					
		<!-- Bootstrap core JavaScript -->
		<script src="views/vendor/jquery/jquery.min.js"></script>
		<script src="views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		
	</body>
</html>