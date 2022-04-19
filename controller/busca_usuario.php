<?php

include __DIR__."/../connection/conexao.php";

$cursos = $_POST['busca'];

$query = "SELECT id_tutor,nome,cpf from tutor where cpf ='$cursos'";

$consulta = $connection->query($query);

if($consulta->num_rows > 0){
	while($row = $consulta->fetch_assoc()){
		echo $row['nome'];
	}
}
