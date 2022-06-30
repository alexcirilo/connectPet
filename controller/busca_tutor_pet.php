<?php
require __DIR__ . "/../connection/conexao.php";

$tutor = $_POST['busca'];

$sql = "select p.id_pet, p.nome_pet, p.raca, p.data_nascimento from pet p inner join tutor t on 
    p.id_tutor = t.id_tutor 
    where t.cpf = '{$tutor}'";

$consulta = $connection->query($sql);
?>
<table id="tabela" class='table table-hover' id='tutorPet'>
    <thead class="thead-dark" style="text-align: center;">
        <tr>
            <th>PET</th>
            <th>Raça</th>
            <th>Data Nascimento</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
                <?php while ($row = $consulta->fetch_assoc()) {   ?>
            <tr>
                <td><?= $row['nome_pet'] ?></td>
                <td><?= $row['raca'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['data_nascimento'])) ?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
    <br>
    <div style="text-align: right;">
        <input class='btn btn-secondary' type='submit' value='Gerar Relatório' name='relatorio'>
    </div>
