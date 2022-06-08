<?php
session_start();
include __DIR__ . "/../connection/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$data = date('Y-m-d');
$status = 'a';

if ($_POST['cadastrar']) {
    $query = "insert into vacina (codigo, descricao, lote, laboratorio,quantidade, validade, status, dt_status) values (?,?,?,?,?,?,?,?)";

    $stmt = $connection->prepare($query);

    $stmt->bind_param(
        'ssssssss',
        $dados['codigo'],
        $dados['descricao'],
        $dados['lote'],
        $dados['laboratorio'],
        $dados['quantidade'],
        $dados['validade'],
        $status,
        $data
    );

    
    header("Location: /?pagina=consulta_vacina");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['descricao']}, cadastrada com Sucesso! </div>";
    $stmt->execute();
    $stmt->close();
    $connection->close();
} else {
    header("Location: /?pagina=cad_vacinacao");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Não foi possível cadastrar! </div>";
}
