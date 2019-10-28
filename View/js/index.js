  
$(document).ready(function() {

	// ejecuta el modal al inicio de la página
	$('#myModal').modal('toggle');

	$("#logout").click(function() {
		alert("sdfadsf");
		$.ajax({
			url : "../Reto3Bien/Controller/cLogout.php",
			success : function(result) {
				alert("aaaaaaaaa");
				location.reload(true);  //recarga la pagina
			},
			error : function(result) {
				alert("error");
			}
		});
	});




});