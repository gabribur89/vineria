<?php
session_start();

include "functions.php";
include "connect_to_db.php";

	
$prezzo = $_POST["prezzo"];
$quantita = $_POST["quantita"];


$data = $_POST["dataaggiunta"];
$dataaggiunta = date("Y-m-d",strtotime($data));

$nomeprodotto = $_POST["nomeprodotto"];
$annoprodotto = $_POST["annoprodotto"];
$descrizioneprodotto = $_POST["descrizioneprodotto"];
$nomecantina = $_POST["nomecantina"];
$categoria = $_POST["categoria"];
$idcategoria = $_POST["idcategoria"];

$info = pathinfo($_FILES['image']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = "newname.".$ext; 

$target = 'img/'.$newname;
move_uploaded_file( $_FILES['image']['tmp_name'], $target);


$selezionacantina = "SELECT nomecantina FROM cantina WHERE nomecantina = '$nomecantina' ";

$inserisciprodotto = "INSERT INTO `prodotto`
		(`nomeprodotto`, `annoprodotto`, `descrizioneprodotto`, `nomecantina`, `categoriaprodotto`, `categoria`, `immagineprodotto`) 
		VALUES ('$nomeprodotto', '$annoprodotto', '$descrizioneprodotto', '$nomecantina', '$categoria', '$idcategoria', '$target')";
		
$inseriscicantina = "INSERT INTO `cantina` (`nomecantina`) VALUES ('$nomecantina') ";
		



$esistecantina = mysqli_query($con,$selezionacantina);
$prodottoinserito = mysqli_query($con,$inserisciprodotto);
$idprodotto=mysqli_insert_id($con);

$inseriscistock = "INSERT INTO `stock` (`prezzostock`, `qta_stock`, `data_aggiunta`,`id_prodotto`) VALUES ('$prezzo','$quantita','$data','$idprodotto')";


$stockinserito = mysqli_query($con,$inseriscistock);

	if(!$esistecantina){
		
		$cantinainserita = mysqli_query($con,$inseriscicantina);
		
		
	
	}

	if($prodottoinserito && $stockinserito)
		{
			
			echo "<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Il prodotto è stato inserito con successo!!</b>
				</div>";
		
		}
		
	else 
	{
		
		die("Mi dispiace ma la connessione e' fallita!" . mysqli_error($con));
		
		echo "	<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Non è stato possibile inserire il prodotto, mi dispiace.</b>
				</div>" ;
	}
	


?>