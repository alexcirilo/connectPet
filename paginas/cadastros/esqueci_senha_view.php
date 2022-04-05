<form action="controller/esqueci_senha.php" method="post" id="esqueci_senha">
    <div class="container">
        <label>
            Login:
            <input class="form-control" type="text" name="login" autofocus>
        </label>
    </div>
    <div class="container">
        <label>
            Senha:
            <input class="form-control" type="password" name="senha">
        </label>
    </div>
    <div class="container">
        <label>
            Confirme a senha:
            <input class="form-control" type="password" name="confirme_senha">
        </label>
    </div>

    <div class="container">
        <input type="submit" class="btn btn-secondary" value="Redefinir" name="redefinir">
        <label>
            <a class="btn btn-secondary" href="?pagina=login">Voltar</a>
        </label>
    </div>
</form>