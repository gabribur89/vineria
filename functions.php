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
						
						if(isset($_SESSION["ruolo"]) & ($_SESSION["ruolo"]=='admin'))
						
						{
							echo '<li><a href="admin.php"><span class="glyphicon glyphicon-duplicate"></span>Pannello Admin</a></li>';
						}
							
						
						echo 
						
						'<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
						Benvenuto/a nel sito, '.$_SESSION["nomeutente"].'</a>
						<ul class="dropdown-menu">
						<li><a href="ordini.php"><span class="glyphicon glyphicon-shopping-cart"></span>Checkout Carrello</a></li>
						<li class="divider"></li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Esci</a></li>
						</ul></li>';
						
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
	
	
	if(isset($_COOKIE["oggetticarrello"]) & !empty($_COOKIE["oggetticarrello"])){
		$carrello = unserialize($_COOKIE["oggetticarrello"]);
		
			//var_dump($carrello);
			
			foreach($carrello as &$dati){
				
					if(isset($_POST[$dati["idprodotto"]]) & !empty($_POST[$dati["idprodotto"]])){
						
						$qty = $_POST[$dati["idprodotto"]];
						
					//controllo che la quantità non eccede quella in stock
					$nuovaquantita = controllaStock($dati["idprodotto"],$qty,$con);
					}
					
					else {
						$nuovaquantita = controllaStock($dati["idprodotto"],$dati["qta"],$con);
						}
					
					
					$newprodotto = array(
					
					"idprodotto" => $dati["idprodotto"],
					"immagineprodotto" => $dati["immagineprodotto"],
					"nomeprodotto" => $dati["nomeprodotto"],
					"qta" => $nuovaquantita,
					"prezzo" => $dati["prezzo"],
 					
					);
					
					array_push($newcarrello,$newprodotto);
					
					$totprcqty = $dati['prezzo'] * $nuovaquantita;
				
					 echo " 
							<div class='row'>
							<div class='col-md-2'>{$dati['immagineprodotto']}</div>
							<div class='col-md-2'><b>{$dati['nomeprodotto']}</b></div>
							<div class='col-md-2'><b>{$nuovaquantita}</b></div>
							<div class='col-md-2'><b>$totprcqty</b></div>
							</div>
						  ";
					
					$totale = $totale + ($dati['prezzo'] * $nuovaquantita);
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
	
	$sql = "SELECT DISTINCT qta_stock FROM prodotto INNER JOIN stock ON prodotto.id_prodotto = stock.id_prodotto WHERE prodotto.id_prodotto = $idprodotto";
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
	
		$sql_stock="UPDATE stock INNER JOIN prodotto ON stock.id_prodotto = prodotto.id_prodotto SET qta_stock=qta_stock - ? 
				    WHERE prodotto.id_prodotto=?";
					
					/*non permettere di aggiungere prodotti al carrello quando la qta è 0*/
		
		$query = $con->prepare($sql_stock);
		$query->bind_param("ii", $qta, $idprod);
		
		if (!$query->execute()){
			printf("error %s\n", $con->error);
		}
	}
	
	


function inserisciOrdine($idutente,$con){
	
		$idordine = NULL;

		
		if((isset($_COOKIE["oggetticarrello"]) & !empty($_COOKIE["oggetticarrello"]))){
			$carrello = unserialize($_COOKIE["oggetticarrello"]);
				foreach($carrello as &$dati){
					$sql_insert = "INSERT INTO ordine (id_utente, id_prodotto, qta_ordine) VALUES (?, ?, ?)";	
					$query = $con->prepare($sql_insert);

					$query->bind_param("iii", $idutente, $dati['idprodotto'], $dati['qta']);
					/* execute query */
					if ($query->execute()){
						$idordine = mysqli_insert_id($con);
						aggiornaStock($dati['qta'],$dati['idprodotto'],$con);
					}
					else printf("error %s\n", $con->error);
				
		}
	
}

return $idordine;

}

function inviaMail($con,$idordine){
	
		//var_dump($_SESSION);
		$to = $_SESSION["mail"];
		$subject = "Ordine WineShop n° {$idordine} ";
		$message = "";
		$totale = 0;
	
		if((isset($_COOKIE["oggetticarrello"]) & !empty($_COOKIE["oggetticarrello"]))){
			$carrello = unserialize($_COOKIE["oggetticarrello"]);
			
			$message = "Gentile " .$_SESSION["nomeutente"]. " " .$_SESSION["cognomeutente"]. "\n\n";
			$message .= "Grazie per il tuo acquisto, questo è il riepilogo con i tuoi dati:\n\n";
			
			foreach($carrello as &$dati){
				
				$message .= "Prodotto: {$dati['nomeprodotto']} Quantità: {$dati['qta']} Prezzo: {$dati['prezzo']}\n";
				
				
				$totale = $totale + ($dati['prezzo'] * $dati['qta']);
			}
			
			$message .= "\nPer un totale di $totale €\n";
			
			//echo $message;
	
		mail($to,$subject,$message);
	
}
}

function visualizzaStock($con){
	
	$sql = "SELECT * FROM `stock` INNER JOIN `prodotto` ON stock.id_prodotto = prodotto.id_prodotto;";
	$run_query = mysqli_query($con,$sql);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$id_prodotto = $row["id_prodotto"];
			$prezzostock = $row["prezzostock"];
			$qta_stock = $row["qta_stock"];
			$data_aggiunta = $row["data_aggiunta"];
			$status = $row["status"];//eliminare
			$codice_stock = $row["codice_stock"];//controllare ed eliminare
			$id_stock = $row["id_stock"];
			$nomeprodotto = $row["nomeprodotto"];
			$annoprodotto = $row["annoprodotto"];
			$descrizioneprodotto = $row["descrizioneprodotto"];
			$nomecantina = $row["nomecantina"];
			$categoriaprodotto = $row["categoriaprodotto"];
			$categoria = $row["categoria"];
			$immagineprodotto = $row["immagineprodotto"];
			
			echo "	 <tr>
							  <th scope='row'>$id_stock</th>
							  <td>$id_prodotto</td>
							  <td>$prezzostock</td>
							  <td>$qta_stock</td>
							  <td>$data_aggiunta</td>
							  <td>$nomeprodotto</td>
							  <td>$annoprodotto</td>
							  <td>$descrizioneprodotto</td>
							  <td>$nomecantina</td>
							  <td>$categoriaprodotto</td>
							  <td>$categoria</td>
							  <td>$immagineprodotto</td>
					</tr>
							";
		}
	}
	
	
}

?>