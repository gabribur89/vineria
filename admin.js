$(document).ready(function(){

$("#elimina").click(function(event){
		event.preventDefault();

		$.ajax({
			url : "elimina.php",
			method : "POST",
			data: $("form").serialize(),
			dataType: 'json',
            cache: false,
			success: function(data){

				var i;
				var sel = "#";
				
				for (i=0;i<data.length;i++){
					
					$(sel+data[i]).remove();
				}
				
			}
		})
	})
	
	$("form#data").submit(function(event){
		event.preventDefault();
		var data = new FormData(this);
		//data.append( 'file', 'prova' );
		/*var i;
		var data = formData.values();
		
		for (i=0;i<data.length;i++){
			alert(data[i]);
		}*/
		//alert(formData.values());
		$.ajax({
			url : "inserisci_queries.php",
			method : "POST",
			data: data,
			processData: false,
			contentType: false,
			success: function(data){
				$("#messaggio").html(data);
				//alert(data);
				//window.location= "admin.php";
			}
		})
	})
	
});