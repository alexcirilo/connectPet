<?php
include __DIR__ . "/../../functions/verifica_login.php";
include __DIR__ . "/../../controller/busca_vacinador.php";

verifica_login();
?>




</style>

<link rel="stylesheet" href="css/cad_vacinacao.css">

<form id="cad_vacinacao">
    <div class="bg-info">
        <div class="container">
            <h1 style="text-align: center;">Registro de Vacinação</h1>
            <div>
                <div class="form-group" style="text-align: center;">
                    <label>Registro:
                        <input type="number" class="form-control" id="registro" autofocus disabled>
                    </label>
                    <label>Tutor:
                        <input type="text" class="form-control" id="cpf" name="cpf" style="display: inline-block;">
                    </label>
                    <label>Data vacinação:
                        <input type="date" class="form-control" id="dt_vacinacao" style=" display: inline-block;"></label>
                    <div class="col-auto-my-1" style="text-align: center;">
                        <label>Vacinador:
                            <select class="custom-select mr-sm-2" id="vacinador" name="vacinador">
                                <option value="">Selecione</option>
                                <?php while ($row = $consulta->fetch_assoc()) { ?>
                                    <option value="<?= $row['id_usuario'] ?>"><?= $row['nome'] ?></option>
                                <?php } ?>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label>
                    Nome:
                </label>
                <input type="text" autofocus disabled name="tutor" id="tutor" class="form-control col-md-8">
            </div>
            <div class="form-group">
                <label>
                    CEP:
                    <input name="cep" type="text" id="cep" size="10" maxlength="9" required class="form-control" onblur="pesquisacep(this.value);" /></label>
                </label>
            </div>
            <div class="form-group">
                <label>
                    Logradouro:
                    <input name="logradouro" type="text" id="rua" size="60" class="form-control" required />
                </label>
                <label>
                    Número:
                    <input type="text" name="numero" id="numero" class="form-control" required>
                </label>
            </div>
            <div class="form-group">
                <label>Complemento:</label>
                <input type="text" name="complemento" id="complemento" class="form-control">
            </div>
            <div class="form-group">
                <label>Bairro:
                    <input name="bairro" type="text" id="bairro" size="40" class="form-control" required />
                </label>
                <label>Cidade:
                    <input name="cidade" type="text" id="cidade" size="40" class="form-control" required />
                </label>
                <label>UF:
                    <input name="uf" type="text" id="uf" class="form-control" size="4" required />
                </label>
            </div>
            <div class="form-group">
                <label>
                    E-mail:
                    <input type="email" name="email" id="email" class="form-control" required>
                </label>
                <label>
                    Telefone:
                    <input type="tel" name="telefone" id="telefone" class="form-control " required>
                </label>
            </div>
        </div>
        <br>
    </div>
    <hr>
    <h2>Pets</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id. pet</th>
                <th scope="col">Nome</th>
                <th scope="col">Raça</th>
                <th scope="col">Cod.Vacina</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>imperador</td>
                <td>Yorkshire</td>
                <td>pf-344937</td>
                <td>...</td>
            </tr>

        </tbody>
    </table>

    <div class="d-flex justify-content-center" style="margin:20px 0px;">
        <button type="submit" class="btn btn-primary">Enviar Certificado</button></button>
    </div>
    <br>
    </div>
</form>