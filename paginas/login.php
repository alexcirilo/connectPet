<form action="controller/loginController.php" method="post" id="login">
    <div class="form-group">
        <label>
            Login:
            <input type="text" autofocus class="form-control" name="login">
        </label>
    </div>
    <div class="form-group">
        <label>
            Senha:
            <input type="password" class="form-control" name="senha">
        </label>

    </div>
    <input class="btn btn-primary" type="submit" value="Entrar" name="entrar">
    <div>
        <label><a href="?pagina=esqueci_senha">Esqueci minha senha
            </a>
        </label> |
        <label><a href="?pagina=cad_usuario">Novo Cadastro</a></label>
    </div>
</form>