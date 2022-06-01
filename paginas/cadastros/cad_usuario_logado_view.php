<?php
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>
<div class="bg-info" style="border: 1px solid grey; border-radius: 5px; padding: 10px;">
    <form action="controller/cad_usuario_logado.php" method="post" id="cad_usuario_logado">
        <div class="container">
            <label>
                Login:
                <input class="form-control" autofocus type="text" name="login">
            </label>
        </div>
        <div class="container">
            <label>
                Senha:
                <input class="form-control" type="password" name="senha">
            </label>
        </div>
        <div class="container">
            <input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar">
            <a href="?pagina=home" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>
