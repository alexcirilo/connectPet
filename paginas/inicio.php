<?php
include_once __DIR__ . "/../header.php";
include __DIR__ . "/../functions/verifica_login.php";

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

verifica_login();

?>
<div class="container-fluid text-md-center" id="home">
    <h2>Olá <?= $_SESSION['login'] ?>, Bem vindo ao ConnectPet</h2>
    <hr>

    <section class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="row">
                    <div class="container-fluid" style="text-align: center;">
                        <legend>Cadastros</legend>
                    </div>
                    <div class="col-6">
                        <a href="?pagina=cad_tutor"> <input class="img-thumbnail" type="image" src="imagens/tutor.png" width="120" height="120" name="cadastro_tutor" alt="Cadastro Tutor" title="Cadastro Tutor">
                            <figcaption>Cadastro Tutor</figcaption>
                        </a>

                    </div>
                    <div class="col-6">
                        <a href="?pagina=cad_pet"> <input type="image" class="img-thumbnail" width="120" height="120" src="imagens/registrationPet.png" name="cadastro_pet" title="Cadastro Pet">
                            <figcaption>Cadastro Pet</figcaption>
                        </a>

                    </div>
                </div>
                <!--<a href="pdf.php" target="_blank">Imprimir</a>-->
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="container-fluid" style="text-align: center;">
                        <legend>Ações</legend>
                    </div>
                    <div class="col-6">
                        <a href="?pagina=vacinar"><input class="img-thumbnail" type="image" src="imagens/dog.png" width="120" height="120" name="vacinar" alt="Vacinar" title="Vacinar">
                            <figcaption>Vacinar</figcaption>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="?pagina=cad_usuario_logado"><input class="img-thumbnail" type="image" src="imagens/user.png" width="120" height="120" name="vacinar" alt="Vacinar" title="Vacinar">
                            <figcaption>Cadastro Usuário</figcaption>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <a href="?pagina=tutor_pet">Relatorio Tutor PET</a>
    </section>

</div>