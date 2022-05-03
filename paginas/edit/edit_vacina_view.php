<?php
include __DIR__ . "/../../functions/verifica_login.php";
include __DIR__ . "/../../connection/conexao.php";

verifica_login();

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$query = "select * from vacina where id_vacina = $id";

$consulta = $connection->query($query);
$row = $consulta->fetch_assoc();

?>

<h2>Editar vacina: <?= $row['descricao'] ?></h2>
<form action="controller/edit/edit_vacina.php" method="post" id="edit_vacina">
    <div class="container" style="border: 1px solid; padding-bottom: 10px;">
        <div class="form-group">

        </div>
        <div class="form-group">
            <div>
                <input type="hidden" name="id_vacina" value="<?= $row['id_vacina'] ?>">
                <label>
                    código
                    <input type="text" autofocus name="codigo" class="form-control" placeholder="Ex: FB7252" required value="<?= $row['codigo'] ?>">
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>
                Descrição:
                <input name="descricao" type="text" id="descricao" size="60" maxlength="9" required class="form-control" value="<?= $row['descricao'] ?>" />
        </div>
        <div class="form-group">
            <label>
                Laboratório:
                <input name="laboratorio" type="text" id="laboratorio" size="60" class="form-control" required value="<?= $row['laboratorio'] ?>" />
            </label>
            <label>
                Quantidade:
                <input type="text" name="quantidade" class="form-control col-md-4" required value="<?= $row['quantidade'] ?>">
            </label>
        </div>

        <div class="form-group">
            <label>
                Dt.Validade:
                <input name="validade" type="date" id="validade" class="form-control" required value="<?= $row['validade'] ?>" />
            </label>
            <label>
                Lote:
                <input type="text" name="lote" class="form-control col-md-4" required value="<?= $row['lote'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label>
                Dt.Status:
                <input name="dt_status" type="date" id="dt_status" size="60" class="form-control" required value="<?= $row['dt_status'] ?>" />
            </label>
            <div class="form-row align-itens-center">
                <div class="col-auto-my-1">
                    <label>Status:</label>
                    <select class="custom-select mr-sm-2" id="status" name="status">
                        <option value="<?= $row['status'] ?>"><?php if ($row['status'] == 'a') {
                                                                echo 'Ativo';
                                                            } else {
                                                                echo 'Inativo';
                                                            } ?></option>
                        <option value="a">Ativo</option>
                        <option value="i">Inativo</option>

                    </select>
                </div>
            </div>
        </div>

        <div class="container">
            <input type="submit" class="btn btn-success" value="Salvar" name="cadastrar">
            <a class="btn btn-primary" href="?pagina=consulta_vacina">Voltar</a>
        </div>
    </div>


</form>