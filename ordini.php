<?php

session_start();
include "connect_to_db.php";
include "functions.php";

?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>WineShop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-12" id="msg_carrello">
			<!--Messaggio dal carrello....-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Riepilogo Ordine</div>
					<div class="panel-body">
					<div class='row'>
						<div class='col-md-2'></div>
						<div class='col-md-2'><b>Prodotto</b></div>
						<div class='col-md-2'><b>Quantità</b></div>
						<div class='col-md-2'><b>Prezzo (€)</b></div> 
					</div>
						<?php
							var_dump($_POST);
							$totale = totaleProdotti($con);
						?>
						</div>
				</div>
					<div class="panel-footer">

						<div class="row">
							<div class="col-md-2">
							<div class="mr-1">
							Totale senza spedizione:
							<?php	echo $totale;			?>
							</div>
							</div>
						</div>
						<?php 
						$totalefinale = 0; 
							if(isset($_POST["sceltaspedizione"])){
								$totalefinale = $totale + $_POST["sceltaspedizione"];
							}
						?>
						<div class="row">
						Totale con la spedizione inclusa:
						<?php echo $totalefinale; 			?>
						</div>
						<div class="text-right">
							
							<?php
							
							
							
								if(isset($_POST["sceltaspedizione"])){
									
									echo ' <div class="col-md-12">
											<div class="panel panel-primary">
												<div class="panel-heading">Scegli la modalità di pagamento</div>
												<div class="panel-body">
											<form action="concludi.php" method="post">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="sceltapagamento" id="paypal">
														<label class="form-check-label" for="exampleRadios1">
															Paypal
														</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="sceltapagamento" id="bonifico">
														<label class="form-check-label" for="exampleRadios2">
															Bonifico Bancario
														</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="sceltapagamento" id="contrassegno">
														<label class="form-check-label" for="exampleRadios3">
															Contrassegno (Paga alla consegna)
														</label>
												</div>
												<div><button id="concludi1" type="submit" class="btn btn-primary">Concludi Ordine</button></div>
												</form>
												</div>
												</div>
											</div>';
									
								}
									

								
								else echo '
											<form action="spedizione.php" method="get">
												<button id="spedizione" type="submit" class="btn btn-primary">Step 2: Spedizione</button>
										    </form>
										   ';
							?>
							
						</div></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>