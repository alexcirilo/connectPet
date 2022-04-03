<form action="controller/loginController.php" method="post" id="login">
    <div class="container">
        <label>
            Login:
            <input type="text" class="form-control" name="login">
        </label>
        <label>
            Senha:
            <input type="password" class="form-control" name="senha">
        </label>
        <input class="btn btn-primary" type="submit" value="Entrar" name="entrar">

    </div>
    <div class="container">
        <label><a href="?pagina=esqueci_senha">Esqueci minha senha
            </a>
        </label> |
        <label><a href="?pagina=cad_usuario">Novo Cadastro</a></label>
    </div>
</form>
