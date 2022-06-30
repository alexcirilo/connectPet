/* Preview da foto no cad_pet */
function previewImagem(){
	var imagem = document.querySelector('input[name=arquivo]').files[0];
	var preview = document.querySelector('img[id=img]');

	var reader = new FileReader();

	reader.onloadend = function () {
		preview.src = reader.result;
	}
	if(imagem){
		reader.readAsDataURL(imagem);
	}else{
		preview.src = "";
	}
}
$(function () {
	//Pesquisar os cursos sem refresh na página.
	$("#cpf").keyup(function () {

		var busca = $("#cpf").val();

		$.post('controller/busca_usuario.php', { busca: busca }, function (data) {
			//$("#tutor").html(data);
			document.getElementById('tutor').value = (data)
		});

	});
});
$(function () {
	//Pesquisar os pets sem refresh na página.
	$("#nome_pet").keyup(function () {

		var busca = $("#nome_pet").val();

		$.post('controller/busca_pet.php', { busca: busca }, function (data) {
			//$("#tutor").html(data);
			document.getElementById('pet').value = (data)
		});

	});
});
$(function () {
	//Pesquisar os pets pelo cpf do tutor sem refresh na página.
	$("#cpf").keyup(function () {

		var busca = $("#cpf").val();

		$.post('controller/busca_tutor_pet.php', { busca: busca }, function (data) {
			$("#tabela").html(data);
			//document.getElementById('pet').value = (data)
		});

	});
});

$(document).ready(function() {
    $('#consulta_vacina').DataTable();
} );


$(document).ready(function() {
    $('#consulta_pet').DataTable();
} );

$(document).ready(function() {
    $('#tutorPet').DataTable();
} );

$(document).ready(function() {
    $('#pets_vacinados').DataTable();
} );

$(document).ready(function() {
    $('#consulta_tutor').DataTable();
} );
$(document).ready(function() {
    $('#consulta_usuarios').DataTable();
} );


function limpa_formulário_cep() {
	//Limpa valores do formulário de cep.
	document.getElementById('rua').value = ("");
	document.getElementById('bairro').value = ("");
	document.getElementById('cidade').value = ("");
	document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
	if (!("erro" in conteudo)) {
		//Atualiza os campos com os valores.
		document.getElementById('rua').value = (conteudo.logradouro);
		document.getElementById('bairro').value = (conteudo.bairro);
		document.getElementById('cidade').value = (conteudo.localidade);
		document.getElementById('uf').value = (conteudo.uf);
	} //end if.
	else {
		//CEP não Encontrado.
		limpa_formulário_cep();
		alert("CEP não encontrado.");
	}
}

function pesquisacep(valor) {

	//Nova variável "cep" somente com dígitos.
	var cep = valor.replace(/\D/g, '');

	//Verifica se campo cep possui valor informado.
	if (cep != "") {

		//Expressão regular para validar o CEP.
		var validacep = /^[0-9]{8}$/;

		//Valida o formato do CEP.
		if (validacep.test(cep)) {

			//Preenche os campos com "..." enquanto consulta webservice.
			document.getElementById('rua').value = "...";
			document.getElementById('bairro').value = "...";
			document.getElementById('cidade').value = "...";
			document.getElementById('uf').value = "...";

			//Cria um elemento javascript.
			var script = document.createElement('script');

			//Sincroniza com o callback.
			script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

			//Insere script no documento e carrega o conteúdo.
			document.body.appendChild(script);

		} //end if.
		else {
			//cep é inválido.
			limpa_formulário_cep();
			alert("Formato de CEP inválido.");
		}
	} //end if.
	else {
		//cep sem valor, limpa formulário
		limpa_formulário_cep();
	}
};

$(document).ready(function(){
	$("#cpf").mask("000.000.000-00");
	$("#telefone").mask("(99)99999-9999");
	$("#cep").mask("00000-000");
});

function oculta_campo(val){
	var microchip = document.getElementById("microchip");
	var imp = document.getElementById('local_implantacao');
	if(val.value == 'n'){
		$(imp).hide();
	}else{
		$(imp).show();
	}
}





