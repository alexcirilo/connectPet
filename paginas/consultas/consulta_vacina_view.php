<?php
require __DIR__ . "/../../controller/consultas/busca_vacina.php";
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();

?>
<h2>Consulta de Vacinas</h2>
<hr>
<table id="consulta_vacina" class="display">
    <thead class="table-dark">
        <tr>
            <th>Código</th>
            <th>Descricao</th>
            <th>Laboratório</th>
            <th>Quantidade</th>
            <th>Validade</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $consulta->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['codigo'] ?></td>
                <td><?= $row['descricao'] ?></td>
                <td><?= $row['laboratorio'] ?></td>
                <td><?= $row['quantidade'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['validade'])) ?></td>
                <td><?php if ($row['status'] == 'a') {
                        echo 'Ativo';
                    } else {
                        echo 'Inativo';
                    } ?></option>
                </td>
                <td><a href="?pagina=edit_vacina&id=<?= $row['id_vacina'] ?>">Editar</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<hr/>
<div class="container" style="text-align: center;">
    <a class="btn btn-secondary" href="?pagina=cad_vacina">Nova Vacina</a>
    <a class="btn btn-secondary" href="?pagina=home">Voltar</a>
</div>