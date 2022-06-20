<?php

require __DIR__ . "/../../connection/conexao.php";

$query = "select count(*) from vacinacao ;";

$con = $connection->query($query);