<?php

require __DIR__ . "/../../connection/conexao.php";

$query = "select u.id_usuario, u.cpf,u.nome, u.login, u.registro ,u.conselho,f.descricao,u.status 
            from usuarios u inner join funcao f on u.id_funcao = f.id_funcao;";

$consulta = $connection->query($query);