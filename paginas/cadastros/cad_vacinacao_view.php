<?php
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>
<style type="text/css">
    .campo {
        background-color: #212F3D;
        padding: 5px 5px;
        margin-left: 5px;
        display: inline-flex;
        width: 300px;
        border-radius: 5px;
        box-shadow: 3px 3px 3px black;
        flex-wrap: nowrap;
    }

    .cabecalho {
        font-size: 1.5em;
        text-align: center;
    }

    .rotulo {
        width: 85px;
        margin: 20px 5px 0px 5px;


    }

    #container1 h1 {
        text-shadow: 5px 5px 5px black;

    }

    .container1 {
        padding: 20px;
        display: inline-flex;
        border: 1px solid;
        border-radius: 5px;
    }


    \* {
        border: 1px solid red;
    }

    */
</style>

<link rel="stylesheet" href="css/cad_vacinacao.css">
<form id="cad_vacinacao">
    <div class="container">
        <h1 class="cabecalho">Registro de Vacinação</h1>
        <div>
            <div class="col">
                <label>Registro:
                    <input type="text" class="form-control" id="registro" autofocus required>
                </label>
                <label>Tutor:
                    <input type="text" class="form-control" id="tutor" style="display: inline-block;">
                </label>
                <label>Vacinador:
                    <input type="text" class="form-control" id="vacinador" style="display: inline-block;"></label>
                <label>Data vacinação:
                    <input type="text" class="form-control" id="dt_vacinacao" style=" display: inline-block;"></label>
            </div>
        </div>
        <hr>
        <div class="col">
            <label for="nome">Nome:</label>
            <input id="nome" disabled class="form-control" value="...">
        </div>
        <br>
        <div class="col">
            <label for="tutor" class="rotulo">Logradouro:</label>
            <input type="text" id="logradouro" class="form-control" value="..." disabled>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="complemento" class="rotulo">Comp. :</label>
                <input type="text" id="comp" class="form-control col-md-10" value="..." disabled>
            </div>
            <div class="col-6">
                <label for="numero" class="rotulo">Número:</label>
                <input type="text" id="numero" class="form-control col-md-2" disabled value="...">
            </div>
        </div>
        <br>

    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="_cep" class="rotulo">Cep :</label>
            <span id="_cep" class="campo">...</span>
        </div>
        <div class="col-4">
            <label for="bairro" class="rotulo">Bairro:</label>
            <span id="bairro" class="campo">...</span>
        </div>
        <div class="col-4">
            <label for="uf" class="rotulo">UF:</label>
            <span id="uf" class="campo">...</span>
        </div>
    </div>
    <hr>

    <div>
        <label for="celular" class="rotulo">Celular:</label>
        <span id="celular" class="campo">...</span>

        <label for="email" class="rotulo">Email:</label>
        <span id="Email" class="campo">...</span>
    </div>
    <br>
    <br>
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
        <button type="submit" class="btn btn-primary">Enviar Certificado</button></button>
    </div>
</form>