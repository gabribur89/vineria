<?php

include "connect_to_db.php";

if(isset($_POST)){
	
	//var_dump($_POST);
	var_dump($_POST);
	
	$ideliminati = array();
	

	foreach($_POST as &$value){
		
		$sqldelete = "DELETE FROM stock WHERE id_stock = $value";
		
		
		
		
		
		
		/*if (mysqli_query($con,$sqldelete))*/if(true){
			/*echo "<script type='text/javascript'>alert('I dati relativi all'id $value sono stati eliminati dal database');</script>" ;*/
			
			array_push($ideliminati,$value);
			var_dump($ideliminati);
			
			
		}
		
		else 
		
		echo "<script type='text/javascript'>alert('Non è stato possibile eliminare gli elementi');</script>" ;
	
		}
		
		var_dump($ideliminati);
		echo json_encode($ideliminati);
	
	}

?>