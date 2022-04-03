<?php
session_start();

require __DIR__."/../connection/conexao.php";
$dados = filter_input(INPUT_POST,FILTER_DEFAULT);

if(isset($_POST['redefinir'])){
    $query = "select * from usuarios where login = '{$dados['login']}'";
    $consulta = $connection->query($query);
    if(($consulta) && $consulta->num_rows == 1){
        if($dados['senha'] === $dados['confirme_senha']){
            $sql = "update usuarios set senha = '{$dados['senha']} where login = '{$dados['login']}'";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s",md5($dados['senha']));
            $stmt->execute();
            $stmt->close();
            $connection->close();
            header("Location: /connectPet/?pagina=login");
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Senha, alterada com Sucesso! </div>";
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>As senhas não coincidem</div>";
        }
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário não encontrado!</div>";
    }
}else{
    header("Location: /connectPet/?pagina/esqueci_senha");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>As senhas não coincidem</div>";
}