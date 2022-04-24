<?php


require __DIR__ . "/../connection/conexao.php";
$query = "SELECT * FROM funcao";

$consulta = $connection->query($query);

