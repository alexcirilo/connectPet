$(function () {
	//Pesquisar os cursos sem refresh na página
	$("#cpf").keyup(function () {

		var busca = $("#cpf").val();

		$.post('/connectpet/controller/busca_usuario.php', {busca: busca}, function (data) {
			$("#tutor").html(data);
		});
		
	});
});


