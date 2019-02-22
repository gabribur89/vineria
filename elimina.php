<?php

include "connect_to_db.php";

if(isset($_POST)){
	
	
	$ideliminati = array();
	

	foreach($_POST as &$value){
		
		$sqldelete = "DELETE FROM stock WHERE id_stock = $value";
		
		
		
		if (mysqli_query($con,$sqldelete)){
			
			
			array_push($ideliminati,$value);
		
			
		}
		
		else 
		
		echo "<script type='text/javascript'>alert('Non è stato possibile eliminare gli elementi');</script>" ;
	
		}
		
		
		echo json_encode($ideliminati);
	
	}

?>