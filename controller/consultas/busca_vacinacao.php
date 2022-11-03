<?php

require __DIR__ . "/../../connection/conexao.php";

$query = "select count(*) from vacinacao lock in share mode;";

$con = $connection->query($query);