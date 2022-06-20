<?php
require __DIR__ . "/../connection/conexao.php";

$tutor = $_POST['busca'];

$sql = "select p.id_pet, p.nome_pet, p.raca, p.data_nascimento from pet p inner join tutor t on 
    p.id_pet = t.id_tutor 
    where t.nome = '{$tutor}'";

$consulta = $connection->query($sql);
while ($row = $consulta->fetch_assoc()) {   ?>
    <table id="tabela" class='table table-hover' id='tutorPet'>
        <thead class="thead-dark" style="text-align: center;">
            <tr>
                <th>PET</th>
                <th>Raça</th>
                <th>Data Nascimento</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <tr>
                <td><?= $row['nome_pet'] ?></td>
                <td><?= $row['raca'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['data_nascimento'])) ?></td>
            </tr>
        </tbody>

    </table>
    <br>
    <div style="text-align: right;">
        <input class='btn btn-secondary' type='submit' value='Gerar Relatório' name='relatorio'>
    </div>
<?php }

?>