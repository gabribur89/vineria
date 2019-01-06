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

function aggiornaQuantita{
	/*recupero dalla post id e quantità
	per ognuno di questi confrontare l'id trovato tramite cookie - doppio ciclo
	uso arraykeys
	*/
	
		// $a = $_POST
		/* $a = array {
		   '1000' ->  '10',
		   '1001' ->  '4',
		}*/

		// fai copia del carrello
		$carrello_aggiornato = $_COOKIE['carrello'];

		// estrae gli id prodotto da $a e li mette in $ids
		$ids = array_keys($a);

		//per ogni id prodotto dento $ids
		foreach($ids as &$id){
			  // vado a cercare l'oggetto nel carrello con lo stesso id
			  foreach($carrello_aggiornato as &$dati){
					 // ho trovato quello giusto allora modifico la quantità
					 if ($id == $dati['idprodotto']){
							  $dati['qta'] = $a[$id];
					 }

			 }
		}

		setcookie($carrello_aggiornato);
		}

function totaleProdotti($con){

	$totale = 0;
	
	$newcarrello = array();
	
	if((isset($_COOKIE["oggetticarrello"]) & !empty($_COOKIE["oggetticarrello"]))){
		$carrello = unserialize($_COOKIE["oggetticarrello"]);
		
			//var_dump($carrello);
			
			foreach($carrello as &$dati){
				
					$nuovaquantita = controllaStock($dati["idprodotto"],$dati["qta"],$con);
					
					
					$newprodotto = array(
					
					"idprodotto" => $dati["idprodotto"],
					"immagineprodotto" => $dati["immagineprodotto"],
					"nomeprodotto" => $dati["nomeprodotto"],
					"qta" => $nuovaquantita,
					"prezzo" => $dati["prezzo"],
 					
					);
					
					array_push($newcarrello,$newprodotto);
					
				
					 echo " 
							<div class='row'>
							<div class='col-md-2'>{$dati['immagineprodotto']}</div>
							<div class='col-md-2'><b>{$dati['nomeprodotto']}</b></div>
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
	
	$sql = "SELECT DISTINCT stock.codice_stock, qta_stock FROM prodotto INNER JOIN stock ON prodotto.codice_stock = stock.codice_stock WHERE id_prodotto = $idprodotto";
	$run_query = mysqli_query($con,$sql);
	$risultato = $quantita;
	
	
	
	while($row = mysqli_fetch_array($run_query)){
	
		//var_dump($row);
		
		if ($row["qta_stock"] < $quantita){
			$risultato = $row["qta_stock"];
			echo '<div class="col-md-2">è stato impostato automaticamente il numero massimo presente in stock per questo prodotto....</div>';
			
		}
		
	}

	return $risultato;
	
	//echo"ciao3";
}

function aggiornaStock($qta,$idprod,$con){
	
		$sql_stock="UPDATE stock INNER JOIN prodotto ON stock.codice_stock = prodotto.codice_stock SET qta_stock=qta_stock - ? 
				    WHERE prodotto.id_prodotto=?";
		
		$query = $con->prepare($sql_stock);
		$query->bind_param("ii", $qta, $idprod);
		
		if (!$query->execute()){
			printf("error %s\n", $con->error);
		}
	}
	
	


function inserisciOrdine($idutente,$con){

$sql_insert = "INSERT INTO ordine (id_utente) VALUES ($idutente)";	
	
	//var_dump(mysqli_query($con,$sql_insert));
	//var_dump($sql_insert);
	
	if(mysqli_query($con,$sql_insert)) {
		$idordine = mysqli_insert_id($con);
		
		if((isset($_COOKIE["oggetticarrello"]) & !empty($_COOKIE["oggetticarrello"]))){
			$carrello = unserialize($_COOKIE["oggetticarrello"]);
				foreach($carrello as &$dati){
					$sql_details = "INSERT INTO dettagli (id_ordine, id_prodotto, qta_ordine) VALUES (?,?,?)";
					$query = $con->prepare($sql_details);

					$query->bind_param("iii", $idordine, $dati['idprodotto'], $dati['qta']);
					/* execute query */
					//$query->execute();
					if (!$query->execute()){
						printf("error %s\n", $con->error);
					}
					echo"cacasasc";
					var_dump($dati['qta']);
					aggiornaStock($dati['qta'],$dati['idprodotto'],$con);
				}
				
		}
		
	} else 
	{
        printf("Errore %s\n", $con->error);
		echo "mi dispiace non è stato recuperato niente....";
		
	}
	
	
	/*qta carrello da sottrarre alla qta in stock UPDATE stock SET qta_stock=12 WHERE codice_stock=10
	UPDATE stock INNER JOIN prodotto ON stock.codice_stock = prodotto.codice_stock SET qta_stock=12 WHERE prodotto.id_prodotto=1000
	
	qta_stock si può sottrarre*/

	
}

?>