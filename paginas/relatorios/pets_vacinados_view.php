<?php
include __DIR__ . "/../../functions/verifica_login.php";
require __DIR__ . "/../../controller/consultas/busca_pets_vacinados.php";
require __DIR__ . "/../../controller/consultas/busca_vacinacao.php";
verifica_login();
?>
<h2>Total de Pets Vacinados</h2>
<hr>
<table id="pets_vacinados" class="table table-hover" id="pets_vacinados">
    <thead class="table-dark">
        <tr>
            <th>Nome do Pet</th>
            <th>Vacina</th>
            <th>Data de Vacinação</th>
            <th>Código</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $consulta->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['Nome do Pet'] ?></td>
                <td><?= $row['Vacina'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['Data de Vacinação'])) ?></td>
                <td><?= $row['Código'] ?></td>
            </tr>
        <?php } ?>
        <thead>
            <tr>
                <th colspan="3">Total</th>
                <?php $linha =  $con->fetch_assoc() ?>
                <th><?= $linha['count(*)'] ?></th>
            </tr>
        </thead>
    </tbody>
</table>
<hr />
<div class="container" style="text-align: center; margin-bottom: 5px;">
    <a class="btn btn-secondary" href="?pagina=vacinar">Vacinar</a>
    <a class="btn btn-secondary" href="?pagina=home">Voltar</a>
    <a class="btn btn-secondary" target="_blank" href="controller/relatorios/pets_vacinados.php">Gerar Relatório</a>
</div>