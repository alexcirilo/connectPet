<?php
require __DIR__ . "/../../connection/conexao.php";
include __DIR__."/../../functions/verifica_login.php";

verifica_login();
?>
<h1>Cadastro de Pet</h1>


<form action="/connectPet/controller/cad_pet.php" method="post" id="cad_pet">
    <div class="tutor_pet">
        <div class="form-group">
            <label>CPF:</label>
            <input class="form-control" autofocus type="text" name="cpf" id="cpf">
        </div>
        <div>
            <label>Tutor:</label>
            <label id="tutor"> </label>
        </div>
        <br />
        <a class="btn btn-primary" href="?pagina=cad_tutor">Novo Tutor</a>
    </div>
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
                    <option value="cao">Cão</option>
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
                    <option value="raca">Raça</option>
                    <option value="vira_lata">Vira Lata</option>
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