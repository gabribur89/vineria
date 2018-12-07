<?php

include "functions.php";

?> 
<html>
	<head>
		<meta charset="UTF-8">
		<title>WineShop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/lightbox.css"/>
		<link rel="stylesheet" href="css/scrollbar.css"/>
		<script src="js/jquery.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="main.js"></script>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		ma con la nuova versione scaricata di jquery non c'è bisogno di questa libreria, è comunque un'alternativa-->
		<script src="js/bootstrap.min.js"></script>
	</head>
<body>
		
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="homepage.php" class="navbar-brand">WineShop</a>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-2"></div>
					<div class="panel panel-primary">
						<div class="panel-heading">Login</div>
							<div class="panel-body">
								<?php viewLogin(); ?>
							</div>
						</div>
					</div>
		</div>
	</div>
</body>
</html>