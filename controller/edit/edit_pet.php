<?php
session_start();
require __DIR__ . "/../connection/conexao.php";

/*Referente ao form */
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$status = 'a';
$data = date('Y-m-d');

/* Referente a imagem */
$nome_arquivo = md5($_FILES['arquivo']['name'] . rand(1, 999));
$novo_nome = $nome_arquivo . '.' . pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
$local = $_FILES['arquivo']['tmp_name'];

$diretorio = '../imagens/pet/';

// verifica se o diretório existe
if(is_dir($diretorio)){
    $dir_imagem = $diretorio . $novo_nome;    
}else{
    mkdir('../imagens/pet/');
    $dir_imagem = $diretorio . $novo_nome;
}

//query para buscar o id conforme o cpf do tutor
$query  = "SELECT * from tutor where cpf = '{$dados['cpf']}'";
$consulta = mysqli_query($connection,$query);
$linha = mysqli_fetch_array($consulta);

$id_tutor = $linha['id_tutor'];

//cadastro do pet
if (isset($_POST['cadastrar'])) {
    $query = "update pet set nome_pet,especie,raca,data_nascimento,pelagem,sexo,castrado,microchip,local_implantacao,status,dt_status,id_tutor";
        
    $stmt = $connection->prepare($query);


    $stmt->bind_param(
        "sssssssssssi",
        $dados['nome_pet'],
        $dados['especie'],
        $dados['raca'],
        $dados['data_nascimento'],
        $dados['pelagem'],
        $dados['sexo'],
        $dados['castrado'],
        $dados['microchip'],
        $dados['local_implantacao'],
        $status,
        $data,
        $id_tutor
    );


    $stmt->execute();
// busca do id do pet conforme o nome para mover e salvar a imagem do pet
    $sql = "select p.id_pet, p.nome_pet from pet p where p.nome_pet = '{$dados['nome_pet']}'";
    $consulta = $connection->query($sql);
    
    $row = $consulta->fetch_array();

    $move = move_uploaded_file($local, $dir_imagem);
    if($move) {
        $query = "INSERT INTO foto_pet (nome_imagem,diretorio,id_pet) VALUES (?,?,?)";
        $stmt = $connection->prepare($query);


        $stmt->bind_param(
            "ssi",
            $novo_nome,
            $dir_imagem,
            $row['id_pet']
        );

        $stmt->execute();
    }
    
    $stmt->close();
    $connection->close();

    //redirecionamento para área principal
    header("Location: /connectpet/?pagina=home");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['nome_pet']}, cadastrado com Sucesso! </div>";

}else{
    header("Location: /connectpet/?pagina=cad_pet");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível cadastrar o Pet </div>";
}
