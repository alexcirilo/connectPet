<?php
require __DIR__ . "/../../connection/conexao.php";



if (isset($_POST['pesquisar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $query = "SELECT id_tutor, cpf, nome from tutor where cpf = '{$dados['cpf']}'";

    $resultado = $connection->query($query);
    $dado = mysqli_fetch_array($resultado);
}


?>

<h1>Cadastro de Pet</h1>
<form action="#" method="post">
    <div class="tutor_pet">
        <div class="form-group">
            <input type="hidden" name="id_tutor" value="<?= isset($dado['id_tutor']) ? $dado['id_tutor'] : '' ?>">
            <label>CPF:
                <input class="form-control" type="text" name="cpf" value="<?= isset($dado['cpf']) ? $dado['cpf'] : '' ?>">
            </label>
            <input class="btn btn-primary" type="submit" value="Pesquisar" name="pesquisar">
            <a class="btn btn-primary" href="?pagina=cad_tutor">Novo Tutor</a>
        </div>
        <label>Tutor:</label>
        <input class="form-control" type="text" name="tutor" value="<?= isset($dado['nome']) ? $dado['nome'] : '' ?>">
    </div>
</form>

<form action="controller/cad_pet.php" method="post" id="cad_pet">

    <hr />
    <div class="container pet">
        <label>
            Nome:
        </label>
        <input class="form-control col-md-12" type="text" name="nome_pet">

        <div class="form-row align-itens-center">
            <div class="col-auto-my-1">
                <label>Espécie:</label>
                <select class="custom-select mr-sm-2" name="especie">
                    <option value="">Selecione</option>
                    <option value="cão">Cão</option>
                    <option value="gato">Gato</option>
                </select>
            </div>
            <div class="col-auto-my-1">
                <label>Sexo:</label>
                <select class="custom-select mr-sm-1" name="sexo">
                    <option value="">Selecione</option>
                    <option value="M">Macho</option>
                    <option value="F">Fêmea</option>
                </select>
            </div>
        </div>
        <div class="form-row align-itens-center">
            <div class="col-auto-my-2">
                <label>Raça:</label>
                <select class="custom-select mr-sm-2" name="raca">
                    <option value="">Selecione</option>
                    <option value="cão">Raça</option>
                    <option value="gato">Vira Lata</option>
                </select>
            </div>
            <div class="col-auto-my-1">
                <label>Castrado:</label>
                <select class="custom-select mr-sm-1" name="castrado">
                    <option value="">Selecione</option>
                    <option value="s">Sim</option>
                    <option value="n">Não</option>
                </select>
            </div>
        </div>
        <label>Data de Nascimento: </label>
        <input class="form-control col" type="date" name="data_nascimento">
        <br>
        <div class="container">
            <input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar">
        </div>
    </div>

</form>