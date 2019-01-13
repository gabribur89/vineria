<?php
include "connect_to_db.php";

$mail = mysqli_real_escape_string($con,$_POST["mailutente"]);
$password = md5($_POST["password"]);
$sql = "SELECT * FROM utente WHERE mail = '$mail' AND password = '$password' ";

//echo($sql);

$run_query = mysqli_query($con,$sql);
//echo($sql);
$conta = mysqli_num_rows($run_query);
if ($conta ==  1){
		$row = mysqli_fetch_array($run_query);
		session_start();
		$_SESSION["id_utente"] = $row["id_utente"];
		$_SESSION["nomeutente"] = $row["nomeutente"];
		$_SESSION["ruolo"] = $row["ruolo"];
		echo "DATI OK";
		//header("location:homepage.php");
}
else
{
	echo "DATI KO. Nessun login, mi dispiace!";
	//http_response_code(400);
}


//13-11 ore 15.52 controllato il login, sembra funzionare. SI, funziona! Visualizza anche la sessione utente ed il nome dell'utente stesso, se collegato.

?>