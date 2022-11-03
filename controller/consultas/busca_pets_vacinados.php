<?php

require __DIR__ . "/../../connection/conexao.php";

$query = "select p.nome_pet as 'Nome do Pet', v.descricao as 'Vacina', va.data_vacina as 'Data de Vacinação', va.codigo as 'Código' 
        from vacinacao va inner join vacina v on
        v.id_vacina = va.id_vacina 
        inner join pet p on
        va.id_pet  = p.id_pet lock in share mode;";

$consulta = $connection->query($query);
