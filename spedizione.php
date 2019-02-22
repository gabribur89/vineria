<?php 

include "connect_to_db.php"; 

?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>WineShop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/lightbox.css"/>
		<script src="js/bootstrap.min.js"></script>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="homepage.php" class="navbar-brand">WineShop</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="homepage.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="col-md-12">
	<div class="panel panel-primary">
					<div class="panel-heading">Scegli la modalità di spedizione</div>
					<div class="panel-body">
				<form action="ordini.php" method="post">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sceltaspedizione" id="paccocelere1" value="7.50" checked>
							<label class="form-check-label" for="exampleRadios1">
								<!--<img src="\img\bartolini-pallet.png" height="40" width="40">-->
								Paccocelere 3 (+7.50 €) - Consegna in 3 giorni lavorativi
							</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sceltaspedizione" id="corriere" value="12.50">
							<label class="form-check-label" for="exampleRadios2">
								Corriere Espresso (+12.50€) - Consegna in 1 giorno lavorativo
							</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sceltaspedizione" id="incaricato" value="15.00">
							<label class="form-check-label" for="exampleRadios3">
								tramite un nostro incaricato (+15.00€ con omaggio gastronomico!) - Consegna in 5 o 7 giorni lavorativi
							</label>
					</div>
						
						
					</div>
					</div>
	</div>
						<div class="text-right">
							
								<button id="concludi" type="submit" class="btn btn-primary">Concludi Ordine</button>
							
						</div>
	</form>
</body>
</html>