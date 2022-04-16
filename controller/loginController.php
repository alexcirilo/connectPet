<?php
session_start();
require __DIR__ . "../../connection/conexao.php";

$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS));

$entrar = $_POST['entrar'];
if (isset($entrar)) {
    $sql = "SELECT * from usuarios where login = '{$login}' and senha = '{$senha}'";

    $consulta = mysqli_query($connection, $sql);

    ($linha = mysqli_fetch_array($consulta));

    if (empty($login) || (empty($senha))) {
        header("Location: /connectpet/?pagina=login");
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Preencher todos os campos! </div>";
    } elseif (strtolower($login) == $linha['login'] && $senha == $linha['senha']) {
        header("Location: /connectpet/?pagina=home");
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Login Efetuado com Sucesso! </div>";
    } else {
        header("Location: /connectpet/?pagina=login");
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Login ou senha Incorretos! </div>";
    }

} else {
    header("Location: /connectpet/?pagina=login");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>NOT PASS! </div>";
}
