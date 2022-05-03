<?php

require __DIR__. "/../../connection/conexao.php";

$query = "select * from pet";

$consulta = $connection->query($query);

