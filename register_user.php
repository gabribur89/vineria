<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>WineShop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery.js"></script>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		ma con la nuova versione scaricata di jquery non c'è bisogno di questa libreria, è comunque un'alternativa-->
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
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
			<div class="col-md-8" id="registrati_msg">
				<!--alert per registrazione avvenuta-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Registrazione Utente</div>
					<div class="panel-body">
					<form method="post">
						<div class="row">
							<div class="col-md-6">
								<label for="nome">Nome</label>
								<input type ="text" id ="nomeutente" name ="nomeutente" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="cognome">Cognome</label>
								<input type ="text" id ="cognomeutente" name="cognomeutente" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="indirizzo">Indirizzo</label>
								<input type ="text" id ="indirizzo" name="indirizzo" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="citta">Citta'</label>
								<input type ="text" id ="citta" name="citta" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="cap">CAP</label>
								<input type ="text" id ="cap" name="cap" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="nazione">Nazione</label>
								<input type ="text" id ="nazione" name="nazione" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="datanascita">Data di Nascita</label>
								<input type ="date" id ="datanascita" name="datanascita" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="mail">E-mail</label>
								<input type ="text" id ="mail" name="mail" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="password">Password</label>
								<input type ="password" id ="password" name="password" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="r_password">Ripeti Password</label>
								<input type ="password" id ="conferma_password" name="conferma_password" class="form-control">
							</div>
						</div>
						<p><br/></p>
						<div class="row">
							<div class="col-md-12">
								<input style="float:right;" value="Registrati!" type ="button" id ="registrati" name="registrati" class="btn btn-success btn-lg">
							</div>
						</div>
					</div>
					</form>
					<div class="panel-footer"></div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>