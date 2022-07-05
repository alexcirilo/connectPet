<?php
include __DIR__ . "/../../functions/verifica_login.php";
include __DIR__ . "/../../controller/busca_vacinador.php";

verifica_login();
?>

<form id="reg_vacinacao" method="POST" action="controller/relatorios/registro_vacinacao.php">
    <div class="bg-info">
        <div class="container">
            <h1 style="text-align: center;">Registro de Vacinação</h1>
            <div>
                <div class="form-group" style="text-align: center;">
                    <label>Tutor:
                        <input placeholder="consulta tutor pelo CPF" type="text" class="form-control" autofocus id="cpf_tutor" name="cpf_tutor" style="display: inline-block;">
                        <small>Consulta feita pelo CPF</small>
                    </label>
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
                    <input name="rua" type="text" id="rua" size="60" class="form-control" required />
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
    <table id="table_pet" class="table table-bordered table-hover"></table>
        

    <div class="d-flex justify-content-center" style="margin:20px 0px;">
        
    </div>
    <br>
    </div>
</form>