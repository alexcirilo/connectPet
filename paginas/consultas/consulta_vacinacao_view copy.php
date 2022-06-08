<?php
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>

<form id="con_vacinacao" action="controller/consulta_vacinacao.php">
    <div class="container consulta_vacinacao" style="border: 1px solid">
        <h1 style="text-align: center;">Consulta Vacinação</h1>
        <hr>
        <div class="form-group">
            <label>Registro:
                <input type="text" class="form-control" id="registro" autofocus required disabled>
            </label>
            <label>Tutor:
                <input type="text" class="form-control" id="tutor" style="display: inline-block;">
            </label>
        </div>
        <div class="form-group">
            <label>Data vacinação:
                <input type="date" class="form-control" id="dt_vacinacao" style=" display: inline-block;"></label>
            <label>Vacinador:
                <input type="text" class="form-control" id="vacinador" style="display: inline-block;"></label>
        </div>
        <hr>
        <div class="form-group">
            <label>
                Nome:
            </label>
            <input type="text" autofocus name="nome" class="form-control col-md-8" required>
        </div>
        <div class="form-group">
            <label>
                CEP:
                <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" required class="form-control" onblur="pesquisacep(this.value);" /></label>
            </label>
        </div>
        <div class="form-group">
            <label>
                Logradouro:
                <input name="logradouro" type="text" id="rua" size="100" class="form-control" required />
            </label>
            <label>
                Número:
                <input type="text" name="numero" id="numero" class="form-control col-md-4" required>
            </label>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Bairro:</label>
                <input name="bairro" type="text" id="bairro" class="form-control" required />

            </div>
            <div class="form-group col-md-4">
                <label>Cidade:</label>
                <input name="cidade" type="text" id="cidade" class="form-control" required />
            </div>
            <div class="form-group col-md-4">
                <label>UF: </label>
                <input name="uf" type="text" id="uf" class="form-control" required />
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="form-group col-md-6">
                <label>
                    Celular:</label>
                    <input name="telefone" type="text" id="telefone" size="30" class="form-control" required />
                
            </div>
            <div class="form-group col-md-6">
                <label>
                    E-mail:</label>
                    <input type="email" name="email" id="numero" size="60" class="form-control" required>
                
            </div>
        </div>
    </div>
    <br>
    <br>
    <h2 style="text-align: center;">Pets Relacionados</h2>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Id. pet</th>
                <th scope="col">Nome</th>
                <th scope="col">Raça</th>
                <th scope="col">Cod.Vacina</th>
                <th scope="col">descrição</th>
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
            <tr>
                <th scope="row">2</th>
                <td>thor</td>
                <td>Poodle</td>
                <td>rv-234570</td>
                <td>...</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Buldogue</td>
                <td>Buldogue</td>
                <td>rv-23456</td>
                <td>...</td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-center" style="margin:20px 0px;">
        <input type="submit" class="btn btn-primary" value="Enviar Certificado">
    </div>
</form>