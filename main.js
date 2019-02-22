$(document).ready(function(){
	tipo();
	cantina();
	prodotto();
	function tipo(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data: {tipo:1},
			success: function(data){
				$("#ottieni_tipo").html(data);
			}
		})
	}
	function cantina(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data: {cantina:1},
			success: function(data){
				$("#ottieni_cantina").html(data);
			}
		})
	}
	function prodotto(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data: {prodotto:1},
			success: function(data){
				$("#ottieni_prodotto").html(data);
			}
		})
	}
	$("body").delegate(".tipo","click",function(event){
		event.preventDefault();
		var tid = $(this).attr('tid');
		$.ajax({
			url : "action.php",
			method : "POST",
			data: {seleziona_tipo:1,id_tipo:tid},
			success: function(data){
			$("#ottieni_prodotto").html(data);
			}
		})
	})
	$("body").delegate(".cantina","click",function(event){
		event.preventDefault();
		var cid = $(this).attr('cid');
		//alert(cid);
		$.ajax({
			url : "action.php",
			method : "POST",
			data: {seleziona_cantina:1,id_cantina:cid},
			success: function(data){
			$("#ottieni_prodotto").html(data);
			}
		})
	})
	$("#registrati").click(function(event){
		event.preventDefault();
		$.ajax({
			url : "register.php",
			method : "POST",
			data: $("form").serialize(),
			success: function(data){
				$("#registrati_msg").html(data);
			}
		})
	})
	$("#login1").click(function(event){
		event.preventDefault();
		var email = $("#email1").val();
		var pass = $("#password1").val();
		$.ajax({
			url : "login.php",
			method : "POST",
			data : {mailutente:email,password:pass},
			success : function(data){
				if (data == "DATI OK"){
					window.location= "homepage.php";
				}
				else {
					$("#e-msg").html("<h4>Dati di Login sbagliati!</h4>");
				}
			}
		})
	})
	
	$(document).on('click','body #carrello1', function(event){
		event.preventDefault();
		var p = $(this).attr('prod_id');
		$.ajax({
			url: "carrello.php",
			method: "POST",
			data: {idprodotto:p} ,
			success: function(data){
				$("#carrelloprodotti").html(data);
				//$("#badge").html();
			}
		})
	})
	
	$(document).on('click','body #svuotacarrello', function(event){
		event.preventDefault();
		$.ajax({
			url : "carrello.php",
			method : "POST",
			data: {svuotacarrello:"true"},
			success : function(data){
				$("#carrelloprodotti").html(data);
			}
		})
	})
	
	pagina();
	function pagina(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {pagina:1},
			success: function(data){
				$("#num_pagina").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {prodotto:1,set_pagina:1,pagenum:pn},
			success: function(data){
				$("#ottieni_prodotto").html(data);
			}
		})
	})
	
	//zoom immagine
	
	$("immagineprodotto").mouseover(function() {
		$("immagineprodotto").css({ width: '150px', height: '150px' });
	});
	
	
								
})