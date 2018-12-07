<?php

//questa pagina serve per collegarsi al db creato

$nomeserver = "localhost";
$user = "root";
$password = "12101989";
$db = "vineria";

//creazione connessione al db
$con = new mysqli($nomeserver, $user, $password, $db);
//$con = mysqli_connect($nomeserver, $user, $password, $db);

//verifica connessione
if (!$con) {
	die("Mi dispiace ma la connessione e' fallita!" . mysqli_connect_error());
	}

//mysqli_close($con);

?>