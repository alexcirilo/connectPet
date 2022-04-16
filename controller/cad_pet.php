<?php
require __DIR__ . "/../connection/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query  = "SELECT * from tutor where cpf = '{$dados['cpf']}'";
$consulta = mysqli_query($connection,$query);
$linha = mysqli_fetch_array($consulta);

$id_tutor = $linha['id_tutor'];


if (isset($_POST['cadastrar'])) {
    $query = "INSERT INTO pet (nome_pet,especie,raca,data_nascimento,sexo,castrado,id_tutor)
        VALUES (?,?,?,?,?,?,?)";
        
    $stmt = $connection->prepare($query);


    $stmt->bind_param(
        "ssssssi",
        $dados['nome_pet'],
        $dados['especie'],
        $dados['raca'],
        $dados['data_nascimento'],
        $dados['sexo'],
        $dados['castrado'],
        $id_tutor
    );

   

    $stmt->execute();
    $stmt->close();
    $connection->close();

    header("Location: /?pagina=home");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['nome_pet']}, cadastrado com Sucesso! </div>";
}else{
    header("Location: /?pagina=cad_pet");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível cadastrar o Pet </div>";
}
