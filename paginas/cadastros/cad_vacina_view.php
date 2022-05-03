<?php
include __DIR__ . "/../../functions/verifica_login.php";

verifica_login();
?>
<h2>Cadastro vacina</h2>
<form action="controller/cad_vacina.php" method="post" id="cad_vacina">
    <div class="container" style="border: 1px solid">
        <div class="form-group">
            
        </div>
        <div class="form-group">
            <div>
                <label>
                    código
                    <input type="text" autofocus name="codigo" class="form-control" placeholder="Ex: FB7252" required>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>
                Descrição:
                <input name="descricao" type="text" id="descricao" value="" size="60" required class="form-control" />
        </div>
        <div class="form-group">
            <label>
                Laboratório:
                <input name="laboratorio" type="text" id="laboratorio" size="60" class="form-control" required />
            </label>
            <label>
                Quantidade:
                <input type="text" name="quantidade" class="form-control col-md-4" required>
            </label>
        </div>
         <div class="form-group">
            <label>
                Dt.Validade:
                <input name="validade" type="date" id="validade" size="60" class="form-control" required />
            </label>
            <label>
                Lote:
                <input type="text" name="lote" class="form-control col-md-4" required>
            </label>
        </div>

        <div style="margin: 20px auto; width: 100px">
           <input type="submit" class="btn btn-success" value="Cadastrar" name="cadastrar">
        </div>
    </div>
   

</form>