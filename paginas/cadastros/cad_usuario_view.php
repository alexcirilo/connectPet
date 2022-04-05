<form action="controller/cad_usuario.php" method="post" id="cad_usuario">
    <div class="container">
        <label>
            Login:
            <input class="form-control" type="text" name="login">
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
        <a href="?pagina=login" class="btn btn-secondary">Voltar</a>
    </div>
</form>