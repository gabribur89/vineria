<?php 

include "connect_to_db.php";


function viewLogin(){
	
	echo '
				<div style="width:300px;">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Login
					</div>
					<div class="panel-heading">
						<label for="email">
							E-mail
						</label>
					<input type="text" class="form-control" id="email1"/>
						<label for="password">
								Password
						</label>
					<input type="password" class="form-control" id="password1"/>
					<p><br/></p>
					<input type="button" class="btn btn-success" style="float:right;" id="login1" value="Login">
				</div> 
				<div class="panel-footer" id="e-msg"><a href="register_user.php"> Non sei registrato? Clicca qui!</a></div>
				</div>
				
		';
}

function sessioneUtente(){

if(isset($_SESSION["id_utente"]))
					{
						echo 
						
						'<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
						Benvenuto nel sito, '.$_SESSION["nomeutente"].'</a>
						<ul class="dropdown-menu">
						<li><a href="carrello.php"><span class="glyphicon glyphicon-shopping-cart"></span>Checkout Carrello</a></li>
						<li class="divider"></li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Esci</a></li>
						</ul></li></div>';
						
						
					} 
						else
						{

							echo '
							<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Login</a>
							<ul class="dropdown-menu">';
							
							viewLogin();
							
						}
}

function totaleProdotti($con){

	$totale = 0;
	
	$newcarrello = array();
	
	if((isset($_COOKIE["oggetticarrello"]) & !empty($_COOKIE["oggetticarrello"]))){
		$carrello = unserialize($_COOKIE["oggetticarrello"]);
			foreach($carrello as &$dati){
				
					$nuovaquantita = controllaStock($dati["idprodotto"],$dati["qta"],$con);
					
					
					$newprodotto = array(
					
					"idprodotto" => $dati["idprodotto"],
					"immagineprodotto" => $dati["immagineprodotto"],
					"nomeprodotto" => $dati["nomeprodotto"],
					"nuovaquantita" => $nuovaquantita,
					"prezzo" => $dati["prezzo"],
 					
					);
					
					array_push($newcarrello,$newprodotto);
					
				
					 echo " 
							<div class='row'>
							<div class='col-md-2'>{$dati['immagineprodotto']}</div>
							<div class='col-md-2'><b>{$dati['nomeprodotto']}'yee'</b></div>
							<div class='col-md-2'><b>{$nuovaquantita}</b></div>
							<div class='col-md-2'><b>{$dati['prezzo']}</b></div>
							</div>
						  ";
					
					$totale = $totale + $dati['prezzo'];
				 }
				 
				 setcookie("oggetticarrello",serialize($newcarrello),time()+50000, "/");
				
	}

	return $totale;
	
}

function mostraRiepilogo(){
	
		if((isset($_COOKIE["oggetticarrello"]) & !empty($_COOKIE["oggetticarrello"]))){
		$carrello = unserialize($_COOKIE["oggetticarrello"]);
			foreach($carrello as &$dati){
					 echo " 
							<div class='row'>
							<div class='col-md-2'>{$dati['immagineprodotto']}</div>
							<div class='col-md-2'><b>{$dati['nomeprodotto']}</b></div>
							<div class='col-md-2'><b>{$dati['qta']}</b></div>
							<div class='col-md-2'><b>{$dati['prezzo']}</b></div> 
							</div>
							
						  ";
	
			}
		}
}

function controllaStock($idprodotto,$quantita,$con){
	
	//echo $idprodotto;
	//var_dump($con);
	
	$sql = "SELECT DISTINCT stock.codice_stock, qta_stock FROM prodotto INNER JOIN stock ON prodotto.codice_stock = stock.codice_stock WHERE id_prodotto = 1000";
	$run_query = mysqli_query($con,$sql);
	$risultato = $quantita;
	
	
	while($row = mysqli_fetch_array($run_query)){
		
		if ($row["qta_stock"] < $quantita){
			$risultato = $row["qta_stock"];
			
		}
		
	}

	return $risultato;
	
	//echo"ciao3";
}

		
		
		
		
		// decrenta con mysql la quantita in stock nel Database
		// usando il codicesotck per decrementare la corrispondente riga nel DB
		//echo "ciao1";
		//var_dump($row);
		//echo "ciao2";
/* 
if risultato < quantita
  messaggio problema
  
else 
(query) inserimento ordine = decremento stock: INSERT INTO ordine.....

per ogni elemento del carrello
*/

?>