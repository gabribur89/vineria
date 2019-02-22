<?php
session_start();
include "connect_to_db.php";

if(isset($_POST["tipo"])){
	$select_tipo = "SELECT * FROM tipo";
	$tipoinserito = mysqli_query($con,$select_tipo);
	echo "
		<div class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#'><h4>Tipo di Vino</h4></a></li>
	";
	if (mysqli_num_rows($tipoinserito) > 0){
		while($row = mysqli_fetch_array($tipoinserito)){
			$id_tipo = $row["id_tipo"];
			$descrizionetipo = $row["descrizionetipo"];
			echo "
				<li><a href='#' class='tipo' tid='$id_tipo'>$descrizionetipo</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["cantina"])){
	$select_cantina = "SELECT * FROM cantina";
	$cantinainserita = mysqli_query($con,$select_cantina);
	echo "
		<div class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#'><h4>Cantina Produttrice</h4></a></li>
	";
	if (mysqli_num_rows($cantinainserita) > 0){
		while($row = mysqli_fetch_array($cantinainserita)){
			$nomecantina = $row["nomecantina"];
			$descrizionecantina = $row["descrizionecantina"];
			echo "
				<li><a href='#' class='cantina' cid = '$nomecantina'>$nomecantina</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["pagina"])){
	$selectprodotto = "SELECT * FROM prodotto";
	$prodottoinserito = mysqli_query($con,$selectprodotto);
	$contaprodotti = mysqli_num_rows($prodottoinserito);
	$num_pagina = ceil($contaprodotti/8);
	for($i=1;$i<=$num_pagina;$i++){
		echo "
		<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["prodotto"])){
	$limite = 8;
	if(isset($_POST["set_pagina"])){
		$pagenum = $_POST["pagenum"];
		$start = ($pagenum * $limite) - $limite;
	}else{
		$start = 0;
	}
	$prodotti_pagina = " SELECT * FROM prodotto INNER JOIN stock ON prodotto.id_prodotto = stock.id_prodotto 
						WHERE qta_stock > 0 AND prezzostock 
						GROUP BY stock.id_prodotto HAVING MIN(prezzostock) LIMIT $start,$limite; ";
						
	$risultato = mysqli_query($con,$prodotti_pagina);
	if(mysqli_num_rows($risultato) > 0){
		while($row = mysqli_fetch_array($risultato)){
			$id_prodotto = $row["id_prodotto"];
			$categoria = $row["categoria"];
			$nomecantina = $row["nomecantina"];
			$nomeprodotto = $row["nomeprodotto"];
			$immagine = $row["immagineprodotto"];
			$prezzo = $row["prezzostock"];

			echo "
				<div class='col-md-4'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$nomeprodotto</div>
							<div class='panel-body'>
							<img src='$immagine' id='immagineprodotto' width='150' height='250'/>
							</div>
								<div class='panel-heading'>
								<b>Prezzo: $prezzo €</b>
								<button prod_id='$id_prodotto' style='float:right;' id='carrello1' class='btn btn-danger btn-xs'>Aggiungi al Carrello</button>
								</div>
							</div>
				</div>
			";
		}
	}
}
if(isset($_POST["seleziona_tipo"]) || isset($_POST["seleziona_cantina"])){
	if(isset($_POST["seleziona_tipo"])){
		$id = $_POST["id_tipo"];
		$sql = "SELECT * FROM prodotto INNER JOIN stock ON prodotto.id_prodotto = stock.id_prodotto 
				WHERE categoria = '$id' AND qta_stock > 0";
	}else if(isset($_POST["seleziona_cantina"])){
		$nome = $_POST["id_cantina"];
		$sql = "SELECT * FROM prodotto INNER JOIN stock ON prodotto.id_prodotto = stock.id_prodotto
				WHERE nomecantina = '$nome' AND qta_stock > 0";
	}
	$run_query = mysqli_query($con,$sql);
	if(!mysqli_query($con,$sql)){
		die('Errore:' .mysqli_error($con));
	}
	else{
	while($row = mysqli_fetch_array($run_query)){
			$id_prodotto = $row["id_prodotto"];
			$categoria = $row["categoria"];
			$nomecantina = $row["nomecantina"];
			$nomeprodotto = $row["nomeprodotto"];
			$immagine = $row["immagineprodotto"];
			echo "
				<div class='col-md-4'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$nomeprodotto</div>
							<div class='panel-body'>
							<img src='$immagine' id='immagineprodotto' width='160' height='250'/>
							</div>
								<div class='panel-heading'>
								<button prod_id='$id_prodotto' style='float:right;' id='carrello1' class='btn btn-danger btn-xs'>Aggiungi al Carrello</button>
								</div>
							</div>
				</div>
			";
		}
}
}



?>