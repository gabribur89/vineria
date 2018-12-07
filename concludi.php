 <?php
	
    include "functions.php";
	include "connect_to_db.php";
	
	
	session_start();
	
	
	if(isset($_SESSION["id_utente"]))
	{
		$carrello_concludi = array();
		
		if((isset($_COOKIE["oggetticarrello"]) & !empty($_COOKIE["oggetticarrello"]))){
				$carrello = unserialize($_COOKIE["oggetticarrello"]);
			foreach($carrello as &$dati){
				
				$elementi_carrello = array (
					"idprodotto" => $dati["idprodotto"],
					"immagineprodotto" => $dati["immagineprodotto"],
					"nomeprodotto" => $dati["nomeprodotto"],
					"qta" => $dati["qta"],
					"prezzo" => $dati["prezzostock"],
					);
					
				array_push($carrelloconcludi,$elementi_carrello);
				
				echo " 
							<div class='row'>
							<div class='col-md-2'>{$dati['immagineprodotto']}</div>
							<div class='col-md-2'><b>{$dati['nomeprodotto']}</b></div>
							<div class='col-md-2'><b>{$dati['qta']}</b></div>
							<div class='col-md-2'><b>{$dati['prezzostock']}</b></div>
							</div>
					 ";
				
				}
				
			setcookie("oggetticarrello",serialize($carrelloconcludi),time()+50000, "/");
		}
		
		/*avrò questo nuovo carrello contenente i prodotti
		
		sessione utente $_SESSION["id_utente"] $dati["idprodotto"] $dati["qta"]
		
		id utente come cookie, al posto della sessione, utile anche per la query
		
		*/
		
	}
	
	else
		
		echo "<script type='text/javascript'>alert('Occorre eseguire il login oppure la registrazione al sito!');
				window.location = 'login_nuovo_utente.php';</script>" ;
		
	
 
 ?>