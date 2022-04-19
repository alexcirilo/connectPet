<?php
session_start();
include __DIR__ . "/../connection/conexao.php";


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//verificar se o usuario clicou no botão
if (!empty($dados['cadastrar'])) {
    $query = "select * from tutor where cpf = '{$dados['cpf']}'";
    $consulta = $connection->query($query);

    if (($consulta) && $consulta->num_rows == 0) {
        $sql = "INSERT INTO tutor (cpf, nome, email, telefone) VALUES (?,?,?,?)";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $dados['cpf'], $dados['nome'], $dados['email'], $dados['telefone']);
        $stmt->execute();

        $id_tutor = $connection->insert_id;

        $query = "INSERT INTO endereco (cep, logradouro, numero, complemento, bairro, cidade, uf, tutor_id) values (?,?,?,?,?,?,?,?)";
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
        header("Location: /?pagina=home");
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['nome']}, cadastrado com Sucesso! </div>";
        $stmt->execute();
        $stmt->close();
        $connection->close();
    }else{
        header("Location: /?pagina=cad_tutor");
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Já existe um cadastro com o CPF informado! </div>";
    }
} else {
    header("Location: /?pagina=cad_tutor");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível cadastrar! </div>";
}
