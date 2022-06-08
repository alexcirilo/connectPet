<?php
require __DIR__ . "/../../controller/consultas/busca_pet.php";
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();

?>
<h2>Consulta de Pet's</h2>
<hr>
<table id="consulta_pet" class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th>Data Nascimento</th>
            <th>Sexo</th>
            <th>Castrado</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $consulta->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id_pet'] ?></td>
                <td><?= $row['nome_pet'] ?></td>
                <td><?= $row['especie'] ?></td>
                <td><?= $row['raca'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['data_nascimento'])) ?></td>
                <td><?= $row['sexo'] ?></td>
                <td><?= $row['castrado'] ?></td>
                <td><?php if ($row['status'] == 'a') {
                        echo 'Ativo';
                    } else {
                        echo 'Inativo';
                    } ?></option>
                </td>
                <td><a href="?pagina=edit_pet&id=<?= $row['id_pet'] ?>">Editar</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<hr/>
<div class="container" style="text-align: center;">
    <a class="btn btn-secondary" href="?pagina=cad_pet">Novo Pet</a>
    <a class="btn btn-secondary" href="?pagina=home">Voltar</a>
</div>