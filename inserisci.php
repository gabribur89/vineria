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
		<script src="admin.js"></script>
		<script src="js/lightbox.js"></script>
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
				<ul class="nav navbar-nav navbar-right">
				<?php sessioneUtente(); ?>
				</ul>
			
			
		</div>
		</div>
			
			
	<p><br/></p>
	<p><br/></p>
	
				
				
				<div class="col-md-8" id="messaggio">
				<!--alert per messaggio-->
				</div>
	
	
	
	<p><br/></p>
			
			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Pannello di Inserimento Prodotti</div>
					<div class="panel-body">
					<div class='row'>
					
					<form method="post" id="data">
		
					<div class="row">
						<div class="col-md-12">
							<label for="mail">Prezzo</label>
								<input type ="text" id ="prezzo" name="prezzo" class="form-control">
							</div>
					</div>
						<div class="row">
						<div class="col-md-12">
							<label for="mail">Quantità</label>
								<input type ="text" id ="quantita" name="quantita" class="form-control">
							</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<label for="mail">Data Aggiunta</label>
								<input type ="date" id ="dataaggiunta" name="dataaggiunta" class="form-control">
							</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<label for="mail">Nome Prodotto</label>
								<input type ="text" id ="nomeprodotto" name="nomeprodotto" class="form-control">
							</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<label for="mail">Anno Prodotto</label>
								<input type ="text" id ="annoprodotto" name="annoprodotto" class="form-control">
							</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<label for="mail">Descrizione Prodotto</label>
								<input type ="text" id ="descrizioneprodotto" name="descrizioneprodotto" class="form-control">
							</div>
						</div>
						<div class="form-group">
						  <label for="sel1">Seleziona Cantina:</label>
						  <select class="form-control" id="nomecantina" name="nomecantina">
							<?php ottieniNomeCantina($con); ?>
						  </select>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<label for="mail">Categoria</label>
								<input type ="text" id ="categoria" name="categoria" class="form-control">
							</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<label for="mail">ID Categoria</label>
								<input type ="text" id ="idcategoria" name="idcategoria" class="form-control">
							</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<label for="mail">IMG</label>
								<input type ="file" id ="image" name="image" class="form-control">
							</div>
						</div>
					
					</div>
					</div>
					</div>
					</div>
					
					
					<button id="salva" type="submit" class="btn btn-success btn-lg">Salva!</button>
					
					
					</form>


</body>
</html>