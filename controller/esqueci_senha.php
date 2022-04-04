<?php
session_start();

require __DIR__."/../connection/conexao.php";
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

if(isset($_POST['redefinir'])){
    $query = "select * from usuarios where login = '{$dados['login']}'";
    $consulta = $connection->query($query);

    //Consulta o login, se retornar algum valor, compara. 
    if(($consulta) && $consulta->num_rows == 1){
        //compara a senha e a confirmação da senha
        if($dados['senha'] === $dados['confirme_senha']){
            $sql = "update usuarios set senha = ? where login = '{$dados['login']}'";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s",md5($dados['senha']));
            $stmt->execute();
            $stmt->close();
            $connection->close();
            header("Location: /connectPet/?pagina=login");
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Senha, alterada com Sucesso! </div>";
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>As senhas não coincidem</div>";
            header("location: /connectPet/?pagina=esqueci_senha");
        }
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário não encontrado!</div>";
        header("location: /connectPet/?pagina=esqueci_senha");
    }
}else{
    header("Location: /connectPet/?pagina/esqueci_senha");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>As senhas não coincidem</div>";
}