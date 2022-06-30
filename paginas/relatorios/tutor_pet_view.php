<?php
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>
<h2>Relatório Tutor Pet</h2>
<form action="controller/relatorios/tutor_pet.php" method="post" id="tutor_pet">
    <div class="form-group">
        <label> Tutor:
            <input class="form-control" type="text" name="cpf" id="cpf"  placeholder="Inserir o CPF do tutor">
        </label>
        <label>Nome:
            <input type="text" class="form-control" name="tutor" disabled id="tutor">
        </label>
    </div>
    <hr>
    <legend style="text-align: center;">Buscar todos os pets pelo Tutor</legend>
    <table id="tabela" class="table table-hover"></table>
</form>
