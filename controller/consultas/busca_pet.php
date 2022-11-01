<?php

require __DIR__. "/../../connection/conexao.php";

$query = "select * from pet for share";

$consulta = $connection->query($query);

