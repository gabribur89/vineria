$(document).ready(function(){

$("#elimina").click(function(event){
		event.preventDefault();
		//alert($("form").serialize());
		$.ajax({
			url : "elimina.php",
			method : "POST",
			data: $("form").serialize(),
			dataType: 'json',
            cache: false,
			success: function(data){
				//alert(data);
				//'$id_stock'
				//$("#1").remove();
				alert(data);
				//remove o hide
				//nascondere la linea oppure eliminarla in base all id della checkbox
				
			}
		})
	})
	
$("#inserisci").click(function(event){
		event.preventDefault();
		$.ajax({
			url : "action.php",
			method : "POST",
			data: $("form").serialize(),
			success: function(data){
				alert(data);
			}
		})
	})
	
});