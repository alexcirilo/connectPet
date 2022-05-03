<?php

require __DIR__ . "/../../connection/conexao.php";

$query = "select * from vacina";

$consulta = $connection->query($query);

