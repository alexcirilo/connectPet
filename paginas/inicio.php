<?php
include_once __DIR__ . "/../header.php";
include __DIR__ . "/../functions/verifica_login.php";

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

verifica_login();

?>
<h1>Olá <?= $_SESSION['login'] ?>, Bem vindo ao ConnectPet</h1>

<div class="container-fluid text-md-center" id="home">
    <section class="container">
        <div class="row">

            <div class="container col-md-6">
                <div class="container-fluid">
                    <span>Cadastros</span>
                </div>

                <a href="?pagina=cad_tutor"> <input class="img-thumbnail" type="image" src="imagens/cadPacientes.png" name="cadastro_paciente" alt="Cadastro Tutor"></a>
                <a href="?pagina=cad_pet"> <input type="image" class="img-thumbnail" width="60" height="60" src="imagens/cad_pet.ico" name="cadastro_medico"></a>
                <a href="pdf.php" target="_blank">Imprimir</a>
            </div>
        </div>
    </section>
</div>