<?php
require __DIR__ . "/../../controller/consultas/busca_usuarios.php";
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();

?>
<h2>Consulta de Usuários</h2>
<hr>
<table id="consulta_usuarios" class="table table-hover display">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Login</th>
            <th>Registro</th>
            <th>Conselho</th>
            <th>Função</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $consulta->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id_usuario'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['cpf'] ?></td>
                <td><?= $row['login'] ?></td>
                <td><?= $row['registro'] ?></td>
                <td><?= $row['conselho'] ?></td>
                <td><?= $row['descricao'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><a href="?pagina=edit_usuario&id=<?= $row['id_usuario'] ?>">Editar</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<hr/>
<div class="container" style="text-align: center;">
    <a class="btn btn-secondary" href="?pagina=cad_usuario_logado">Novo Tutor</a>
    <a class="btn btn-secondary" href="?pagina=home">Voltar</a>
</div>