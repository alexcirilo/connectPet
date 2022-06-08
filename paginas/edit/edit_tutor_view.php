<?php
include __DIR__ . "/../../functions/verifica_login.php";
include __DIR__ . "/../../connection/conexao.php";

verifica_login();

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$query = "SELECT t.*, e.* FROM tutor t inner join endereco e ON e.tutor_id = t.id_tutor where t.id_tutor = $id";

$consulta = $connection->query($query);
$row = $consulta->fetch_assoc();

?>
<h2>Editar Tutor: <?= $row['nome'] ?></h2>
<form action="controller/edit/edit_tutor.php" method="post" id="edit_tutor">
    <div class="container" style="border: 1px solid">
        <div class="form-group">
        <input class="form-control col-md-2" type="hidden" name="id_tutor" value="<?= $row['id_tutor'] ?>">
            <label>
                Nome:
            </label>
            <input type="text" autofocus name="nome" class="form-control col-md-8" value="<?=$row['nome']?>" required>
        </div>
        <div class="form-group">
            <div>
                <label>
                    CPF:
                    <input type="text" name="cpf" class="form-control" id="cpf" value="<?=$row['cpf']?>" placeholder="xxx.xxx.xxx-xx" required>
                </label>
                <label>
                    E-mail:
                    <input type="email" name="email" id="email" class="form-control" value="<?=$row['email']?>" required>
                </label>
                <label>
                    Telefone:
                    <input type="tel" name="telefone" id="telefone" class="form-control" value="<?=$row['telefone']?>" required>
                </label>
            </div>
        </div>
        <hr />
        <div class="form-group">
            <label>
                CEP:
                <input name="cep" type="text" id="cep"  size="10" value="<?=$row['cep']?>" maxlength="9" required class="form-control" onblur="pesquisacep(this.value);" /></label>
            </label>
        </div>
        <div class="form-group">
            <label>
                Logradouro:
                <input name="logradouro" type="text" id="rua" size="60" value="<?=$row['logradouro']?>" class="form-control" required />
            </label>
            <label>
                Número:
                <input type="text" name="numero" id="numero" class="form-control col-md-4" value="<?=$row['numero']?>" required>
            </label>
        </div>
        <div class="form-group">
            <label>Complemento:</label>
            <input type="text" name="complemento" id="complemento" class="form-control col-md-10" value="<?=$row['complemento']?>">
        </div>
        <div class="form-group">
            <label>Bairro:</label>
            <input name="bairro" type="text" id="bairro" size="40" class="form-control" value="<?=$row['bairro']?>" required />
        </div>
        <div class="form-group">
            <label>Cidade:</label>
            <input name="cidade" type="text" id="cidade" size="40" class="form-control" value="<?=$row['cidade']?>" required />
        </div>
        <label>UF:</label>
        <input name="uf" type="text" id="uf" class="form-control col-md-2" size="2" value="<?=$row['uf']?>" required />
        <br>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Salvar" name="salvar">
    </div>

</form>