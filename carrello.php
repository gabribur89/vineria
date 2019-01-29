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
	
	$sql = "SELECT prodotto.id_prodotto, immagineprodotto, nomeprodotto, qta_stock, MIN(prezzostock) AS prezzostock FROM prodotto INNER JOIN stock ON prodotto.id_prodotto = stock.id_prodotto
			WHERE prodotto.id_prodotto = ".$idprodotto."; ";
	

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
				"qta" => 0,
				"prezzo" => $row["prezzostock"],
		);
		
		array_push($_SESSION["carrello"],$dati);
		

		setcookie("oggetticarrello",serialize($_SESSION["carrello"]), time()+50000, "/");
		//var_dump($dati);
		
	}
	
	echo "<ul class = 'list-group'>";
	foreach($_SESSION["carrello"] as &$dati){
			echo " <img src = 'img/'{$dati['immagineprodotto']}><li class ='list-group-item'>{$dati['nomeprodotto']} Prezzo:{$dati['prezzo']}</li>";
			echo " <input type='text' size='2' maxlength='2' style='width: 30px'; name={$dati['idprodotto']} value='1'>quantità</li>";
		}
	echo"</ul>";

	
}
}

?>