<?php

require __DIR__ . "/../../connection/conexao.php";

$query = "select * from vacina lock in share mode";

$consulta = $connection->query($query);

