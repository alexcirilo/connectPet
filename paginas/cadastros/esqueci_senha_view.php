<form action="controller/esqueci_senha.php" method="post" id="esqueci_senha">
    <div class="container">
        <label>
            Login:
            <input class="form-control" type="text" name="login" autofocus>
        </label>

        <label>
            Senha:
            <input class="form-control" type="password" name="senha">
        </label>
        <label>
            Confirme a senha:
            <input class="form-control" type="password" name="confirme_senha">
        </label>
    </div>

    <div class="container">
        <input type="submit" class="btn btn-secondary" value="Redefinir" name="redefinir">
        <label style="padding-top: 10px;">
            <a href="?pagina=login">Voltar</a>
        </label>
    </div>
</form>