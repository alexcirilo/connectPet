<?php

require __DIR__ . "/../../connection/conexao.php";

$cursos = $_POST['busca'];

$query = "select t.cpf, t.nome, t.email, t.telefone, e.cep, e.logradouro, e.numero, e.complemento ,
 e.bairro , e.cidade, e.uf from tutor t inner join endereco e on e.tutor_id = t.id_tutor where t.cpf = '{$cursos}'";

$consulta = $connection->query($query);

if($consulta->num_rows > 0){
	while($row = $consulta->fetch_assoc()){
		echo $row['nome'];
		echo $row['email'];
		echo $row['telefone'];
		echo $row['cep'];
		echo $row['logradouro'];
		echo $row['numero'];
		echo $row['complemento'];
		echo $row['bairro'];
		echo $row['cidade'];
		echo $row['uf'];
	}
}