<?php
session_start();
require __DIR__ . "/../connection/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$data = date('Y-m-d');
$status = 'a';

if (isset($_POST['cadastrar'])) {

    $query = "select * from usuarios where login = '{$dados['login']}' or nome = '{$dados['nome']}'";

    $consulta = $connection->query($query);

    if (($consulta) and $consulta->num_rows == 0) {
        $sql = "INSERT INTO usuarios (cpf,login,senha,nome,id_funcao,registro,conselho,email,perfil,status,dt_status)
         VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param(
            "ssssisssiss",
            $dados['cpf'],
            $dados['login'],
            md5($dados['senha']),
            $dados['nome'],
            $dados['funcao'],
            $dados['registro'],
            $dados['conselho'],
            $dados['email'],
            $dados['perfil'],
            $status,
            $data
        );

        header("Location: /?pagina=consulta_usuarios");
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['nome']}, cadastrado com Sucesso! </div>";
        $stmt->execute();
        $stmt->close();
        $connection->close();
    } else {
        header("Location: /?pagina=cad_usuario_logado");
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>{$dados['nome']}, Usuário já cadastrado! </div>";
    }
} else {
    header("Location: /?pagina=cad_usuario_logado");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível Cadastrar! </div>";
}
