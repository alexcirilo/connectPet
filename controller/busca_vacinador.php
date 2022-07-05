<?php

require __DIR__ . "/../connection/conexao.php";

$sql = "select u.*, f.codigo  from usuarios u inner join funcao f on
u.id_funcao  = f.id_funcao where f.codigo = 2";

$consulta = $connection->query($sql);


?>