<?php
require __DIR__ . "/../../connection/conexao.php";
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>
<h1>Cadastro de Pet</h1>


<form action="controller/cad_pet.php" method="post" id="cad_pet" enctype="multipart/form-data">
    <div class="tutor_pet">
        <div class="container">
            <div class="form-group">
                <label>CPF:</label>
                <input class="form-control" autofocus type="text" name="cpf" id="cpf" required>
            </div>
            <div>
                <label>Tutor:</label>
                <input type="text" class="form-control" name="tutor" id="tutor">
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
                <input class="form-control col-md-12" type="text" name="nome_pet" required>

                <div class="form-row align-itens-center">
                    <div class="col-auto-my-1">
                        <label>Espécie:</label>
                        <select class="custom-select mr-sm-2" name="especie" required>
                            <option value="">Selecione</option>
                            <option value="cao">Cão</option>
                            <option value="gato">Gato</option>
                        </select>
                    </div>
                    <div class="col-auto-my-1">
                        <label>Sexo:</label>
                        <select class="custom-select mr-sm-1" name="sexo" required>
                            <option value="">Selecione</option>
                            <option value="M">Macho</option>
                            <option value="F">Fêmea</option>
                        </select>
                    </div>
                </div>
                <div class="form-row align-itens-center">
                    <div class="col-auto-my-2">
                        <label>Raça:</label>
                        <select class="custom-select mr-sm-2" name="raca" required>
                            <option value="">Selecione</option>
                            <option value="raca">Raça</option>
                            <option value="vira_lata">Vira Lata</option>
                        </select>
                    </div>
                    <div class="col-auto-my-1">
                        <label>Castrado:</label>
                        <select class="custom-select mr-sm-1" name="castrado" required>
                            <option value="">Selecione</option>
                            <option value="s">Sim</option>
                            <option value="n">Não</option>
                        </select>
                    </div>
                </div>
                <label>Data de Nascimento: </label>
                <input class="form-control col" type="date" name="data_nascimento" required>
                <br>

            </div>
            <div class="container col-md-4">
                <div>
                    <label>Pelagem:</label>
                    <input type="text" class="form-control" name="pelagem" id="pelagem" required>
                </div>
                <div class="col-auto-my-1">
                    <label>MicroChip:</label>
                    <select class="custom-select mr-sm-1" name="microchip">
                        <option value="">Selecione</option>
                        <option value="s">Sim</option>
                        <option value="n">Não</option>
                    </select>
                </div>
                <div>
                    <label>Local Implantação:</label>
                    <input type="text" class="form-control" name="local_implantacao" id="local_implantacao">
                </div>
            </div>
            <div class="container col-md-4">
                <label>
                    Foto:
                    <input class="form-control " type="file" name="arquivo" id="arquivo" onchange="previewImagem()">
                </label>
                <hr />
                <img id="img" style="width: 150px; height: 150px;">
            </div>
        </div>
        <hr />
        <div class="container">
            <input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar">
        </div>
    </div>

</form>