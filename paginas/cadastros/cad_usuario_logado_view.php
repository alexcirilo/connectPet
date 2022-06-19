<?php
require __DIR__ . "/../../functions/busca_funcao.php";
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>

<h2>Cadastro de Usuários</h2>
<form action="controller/cad_usuario_logado.php" method="post" id="cad_usuario_logado">
    <div class="row">
        <div class="col-6">
            <div class="container">
                <label>
                    Nome:
                    <input class="form-control" autofocus type="text" name="nome" required>
                </label>
            </div>
            <div class="container">
                <label>
                    Login:
                    <input class="form-control" autofocus type="text" name="login" required>
                </label>
            </div>
            <div class="container">
                <label>
                    CPF:
                    <input class="form-control" autofocus type="text" name="cpf" id="cpf" placeholder="000.000.000-00" required>
                </label>
            </div>
            <div class="container">
                <label>
                    Senha:
                    <input class="form-control" type="password" name="senha">
                </label>
            </div>

        </div>
        <div class="col-6">
            <div class="container">
                <label>
                    Registro:
                    <input class="form-control" type="text" name="registro">
                </label>
            </div>
            <div class="container">
                <label>
                    Conselho:
                    <input class="form-control" autofocus type="text" name="conselho">
                </label>
            </div>

            <div class="container">
                <div class="form-row align-itens-center">
                    <div class="col-auto-my-2">
                        <label>Função:</label>
                        <select class="custom-select mr-sm-2" name="funcao">
                            <?php while ($linha = $consulta->fetch_assoc()) { ?>
                                <option value="">Selecione</option>
                                <option value="<?= $linha['id_funcao'] ?>"><?= $linha['descricao'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row align-itens-center">
                    <div class="col-auto-my-2">
                        <label>Perfil:</label>
                        <select class="custom-select mr-sm-2" name="perfil">
                            <option value="">Selecione</option>
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
        <label>
            E-mail
        </label>
            <input class="form-control" type="email" name="email">
    </div>
    <div class="container" style="text-align: center; margin-top: 10px;">
        <input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar">
        <a href="/?pagina=consulta_usuarios" class="btn btn-secondary">Voltar</a>
    </div>
</form>
