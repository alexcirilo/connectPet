<?php
session_start();
include __DIR__ . "/../../connection/conexao.php";

$id = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($_POST['salvar']) {
    $query = "update usuarios set cpf = ?, login = ?, nome = ?,
                id_funcao = ?, registro = ?, conselho = ?,email = ?,
                perfil = ? where id_usuario = $id";
    $stmt = $connection->prepare($query);


    $stmt->bind_param(
        "ssssisss",
        $dados['cpf'],
        $dados['login'],
        $dados['nome'],
        $dados['funcao'],
        $dados['registro'],
        $dados['conselho'],
        $dados['email'],
        $dados['perfil']
    );

    
    $stmt->execute();
    header("Location: /?pagina=consulta_usuarios");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['nome']}, atualizado com Sucesso! </div>";
    $stmt->close();
    $connection->close();

} else {
    header("Location: /?pagina=edit_usuario");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível alterar! </div>";
}
