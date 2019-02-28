 <?php
	
    include "functions.php";
	include "connect_to_db.php";
	
	
	session_start();
	
	
	if(isset($_SESSION["id_utente"]))
	{
		
		$idordine = inserisciOrdine($_SESSION["id_utente"],$con);
					
		echo "<h1>E' stata inviata una mail relativa al tuo ordine!</h1>" ;	
		
		echo "	<a href='homepage.php'>Torna alla Homepage</a>";
		
		
		inviaMail($con,$idordine);
		
	}
	
	else
		
		echo "<script type='text/javascript'>alert('Occorre eseguire il login oppure la registrazione al sito!');
				window.location = 'login_nuovo_utente.php';</script>" ;
		
	
 
 ?>