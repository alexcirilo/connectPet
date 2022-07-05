<?php
include __DIR__ . "/../functions/verifica_login.php";
require __DIR__ . "/../controller/consultas/busca_vacina.php";
include __DIR__ . "/../controller/busca_vacinador.php";
$query = "select * from vacina";

$consultas = $connection->query($query);
verifica_login();

?>
<h2>Vacinar PET:</h2>
<form action="controller/vacinar.php" method="POST" id="vacinar" style="text-align: center;">
    <div class="bg-info" id="vacinar">
        <div class="form-group">
            
            <label> Busca Pet:
                <input class="form-control" type="text" name="nome_pet" id="nome_pet" placeholder="Buscar o pet pelo nome">
            </label>
            <label>Nome:
                <input type="text" class="form-control" name="pet" disabled id="pet">
            </label>
            <div class="col-auto-my-1" style="text-align: center;">
                <label>Vacinador:
                    <select class="custom-select mr-sm-2" id="vacinador" name="vacinador">
                        <option value="">Selecione</option>
                        <?php while ($linha = $consulta->fetch_assoc()) { ?>
                            <option value="<?= $linha['id_usuario'] ?>"><?= $linha['nome'] ?></option>
                        <?php } ?>
                    </select>
                </label>
            </div>
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