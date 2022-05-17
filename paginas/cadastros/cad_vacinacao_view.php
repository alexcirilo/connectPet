
<style type="text/css">
    .campo{
        background-color: #212F3D;
        padding: 5px 5px;
        margin-left: 5px;
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
       margin: 20px 5px 0px 5px;

       
    }

    #container1 h1{
        text-shadow: 5px 5px 5px black;
       
    }

    .container1{
        padding: 20px;
        display: inline-flex;
        border: 1px solid; border-radius: 5px;
    }


   \* { border: 1px solid red;}*/
</style>

<div class="container1">
    <form >
        <div >
            <h1 class="cabecalho">Registro de Vacinação</h1>
            <label for="registro" class="rotulo">Registro:</label> 
                <input type="text" class="form-control" id="registro" autofocus required="" style=" width: 300px;display: inline-block;"></input>

            <label for="tutor" class="rotulo">Tutor:</label> 
                <input type="text" class="form-control" id="tutor" style=" width: 300px;display: inline-block;"></input>

            <label for="dt_vacinacao" class="rotulo">Data vacinação:</label> 
                <input type="text" class="form-control" id="dt_vacinacao" style=" width: 300px;display: inline-block;"></input>

            <label for="vacinador" class="rotulo">Vacinador:</label> 
                <input type="text" class="form-control" id="vacinador" style=" width: 300px;display: inline-block;"></input>
            <hr>      

            <label for="nome" class="rotulo">Nome:</label> 
                <span id="nome" class="campo">...</span>

            <label for="tutor" class="rotulo">Logradouro:</label> 
                <span id="logradouro" class="campo">...</span>

            <label for="numero" class="rotulo">Número:</label> 
                <span id="numero" class="campo">...</span> 

            <br>

            <label for="complemento" class="rotulo">Comp. :</label> 
                <span id="comp" class="campo">...</span>

            <label for="_cep" class="rotulo">Cep :</label> 
                <span id="_cep" class="campo">...</span>

            <label for="bairro" class="rotulo">Bairro:</label> 
                <span id="bairro" class="campo">...</span>
                
            <label for="uf" class="rotulo">UF:</label> 
                <span id="uf" class="campo">...</span>
            
            <hr>

            <label for="celular" class="rotulo">Celular:</label> 
                <span id="celular" class="campo">...</span>

                <label for="email" class="rotulo">Email:</label> 
                <span id="Email" class="campo">...</span>
        </div>
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
            <button type="submit" class="btn btn-primary">Eviar Certificado</button></button> 
        </div>
    </form>
</div>
