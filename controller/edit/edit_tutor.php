<?php
session_start();
include __DIR__ . "/../../connection/conexao.php";

$id = filter_input(INPUT_POST, 'id_tutor', FILTER_SANITIZE_NUMBER_INT);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$data = date('Y-m-d');
$status = 'a';

if ($_POST['salvar']) {
    $query = "update tutor set cpf = ?, nome = ?,
                email = ?,telefone = ?, status = ?, dt_status = ?
                where id_tutor = $id";
    $stmt = $connection->prepare($query);


    $stmt->bind_param(
        "ssssss",
        $dados['cpf'],
        $dados['nome'],
        $dados['email'],
        $dados['telefone'],
        $status,
        $data
    );

    
    $stmt->execute();

    $query = "update endereco set cep = ?, logradouro = ?,
                numero = ?, complemento = ?, bairro = ?,
                cidade = ?, uf = ?, tutor_id = ?
                where tutor_id = $id";
    $stmt = $connection->prepare($query);
    $stmt->bind_param(
        "sssssssi",
        $dados['cep'],
        $dados['logradouro'],
        $dados['numero'],
        $dados['complemento'],
        $dados['bairro'],
        $dados['cidade'],
        $dados['uf'],
        $id
    );

    $stmt->execute();
    header("Location: /?pagina=consulta_tutor");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['nome']}, atualizado com Sucesso! </div>";
    $stmt->close();
    $connection->close();

} else {
    header("Location: /?pagina=edit_tutor&id=$id");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível alterar! </div>";
}
