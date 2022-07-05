<?php

require __DIR__ . "/../connection/conexao.php";

$sql = "select * from usuarios where codigo = 2";

$consulta = $connection->query($sql);


?>