<?php
include __DIR__ . "/../../functions/verifica_login.php";
include __DIR__ . "/../../connection/conexao.php";

verifica_login();

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$query = "select p.*, t.cpf,t.nome as tutor, fp.diretorio, fp.nome_imagem from pet p inner join
tutor t on p.id_tutor = t.id_tutor left join foto_pet fp ON
p.id_pet = fp.id_pet
where p.id_pet = $id";

$consulta = $connection->query($query);
$row = $consulta->fetch_assoc();

?>
<h1>Editar Pet: <?= $row['nome_pet'] ?></h1>

<form action="controller/edit/edit_pet.php" method="post" id="edit_pet" enctype="multipart/form-data">
    <div class="tutor_pet">
        <input class="form-control col-md-2" type="hidden" name="id_pet" value="<?= $row['id_pet'] ?>">
        <div class="container">
            <div class="form-group">
            	<input type="hidden" name="id_tutor" value="<?=$row['id_tutor']?>">
                <label>CPF:</label>
                <input class="form-control" autofocus type="text" name="cpf" id="cpf" value="<?= $row['cpf'] ?>" disabled>
            </div>
            <div>
                <label>Tutor:</label>
                <input type="text" class="form-control" name="tutor" id="tutor" value="<?= $row['tutor'] ?>" disabled>
            </div>
            <br />
            <legend>Não possui tutor?
                <a class="btn btn-primary" href="?pagina=cad_tutor">Novo Tutor</a>
            </legend>
        </div>

        <hr />
        <div class="row">
            <div class="container col-md-4">
                <label>
                    Nome:
                </label>
                <input class="form-control col-md-12" type="text" id="nome_pet" name="nome_pet" value="<?= $row['nome_pet'] ?>">

                <div class="form-row align-itens-center">
                    <div class="col-auto-my-1">
                        <label>Espécie:</label>
                        <select class="custom-select mr-sm-2" id="especie" name="especie">
                            <option value="<?= $row['especie'] ?>"><?php if ($row['especie'] == 'cao') {
                                                                        echo "Cão";
                                                                    }elseif($row['especie'] == 'gato'){
                                                                        echo "Gato";
                                                                    } ?></option>
                            <option value="cao">Cão</option>
                            <option value="gato">Gato</option>
                        </select>
                    </div>
                    <div class="col-auto-my-1">
                        <label>Sexo:</label>
                        <select class="custom-select mr-sm-1" id="sexo" name="sexo">
                            <option  value="<?= $row['sexo'] ?>"><?php if ($row['sexo'] == 'M') {
                                                                        echo "Macho";
                                                                    }elseif($row['sexo'] == 'F'){
                                                                        echo "Fêmea";
                                                                    } ?></option>
                            <option value="M">Macho</option>
                            <option value="F">Fêmea</option>
                        </select>
                    </div>
                </div>
                <div class="form-row align-itens-center">
                    <div class="col-auto-my-2">
                        <label>Raça:</label>
                        <select class="custom-select mr-sm-2" id="raca" name="raca">
                            <option  value="<?= $row['raca'] ?>"><?php if ($row['raca'] == 'raca') {
                                                                        echo "Raça";
                                                                    }elseif($row['raca'] == 'vira_lata'){
                                                                        echo "Vira Lata";
                                                                    } ?></option>
                            <option value="raca">Raça</option>
                            <option value="vira_lata">Vira Lata</option>
                        </select>
                    </div>
                    <div class="col-auto-my-1">
                        <label>Castrado:</label>
                        <select class="custom-select mr-sm-1" name="castrado">
                            <option  value="<?= $row['castrado'] ?>"><?php if ($row['castrado'] == 's') {
                                                                        echo "Sim";
                                                                    }elseif($row['castrado'] == 'n'){
                                                                        echo "Não";
                                                                    } ?></option>
                            <option value="s">Sim</option>
                            <option value="n">Não</option>
                        </select>
                    </div>
                </div>
                <label>Data de Nascimento: </label>
                <input class="form-control col" type="date" name="data_nascimento"value="<?= $row['data_nascimento'] ?>">
                <br>

            </div>
            <div class="container col-md-4">
                <div>
                    <label>Pelagem:</label>
                    <input type="text" class="form-control" name="pelagem" id="pelagem"value="<?= $row['pelagem'] ?>">
                </div>
                <div class="col-auto-my-1">
                    <label>MicroChip:</label>
                    <select class="custom-select mr-sm-1" onchange="oculta_campo(this)" name="microchip">
                        <option  value="<?= $row['microchip'] ?>"><?php if ($row['microchip'] == 's') {
                                                                        echo "Sim";
                                                                    }elseif($row['microchip'] == 'n'){
                                                                        echo "Não";
                                                                    } ?></option>
                        <option value="s">Sim</option>
                        <option value="n">Não</option>
                    </select>
                </div>
                <div>
                    <label id="local_implantacao">Local Implantação:
                        <input type="text" class="form-control" name="local_implantacao" value="<?= $row['local_implantacao'] ?>"></label>
                </div>
            </div>
            <div class="container col-md-4">
                <label>
                    Foto:
                    <input class="form-control " type="file" value="<?= $row['nome_imagem'] ?>" name="arquivo" id="arquivo" onchange="previewImagem()">
                </label>
                <hr />
                <img id="img" style="width: 150px; height: 150px;" src="imagens/pet/<?= $row['nome_imagem']?>">
            </div>
        </div>
        <hr />
        <div class="container">
            <input class="btn btn-success" type="submit" value="salvar" name="salvar">
            <a href="?pagina=consulta_pet" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>
