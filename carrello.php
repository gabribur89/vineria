<?php

session_start();
include "connect_to_db.php";

if(isset($_POST["svuotacarrello"])){
	setcookie("oggetticarrello","", time()+50000, "/");
	echo "<ul class = 'list-group'></ul>";
}

if(isset($_POST["idprodotto"]) & !empty($_POST["idprodotto"])){
	
	$idprodotto = $con->real_escape_string($_POST["idprodotto"]);
	
	$carrelloquery = "SELECT prodotto.id_prodotto, immagineprodotto, nomeprodotto, qta_stock, MIN(prezzostock) AS prezzostock FROM prodotto 
			INNER JOIN stock ON prodotto.id_prodotto = stock.id_prodotto WHERE prodotto.id_prodotto = ".$idprodotto."; ";
	

	$vedicarrello = mysqli_query($con,$carrelloquery);
	if(!mysqli_query($con,$carrelloquery)){
		die('Errore:' .mysqli_error($con));
	}

	else{
	while($row = mysqli_fetch_array($vedicarrello)){
		
		$dati = array (
				"idprodotto" => $row["id_prodotto"],
				"immagineprodotto" => $row["immagineprodotto"],
				"nomeprodotto" => $row["nomeprodotto"],
				"qta" => 0,
				"prezzo" => $row["prezzostock"],
		);
		
		array_push($_SESSION["carrello"],$dati);
		

		setcookie("oggetticarrello",serialize($_SESSION["carrello"]), time()+50000, "/");
		
	}
	
	echo "<ul class = 'list-group'>";
	
	foreach($_SESSION["carrello"] as &$dati){
		
			echo "<img src = {$dati['immagineprodotto']}/>";
			echo "<li class ='list-group-item'>{$dati['nomeprodotto']} Prezzo:{$dati['prezzo']}";
			echo " <input type='text' size='2' maxlength='2' style='width: 30px'; name={$dati['idprodotto']} value={$dati['qta']}>quantità";
			echo "</li>";
		}
	echo"</ul>";

	
}
}

?>