<?php
session_start();
require __DIR__ . "/../connection/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($_POST['vacinar'])) {

    $query = "SELECT id_pet, nome_pet from pet where nome_pet = '{$dados['nome_pet']}'";
    $consulta = $connection->query($query);

    $linha = $consulta->fetch_array();
    $id_pet = $linha['id_pet'];

    $query = "SELECT id_vacina, codigo, descricao from vacina where id_vacina = '{$dados['vacina']}'";
    $consulta = $connection->query($query);
    $linha = $consulta->fetch_assoc();

    $id_vacina = $linha['id_vacina'];
    $codigo = $linha['codigo'];

    $sql = "INSERT INTO vacinacao (id_pet,data_vacina,id_vacina,codigo) values (?,?,?,?)";

    $stmt = $connection->prepare($sql);

    $stmt->bind_param(
        "isis",
        $id_pet,
        $dados['data_vacina'],
        $id_vacina,
        $codigo
    );
    $stmt->execute();

    $sql = "update vacina set quantidade = quantidade -1 where id_vacina = ?";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param(
        "i",
        $id_vacina
    );
    $stmt->execute();

    header("Location: /?pagina=home");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Vacina Aplicada com Sucesso! </div>";
    $stmt->close();
    $connection->close();

    //var_dump("pet: ". $id_pet, "vacina:".$linha['id_vacina'], "codigo vacina: ".$linha['codigo'], "Data: ".$dados['data_vacina']);

} else {
    header("Location: /?pagina=vacinar");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível vacinar </div>";
}
