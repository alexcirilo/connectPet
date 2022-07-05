<?php

require __DIR__ . "/../../connection/conexao.php";

$tutor = $_POST['busca'];

$sql = "select p.id_pet as 'id_pet', p.nome_pet as 'Nome do Pet',v.codigo as 'codigo vacina',p.raca,v.descricao as 'Vacina', va.data_vacina as 'Data de Vacinação',
t.nome from pet p inner join tutor t on
p.id_tutor = t.id_tutor inner join vacinacao va on
va.id_pet = p.id_pet inner join vacina v on
va.id_vacina = v.id_vacina 
where t.cpf = '{$tutor}'";

$consulta = $connection->query($sql); 

?>

<table id="table_pet" class="table table-bordered table-hover" id="tabela">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id. pet</th>
            <th scope="col">Nome</th>
            <th scope="col">Raça</th>
            <th scope="col">Cod.Vacina</th>
            <th scope="col">Descrição</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
        
        <?php while ($row = $consulta->fetch_assoc()) { ?>
            <tr>
                <td scope="row"><?= $row['id_pet'] ?></td>
                <td scope="row"><?= $row['Nome do Pet'] ?></td>
                <td scope="row"><?php if($row['raca'] == 'raca'){
                                                echo "Raça";} ?></td>
                <td scope="row"><?= $row['codigo vacina'] ?></td>
                <td scope="row"><?= $row['Vacina'] ?></td>
                <!--<td><input type="submit" value="Certificado" name="relatorio" class="btn btn-primary"></td> -->
                <td><a href="?pagina=reg_vac&id=<?= $row['id_pet'] ?>&cpf=<?=$tutor?>" class="btn btn-primary">Gerar Carteira</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>