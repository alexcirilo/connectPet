<?php

require __DIR__ . "/../connection/conexao.php";

$sql = "select * from usuarios where id_funcao = 2";

$consulta = $connection->query($sql);


?>