<h2>Cadastro de Tutor</h2>
<form action="/connectpet/controller/cad_tutor.php" method="post" id="cad_tutor">
    <div class="container" style="border: 1px solid">
        <div class="form-group">
            <label>
                Nome:
            </label>
            <input type="text"  name="nome" class="form-control col-md-8">
        </div>
        <div class="form-group">
            <div>
                <label>
                    CPF:
                    <input type="text"  name="cpf" class="form-control" placeholder="xxx.xxx.xxx-xx">
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
                <input type="text"  name="cep" class="form-control col-md">
            </label>
        </div>
        <div class="form-group">
            <label>
                Logradouro:
                <input type="text"  name="logradouro" class="form-control">
            </label>
            <label>
                Número:
                <input type="text"  name="numero" class="form-control col-md-4">
            </label>
        </div>
        <div class="form-group">
            <label>Complemento:</label>
            <input type="text" name="complemento" class="form-control col-md-10">
        </div>
        <div class="form-group">
            <label>Bairro:</label>
            <input type="text" name="bairro" class="form-control col-md-6">
        </div>
        <div class="form-group">
            <label>Cidade:</label>
            <input type="text" name="cidade" class="form-control col-md-5">
        </div>
        <div class="form-row align-itens-center">
            <div class="col-auto-my-1">
                <label>UF:</label>
                <select class="custom-select mr-sm-2" name="uf">
                    <option value="">Selecione</option>
                    <option value="1">PA</option>
                </select>
            </div>
        </div>
        <br>
        <div>
            <input type="submit" class="btn btn-success" value="Cadastrar" name="cadastrar">
        </div>

</form>