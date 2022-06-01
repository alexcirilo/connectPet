<?php
require __DIR__ . "/../../controller/consultas/busca_vacina.php";
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();

?>
<h2>Consulta de vacina</h2>
<div class=".container-fluid border px-md-5 py-md-5 bg-info text-black-50 " style="padding: 20px;
    border: 1px solid; border-radius: 5px;">
    <table id="consulta_vacina" class="display ">
        <thead>
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
        <a class="btn btn-success" href="?pagina=cad_vacina">Nova Vacina</a>
        <a class="btn btn-success" href="?pagina=home">Voltar</a>
    </div>
</div>
