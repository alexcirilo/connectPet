<?php
include __DIR__ . "/../../functions/verifica_login.php";
include __DIR__ . "/../../connection/conexao.php";

verifica_login();
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$query = "select u.*, f.descricao from usuarios u inner join funcao f on 
u.id_funcao = f.id_funcao
where u.id_usuario = $id";

$consulta = $connection->query($query);
$row = $consulta->fetch_assoc();

?>

<h1>Editar Usuário: <?= $row['nome'] ?></h1>
<form action="controller/edit/edit_usuario.php" method="post" id="edit_usuario">
    <div class="row">
        <div class="col-6">
            <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$row['id_usuario']?>">
            <div class="container">
                <label>
                    Nome:
                    <input class="form-control" autofocus type="text" name="nome" value="<?= $row['nome'] ?>" required>
                </label>
            </div>
            <div class="container">
                <label>
                    Login:
                    <input class="form-control" autofocus type="text" name="login" value="<?= $row['login'] ?>" required>
                </label>
            </div>
            <div class="container">
                <label>
                    CPF:
                    <input class="form-control" autofocus type="text" name="cpf" id="cpf" value="<?= $row['cpf'] ?>" placeholder="000.000.000-00" required>
                </label>
            </div>
            <div class="container">
                <label>
                    E-mail:
                    <input class="form-control" type="email" value="<?= $row['email'] ?>" name="email">
                </label>
            </div>
        </div>
        <div class="col-6">
            <div class="container">
                <label>
                    Registro:
                    <input class="form-control" type="text" value="<?= $row['registro'] ?>" name="registro">
                </label>
            </div>
            <div class="container">
                <label>
                    Conselho:
                    <input class="form-control" autofocus type="text" value="<?= $row['conselho'] ?>" name="conselho">
                </label>
            </div>

            <div class="container">
                <div class="form-row align-itens-center">
                    <div class="col-auto-my-2">
                        <label>Função:</label>
                        <select class="custom-select mr-sm-2" name="funcao">
                        <?php 
                        $query = "SELECT * FROM funcao";

                        $consulta = $connection->query($query);
                        while ($linha = $consulta->fetch_assoc()) { ?>
                                <option value="<?= $linha['id_funcao'] ?>"><?= $linha['descricao'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row align-itens-center">
                    <div class="col-auto-my-2">
                        <label>Perfil:</label>
                        <select class="custom-select mr-sm-2" name="perfil">
                            <option value="<?= $row['perfil'] ?>"><?php if ($row['perfil'] == 1) {
                                                                        echo "Administrador";
                                                                    }elseif($row['perfil'] == 2){
                                                                        echo "Vacinador";
                                                                    }else{
                                                                        echo "Usuario";
                                                                    } ?></option>
                            <option value="1">Administrador</option>
                            <option value="2">Vacinador</option>
                            <option value="3">Usuário</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <input class="btn btn-success" type="submit" value="Salvar" name="salvar">
        <a href="/?pagina=consulta_usuarios" class="btn btn-secondary">Voltar</a>
    </div>
</form>