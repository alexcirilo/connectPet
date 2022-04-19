<?php
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>
<h2>Cadastro de Tutor</h2>
<form action="controller/cad_tutor.php" method="post" id="cad_tutor">
    <div class="container" style="border: 1px solid">
        <div class="form-group">
            <label>
                Nome:
            </label>
            <input type="text" autofocus name="nome" class="form-control col-md-8">
        </div>
        <div class="form-group">
            <div>
                <label>
                    CPF:
                    <input type="text" name="cpf" class="form-control" placeholder="xxx.xxx.xxx-xx">
                </label>
                <label>
                    E-mail:
                    <input type="email" name="email" class="form-control">
                </label>
                <label>
                    Telefone:
                    <input type="tel" name="telefone" class="form-control">
                </label>
            </div>
        </div>
        <hr />
        <div class="form-group">
            <label>
                CEP:
                <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" class="form-control" onblur="pesquisacep(this.value);" /></label>
            </label>
        </div>
        <div class="form-group">
            <label>
                Logradouro:
                <input name="rua" type="text" id="rua" size="60" class="form-control" />
            </label>
            <label>
                Número:
                <input type="text" name="numero" class="form-control col-md-4">
            </label>
        </div>
        <div class="form-group">
            <label>Complemento:</label>
            <input type="text" name="complemento" class="form-control col-md-10">
        </div>
        <div class="form-group">
            <label>Bairro:</label>
            <input name="bairro" type="text" id="bairro" size="40" class="form-control" />
        </div>
        <div class="form-group">
            <label>Cidade:</label>
            <input name="cidade" type="text" id="cidade" size="40" class="form-control" />
        </div>
        <label>UF:</label>
        <input name="uf" type="text" id="uf" class="form-control col-md-2" size="2" />
        <br>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Cadastrar" name="cadastrar">
    </div>

</form>