<?php

require __DIR__ . "/../connection/conexao.php";

$sql = "select * from funcao where codigo = 2";

$consulta = $connection->query($sql);


?>