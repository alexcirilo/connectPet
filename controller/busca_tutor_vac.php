<?php

include __DIR__ ."/../connection/conexao.php";

$cursos = $_GET['busca'];
$limit = 1;

if(!empty($cursos)){
	$query = "select t.cpf, t.nome, t.email, t.telefone, e.cep, e.logradouro, e.numero, e.complemento ,
	 e.bairro , e.cidade, e.uf from tutor t inner join endereco e on e.tutor_id = t.id_tutor where t.cpf = '{$cursos}' limit {$limit}";
	
	
	$consulta = $connection->query($query);
	
	$array_valores = array();
	
	if($consulta->num_rows != 0){
		while($row = $consulta->fetch_assoc()){
	
			$array_valores['tutor'] = $row['nome'];
			$array_valores['email'] = $row['email'];
			$array_valores['telefone'] = $row['telefone'];
			$array_valores['cep'] = $row['cep'];
			$array_valores['rua'] = $row['logradouro'];
			$array_valores['numero'] = $row['numero'];
			$array_valores['complemento'] = $row['complemento'];
			$array_valores['bairro'] = $row['bairro'];
			$array_valores['cidade'] = $row['cidade'];
			$array_valores['uf'] = $row['uf'];
		}
	}else{
		$array_valores['tutor'] = "tutor not found";
	}
	echo json_encode($array_valores);

}