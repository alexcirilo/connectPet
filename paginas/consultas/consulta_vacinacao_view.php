<?php
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();

?>

<style type="text/css">
    .campo{
        background-color: #212F3D;
        padding: 5px 5px;
        display: inline-flex;
        width: 300px;
        border-radius: 5px;
        box-shadow: 3px 3px 3px black;
        flex-wrap: nowrap;
    }
    .cabecalho{
        font-size: 1.5em; 
        text-align: center;
    }

    .rotulo{
       width: 85px;
       margin-top: 5px;
    }

    #container1 h1{
        text-shadow: 5px 5px 5px black;
    }

    .container1{
        padding: 20px;
        display: inline-flex;
        border: 1px solid; border-radius: 5px;
    }

    h2{
        margin: 20px;
    }


</style>

<h2>Certificado de vacinação</h2>
<form>
<div class="container1">
    <div >
        <h1 class="cabecalho"> Informações do proprietário</h1>
        <label for="nome_tutor" class="rotulo">Nome:</label> 
            <input type="text" class="form-control" id="nome_tutor" autofocus required="" style=" width: 300px;display: inline-block;"></input>
        <label for="Endereço" class="rotulo">Endereço:</label> 
            <span id="campo_endereco" class="campo">Rua sem fim</span>
    <hr>
        <h1 class="cabecalho"> Informações do animal</h1>
        <label for="nome_animal" class="rotulo">Nome:</label> 
            <span id="nome_animal" class="campo">simba</span>
        <label for="especie" class="rotulo">Espécie:</label> 
            <span id="especie" class="campo">cão</span> 
        <br>
        <label for="raça" class="rotulo">Raça:</label> 
            <span id="raça" class="campo">bulldog</span>
        <label for="sexo" class="rotulo">Sexo:</label> 
            <span id="sexo" class="campo">masculino</span>
        <br>
        <label for="Microchip" class="rotulo">Microchip:</label> 
            <span id="Microchip" class="campo">sim</span>
        <label for="cor_animal" class="rotulo">Cor:</label> 
            <span id="cor_animal" class="campo">Branco</span>
    <hr>
        <h1 class="cabecalho"> Informações da vacina</h1>
        <label for="vacina" class="rotulo">Vacina:</label> 
            <span id="vacina" class="campo">antirabica</span>
        <label for="Laboratorio" class="rotulo">Laboratório:</label> 
            <span id="Laboratorio" class="campo">Pfizer</span>
        <br>
        <label for="d_aplicacao" class="rotulo">D.Aplicação:</label> 
            <span id="d_aplicacao" class="campo">12/12/2012</span>
        <label for="lote" class="rotulo">Lote:</label> 
            <span id="lote" class="campo">FP12586</span>
    <hr>
        <h1 class="cabecalho"> Informações do vacinador</h1>
        <label for="nome_vacinador" class="rotulo">Nome:</label> 
            <span id="nome_vacinador" class="campo">fulano</span>
        <label for="matricula" class="rotulo">Matrícula:</label> 
            <span id="matricula" class="campo">69206-1</span>
    </div>


</div>

<div class="d-flex justify-content-center" style="margin:20px 0px;"> 
            <button onClick="window.print()" type="button" class="btn btn-secondary">imprimir Certificado</button></button> 
</div>
</form>
