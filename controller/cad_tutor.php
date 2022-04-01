<?php
session_start();
include __DIR__ . "/../connection/conexao.php";


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//verificar se o usuario clicou no botão
if (!empty($dados['cadastrar'])) {
    $sql = "INSERT INTO tutor (cpf, nome, email, telefone) VALUES (?,?,?,?)";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $dados['cpf'], $dados['nome'], $dados['email'], $dados['telefone']);
    $stmt->execute();

    $id_tutor = $connection->insert_id;

    $query = "INSERT INTO endereco 
    (cep, logradouro, numero, complemento, bairro, cidade, uf, tutor_id)
    values (?,?,?,?,?,?,?,?)";
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
        $id_tutor
    );
    $stmt->execute();
    $stmt->close();
    $connection->close();
} else {
    echo "Erro";
}
