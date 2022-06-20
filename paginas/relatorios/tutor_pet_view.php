<?php
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>
<h2>Relatório Tutor Pet</h2>
<form action="controller/relatorios/tutor_pet.php" method="post" id="tutor_pet">
    <div class="form-group">
        <legend>Buscar todos os pets pelo Tutor</legend>
        <label>Tutor:
            <input class="form-control" type="text" name="tutor" id="tutor">
        </label>
    </div>
    <table id="tabela" class="table table-hover"></table>
</form>