<?php
session_start();
include "connect_to_db.php";

if(isset($_POST["tipo"])){
	$tipo_query = "SELECT * FROM tipo";
	$run_query = mysqli_query($con,$tipo_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#'><h4>Tipo di Vino</h4></a></li>
	";
	if (mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
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
	$cantina_query = "SELECT * FROM cantina";
	$run_query = mysqli_query($con,$cantina_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#'><h4>Cantina Produttrice</h4></a></li>
	";
	if (mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
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
	$sql = "SELECT * FROM prodotto";
	$run_query = mysqli_query($con,$sql);
	$conta = mysqli_num_rows($run_query);
	$num_pagina = ceil($conta/8);
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
	$prodotti_query = "SELECT * FROM prodotto LIMIT $start,$limite";
	$run_query = mysqli_query($con,$prodotti_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$id_prodotto = $row["id_prodotto"];
			$categoria = $row["categoria"];
			$nomecantina = $row["nomecantina"];
			$nomeprodotto = $row["nomeprodotto"];
			$immagine = $row["immagineprodotto"];
			//bisogna fare il join con la tabella stock per vedere i prezzi     ????
			echo "
				<div class='col-md-4'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$nomeprodotto</div>
							<div class='panel-body'>
							<img src='img/$immagine' id='immagineprodotto' width='150' height='250'/>
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
if(isset($_POST["seleziona_tipo"]) || isset($_POST["seleziona_cantina"])){
	if(isset($_POST["seleziona_tipo"])){
		$id = $_POST["id_tipo"];
		$sql = "SELECT * FROM prodotto WHERE categoria = '$id' ";
	}else if(isset($_POST["seleziona_cantina"])){
		$nome = $_POST["id_cantina"];
		$sql = "SELECT * FROM prodotto WHERE nomecantina = '$nome' ";
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
							<img src='img/$immagine' id='immagineprodotto' width='160' height='250'/>
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