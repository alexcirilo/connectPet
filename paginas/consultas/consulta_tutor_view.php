<?php
require __DIR__ . "/../../controller/consultas/busca_tutor.php";
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();

?>
<h2>Consulta de Tutor</h2>
<hr>
<table id="consulta_pet" class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $consulta->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id_tutor'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['cpf'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['telefone'] ?></td>
                <td><a href="?pagina=edit_tutor&id=<?= $row['id_tutor'] ?>">Editar</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<hr/>
<div class="container" style="text-align: center;">
    <a class="btn btn-secondary" href="?pagina=cad_tutor">Novo Tutor</a>
    <a class="btn btn-secondary" href="?pagina=home">Voltar</a>
</div>