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
	<p><br/></p>
			
			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Pannello di Amministrazione Prodotti</div>
					<div class="panel-body">
					<div class='row'>
					
					<form>
					
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">        
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="defaultCheck1" name="selectAll" value="0">
									<label class="form-check-label" for="defaultCheck1"></label>
							</div>
						  </th>
						  <th scope="col">ID Stock</th>
						  <th scope="col">ID Prodotto</th>
						  <th scope="col">Prezzo</th>
						  <th scope="col">Quantità</th>
						  <th scope="col">Data Aggiunta</th>
						  <th scope="col">Nome Prodotto</th>
						  <th scope="col">Anno Prodotto</th>
						  <th scope="col">Descrizione Prodotto</th>
						  <th scope="col">Nome Cantina</th>
						  <th scope="col">Categoria</th>
						  <th scope="col">ID Categoria</th>
						  <th scope="col">IMG</th>
						</tr>
					  </thead>
					  <tbody>
						<?php visualizzaStock($con);?>
						</tbody>
					  </table>
					</div>
					</div>
					</div>
					</div>
					
					
					<button id="inserisci" type="submit" class="btn btn-primary">Inserisci</button>
					<button id="elimina" type="submit" class="btn btn-primary">Elimina</button>
					
					</form>


</body>
</html>