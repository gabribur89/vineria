<?php
include "connect_to_db.php";


$mail = mysqli_real_escape_string($con,$_POST["mailutente"]);
$password = md5($_POST["password"]);
$querylogin = "SELECT * FROM utente WHERE mail = '$mail' AND password = '$password' ";
$execlogin = mysqli_query($con,$querylogin);

$conta = mysqli_num_rows($execlogin);
if ($conta ==  1){
		$row = mysqli_fetch_array($execlogin);
		session_start();
		$_SESSION["id_utente"] = $row["id_utente"];
		$_SESSION["nomeutente"] = $row["nomeutente"];
		$_SESSION["cognomeutente"] = $row["cognomeutente"];
		$_SESSION["indirizzo"] = $row["indirizzo"];
		$_SESSION["citta"] = $row["citta"];
		$_SESSION["cap"] = $row["cap"];
		$_SESSION["nazione"] = $row["nazione"];
		$_SESSION["mail"] = $row["mail"];
		$_SESSION["ruolo"] = $row["ruolo"];
		echo "DATI OK";
}

else
{
	echo "DATI KO. Nessun login, mi dispiace!";
}

?>