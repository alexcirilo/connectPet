<?php
session_start();
include __DIR__ . "/../../connection/conexao.php";

/*Referente ao form */
$id = filter_input(INPUT_POST, 'id_pet', FILTER_SANITIZE_NUMBER_INT);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$status = 'a';
$data = date('y-m-d');
/* Referente a imagem */
$nome_arquivo = md5($_FILES['arquivo']['name'] . rand(1, 999));
$novo_nome = $nome_arquivo . '.' . pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
$local = $_FILES['arquivo']['tmp_name'];

$diretorio = '../../imagens/pet/';

// verifica se o diretório existe
if(is_dir($diretorio)){
    $dir_imagem = $diretorio . $novo_nome;    
}else{
    mkdir('../../imagens/pet/');
    $dir_imagem = $diretorio . $novo_nome;
}



//editar pet
if ($_POST['salvar']) {
    $query = "update pet set nome_pet = ?,especie = ?,raca = ?,data_nascimento = ?,pelagem = ?,
    sexo = ?,castrado = ?,microchip = ?,local_implantacao = ?,
    status = ?,dt_status = ?,id_tutor = ? where id_pet = {$dados['id_pet']}";
        
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
        $dados['id_tutor']
    );


    $stmt->execute();

    $move = move_uploaded_file($local, $dir_imagem);
    if($move) {
        $query = "update foto_pet set nome_imagem = ?, diretorio= ? where id_pet = $id for update";
        $stmt = $connection->prepare($query);


        $stmt->bind_param(
            "ss",
            $novo_nome,
            $dir_imagem,
            
        );
        $stmt->execute();
    }
   
    $stmt->close();
    $connection->close();

    //redirecionamento para área de consulta
    header("Location: /?pagina=consulta_pet");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>{$dados['nome_pet']}, alterado com Sucesso! </div>";

}else{
    header("Location: /pagina=edit_pet");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível editar o Pet </div>";
}

