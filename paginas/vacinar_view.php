<?php
include __DIR__ . "/../functions/verifica_login.php";
require __DIR__ . "/../controller/consultas/busca_vacina.php";
$query = "select * from vacina";

$consultas = $connection->query($query);
verifica_login();

?>
<h2>Vacinar PET:</h2>
<form action="controller/vacinar.php" method="POST" id="vacinar" style="text-align: center;">
    <div class="bg-info" id="vacinar">
        <div class="form-group">
            <label> Busca Pet:
                <input class="form-control" type="text" name="nome_pet" id="nome_pet">
            </label>
            <label>Nome:
                <input type="text" class="form-control" name="pet" disabled id="pet">
            </label>
        </div>

        <div class="form-group">
            <label>Tipo:</label>
                <select class="form-control " name="vacina" id="vacina">
                    <?php while ($row = $consultas->fetch_assoc()) { ?>
                        <option value="<?= $row['id_vacina'] ?>"><?= $row['descricao'] ?></option>
                    <?php } ?>
                </select>
        </div>
        <div class="form-group">
            <label>Data da Vacina:</label>
                <input type="date" class="form-control" name="data_vacina" id="data_vacina">
        </div>
        <input type="submit" class="btn btn-secondary" value="Vacinar" name="vacinar">
        <a href="?pagina=home" class="btn btn-secondary">Voltar</a>
    </div>

</form>