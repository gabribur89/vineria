<?php

session_start();
include "connect_to_db.php";

//var_dump($_POST);

if(isset($_POST["svuotacarrello"])){
	setcookie("oggetticarrello","", time()+50000, "/");
	//unset($_COOKIE["oggetticarrello"]);
	echo "<ul class = 'list-group'></ul>";
}

if(isset($_POST["idprodotto"]) & !empty($_POST["idprodotto"])){
	
	$idprodotto = $con->real_escape_string($_POST["idprodotto"]);
	
	$sql = "SELECT id_prodotto, immagineprodotto, nomeprodotto, qta_stock, prezzostock FROM prodotto INNER JOIN stock ON prodotto.codice_stock = stock.codice_stock
			WHERE id_prodotto = ".$idprodotto."; ";
	

	$run_query = mysqli_query($con,$sql);
	if(!mysqli_query($con,$sql)){
		die('Errore:' .mysqli_error($con));
	}

	else{
	while($row = mysqli_fetch_array($run_query)){
		
		$dati = array (
				"idprodotto" => $row["id_prodotto"],
				"immagineprodotto" => $row["immagineprodotto"],
				"nomeprodotto" => $row["nomeprodotto"],
				"qta" => $row["qta_stock"],
				"prezzo" => $row["prezzostock"],
		);
		
		array_push($_SESSION["carrello"],$dati);
		

		setcookie("oggetticarrello",serialize($_SESSION["carrello"]), time()+50000, "/");
		//var_dump($dati);
		
	}
	
	echo "<ul class = 'list-group'>";
	foreach($_SESSION["carrello"] as &$dati){
			echo " <img src = 'img/'{$dati['immagineprodotto']}><li class ='list-group-item'>{$dati['nomeprodotto']} {$dati['qta']} {$dati['prezzo']}</li>";
		}
	echo "</ul>";

	
}
}

?>