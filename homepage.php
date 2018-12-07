<?php
session_start();

include "functions.php";
include "connect_to_db.php";

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
		<script src="js/lightbox.js"></script>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		ma con la nuova versione scaricata di jquery non c'è bisogno di questa libreria, è comunque un'alternativa-->
		<script src="js/bootstrap.min.js"></script>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">WineShop</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Carrello<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="ScrollStyle">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="col-md-3">I tuoi prodotti</div>
									<div class="col-md-4">
										<button id="svuotacarrello" style="float:right;"  class="btn btn-danger btn-xs">Svuota Carrello</button>
									</div>
								<div id="carrelloprodotti" class="row">
								<?php 
							
								if(isset($_COOKIE["oggetticarrello"]) & !empty($_COOKIE["oggetticarrello"])) { 
								  //var_dump($_COOKIE["oggetticarrello"]);
								  $carrello = unserialize($_COOKIE["oggetticarrello"]);
								?>		
								
								<ul class = 'list-group'>
								
								<?php
									var_dump($carrello);
									foreach($carrello as &$dati){
										echo "<img src = {$dati['immagineprodotto']}/>
										<li class ='list-group-item'>{$dati['nomeprodotto']} {$dati['qta']} {$dati['prezzo']}</li>";
									}
								?>
								
								</ul>
								
								<?php } else $_SESSION["carrello"] = array(); ?>
								
									<!--<div class="col-md-3">#ID</div>-->
								</div>
							</div>
								<div class="panel-body"></div>
							<div class="panel-footer">
								<div class="text-right">
									<form action="ordini.php" method="get">
										<input id="checkoutcarrello" type="submit" value="Checkout Carrello"></input>
									</form>
								</div>
							</div>
					</div>
					</div>
				</li>
				
			<?php sessioneUtente(); ?>


			</ul>
		
	</div>
	<p></br></p>
	<p></br></p>
	<p></br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="ottieni_tipo">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Tipologia Vino</h4></a></li>
					<li><a href="#">Categorie</a></li>
					<li><a href="#">Categorie</a></li>
					<li><a href="#">Categorie</a></li>
					<li><a href="#">Categorie</a></li>
				</div>-->
				<div id="ottieni_cantina">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Cantina Produttrice</h4></a></li>
					<li><a href="#">Marca</a></li>
					<li><a href="#">Marca</a></li>
					<li><a href="#">Marca</a></li>
					<li><a href="#">Marca</a></li>
				</div>-->
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12" id="prod_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Prodotti</div>
					<div class="panel-body">
						<div id ="ottieni_prodotto">
							<!---prodotti attraverso ajax jquery-->
						</div>
						<div id ="immagineprodotto">
							<!---prodotti attraverso ajax jquery-->
						</div>
						
						
					
					</div>
					<div class="panel-footer">&copy; 2018 <a href="mailto:boss89al@gmail.com">boss89al</a></div>
				</div>
		</div>
	</div>
</body>

</html>

