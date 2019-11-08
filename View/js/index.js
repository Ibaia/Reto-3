
$(document).ready(function() {
	// ejecuta el modal al inicio de la página
	$('#myModal').modal('toggle');

	$("#logout").click(function() {
		
		$.ajax({
			url : "../Controller/cLogout.php",
			success : function(result) {
				alert("Session cerrada");
				//location.reload(true);  //recarga la pagina
			},
			error : function(result) {
				alert("error");
			}
		});
	});




});