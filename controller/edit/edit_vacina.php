<?php
session_start();
include __DIR__ . "/../../connection/conexao.php";

$id = filter_input(INPUT_POST, 'id_vacina', FILTER_SANITIZE_NUMBER_INT);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($_POST['cadastrar']) {
    $query = "update vacina set codigo = ?, descricao = ?, lote = ?,
                laboratorio = ?, quantidade = ?, validade = ?, status = ?, dt_status = ? where id_vacina = $id";
    $stmt = $connection->prepare($query);

    var_dump($query);

    $stmt->bind_param(
        "ssssisss",
        $dados['codigo'],
        $dados['descricao'],
        $dados['lote'],
        $dados['laboratorio'],
        $dados['quantidade'],
        $dados['validade'],
        $dados['status'],
        $dados['dt_status']
    );
    
    $stmt->execute();
    header("Location: /?pagina=consulta_vacina");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['descricao']}, atualizado com Sucesso! </div>";
    $stmt->execute();
    $stmt->close();
    $connection->close();

} else {
    header("Location: /?pagina=edit_vacina");
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível cadastrar! </div>";
}
