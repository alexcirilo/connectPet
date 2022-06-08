<?php

require __DIR__ . "/../../connection/conexao.php";

$query = "select * from tutor";

$consulta = $connection->query($query);