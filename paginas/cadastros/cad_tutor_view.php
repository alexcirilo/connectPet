<?php
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>
<h2>Cadastro de Tutor</h2>
<form action="controller/cad_tutor.php" method="post" id="cad_tutor">
    <div class="tutor_pet bg-info ">
        <div class="form-group">
            <label>
                Nome:
            </label>
            <input type="text" autofocus name="nome" class="form-control col-md-8" required>
        </div>
        <div class="form-group">
            <div>
                <label>
                    CPF:
                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="xxx.xxx.xxx-xx" required>
                </label>
                <label>
                    E-mail:
                    <input type="email" name="email" id="email" class="form-control" required>
                </label>
                <label>
                    Telefone:
                    <input type="tel" name="telefone" id="telefone" class="form-control" required>
                </label>
            </div>
        </div>
        <hr />
        <div class="form-group">
            <label>
                CEP:
                <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" required class="form-control" onblur="pesquisacep(this.value);" /></label>
            </label>
        </div>
        <div class="form-group">
            <label>
                Logradouro:
                <input name="logradouro" type="text" id="rua" size="60" class="form-control" required />
            </label>
            <label>
                Número:
                <input type="text" name="numero" id="numero" class="form-control col-md-4" required>
            </label>
        </div>
        <div class="form-group">
            <label>Complemento:</label>
            <input type="text" name="complemento" id="complemento" class="form-control col-md-10">
        </div>
        <div class="form-group">
            <label>Bairro:</label>
            <input name="bairro" type="text" id="bairro" size="40" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Cidade:</label>
            <input name="cidade" type="text" id="cidade" size="40" class="form-control" required />
        </div>
        <label>UF:</label>
        <input name="uf" type="text" id="uf" class="form-control col-md-2" size="2" required />
        <br>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Cadastrar" name="cadastrar">
    </div>

</form>
