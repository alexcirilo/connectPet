<?php
require __DIR__ . "/../connection/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($_POST['cadastrar'])) {
    $sql = "INSERT INTO usuarios (login,senha) VALUES (?,?)";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param(
        "ss",
        $dados['login'],
        md5($dados['senha'])
    );

    $statement = $connection->prepare("select login from usuarios where login = {$dados['login']}");
    
    if($stmt->num_rows()>1){
        header("Location: /connectpet/?pagina=cad_usuario");
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Já possui registro com o login informado! </div>";

    }else{
        header("Location: /connectpet/?pagina=login");
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Cadastro Efetuado com Sucesso! </div>";
        $stmt->execute();
        $stmt->close();
        $connection->close();
        
    }
    
}
