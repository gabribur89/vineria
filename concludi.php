 <?php
	
    include "functions.php";
	include "connect_to_db.php";
	
	
	session_start();
	
	
	if(isset($_SESSION["id_utente"]))
	{
		
		$idordine = inserisciOrdine($_SESSION["id_utente"],$con);
		
		echo "E' stata inviata una mail relativa all ordine" ;
		
		/*stilizzare solita pagina html*/
					
		inviaMail($con,$idordine);
		
		/*avrò questo nuovo carrello contenente i prodotti
		
		sessione utente $_SESSION["id_utente"] $dati["idprodotto"] $dati["qta"]
		
		id utente come cookie, al posto della sessione, utile anche per la query
		
		*/
		
	}
	
	else
		
		echo "<script type='text/javascript'>alert('Occorre eseguire il login oppure la registrazione al sito!');
				window.location = 'login_nuovo_utente.php';</script>" ;
		
	
 
 ?>