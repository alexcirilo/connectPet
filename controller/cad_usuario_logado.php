<?php
session_start();
require __DIR__ . "/../connection/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($_POST['cadastrar'])) {

    $query = "select * from usuarios where login = '{$dados['login']}'";

    $consulta = $connection->query($query);

    if(($consulta) and $consulta->num_rows == 0){
        $sql = "INSERT INTO usuarios (login,senha) VALUES (?,?)";
    
        $stmt = $connection->prepare($sql);
        $stmt->bind_param(
            "ss",
            strtolower($dados['login']),
            md5($dados['senha'])
        );
            
            header("Location: /?pagina=home");
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['login']}, cadastrado com Sucesso! </div>";
            $stmt->execute();
            $stmt->close();
            $connection->close();

    }else{
        header("Location: /?pagina=cad_usuario_logado");
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>{$dados['login']}, Usuário já cadastrado! </div>";
    }


}else{
    header("Location: /?pagina=cad_usuario_logado");
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível Cadastrar! </div>";
}
