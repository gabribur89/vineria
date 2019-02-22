<?php

include "connect_to_db.php";

$nome = $_POST["nomeutente"];
$cognome = $_POST["cognomeutente"];
$indirizzo = $_POST["indirizzo"];
$citta = $_POST["citta"];
$cap = $_POST["cap"];
$nazione = $_POST["nazione"];

$data = $_POST["datanascita"];
$datanascita = date("Y-m-d",strtotime($data));

$mail = $_POST["mail"];
$password = $_POST["password"];
$conferma_password = $_POST["conferma_password"];

$vnomecognome = "/^[A-Z][a-zA-Z ]+$/"; /*il nome ed il cognome devono avere l'iniziale maiuscola*/
$vmail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/"; /*regexp per la mail*/


if(empty($nome) || empty($cognome) || empty($indirizzo) || empty($citta) || empty($cap) || empty($nazione) || empty($mail) ||empty($password) ){

	echo "
		<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Ci sono dei campi vuoti. E' obbligatorio inserire tutti i dati affinche' la registrazione vada a buon fine!</b>
		</div>
	";
	
	exit();

	} else {

	if(!preg_match($vnomecognome,$nome)){
		echo "
				<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Questo $nome non e' valido. Deve avere l'iniziale MAIUSCOLA e non deve contenere numeri.</b>
				</div>
			";
		exit();
	}

	if(!preg_match($vnomecognome,$cognome)){
		echo "
				<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Questo $cognome non e' valido. Deve avere l'iniziale MAIUSCOLA e non deve contenere numeri.</b>
				</div>
			";
		exit();
	}
	if(!preg_match($vmail,$mail)){
		echo "
				<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>L'indirizzo e-mail $mail non e' in un formato valido.</b>
				</div>
			";
		exit();
	}

	if(strlen($password) < 5){
		echo "
				<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>La password deve contenere almeno 5 caratteri.</b>
				</div>
			";
		exit();
	}

	if ($conferma_password != $password){
		echo "
				<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>La password reinserita non e' corretta.</b>
				</div>
			";
	}

	//controllo se esiste gia' una mail nel db
	$querymail = "SELECT mail FROM utente WHERE mail = '$mail' LIMIT 1";
	$check_mail = mysqli_query($con,$querymail);
	$count_mail = mysqli_num_rows($check_mail);
	if($count_mail > 0){
		echo "
				<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>L'indirizzo e-mail e' gia' stato inserito. Esiste già un utente con le stesse credenziali. Immettere un altro indirizzo e-mail.</b>
				</div>
			";
		exit();
	} else{
		$password = md5($password);
		$insertdata = "INSERT INTO 
		`utente` 
		(`nomeutente`, `cognomeutente`, `indirizzo`, 
		`citta`, `cap`, `nazione`, `data_nascita`, `mail`,`password`) 
		VALUES ('$nome', '$cognome', '$indirizzo', '$citta', 
		'$cap', '$nazione', '$data', '$mail', '$password')";
		$registerdata = mysqli_query($con,$insertdata);
		if($registerdata){
		
		echo "
				<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Registrazione avvenuta con successo!!</b>
				</div>
			";
			
		}
		
	}
}

?>