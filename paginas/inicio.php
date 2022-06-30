<?php
include_once __DIR__ . "/../header.php";
include __DIR__ . "/../functions/verifica_login.php";

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}


?>
<div class="container-fluid text-md-center" id="home">
    <h2>Olá <?= $_SESSION['login'] ?>, Bem vindo ao ConnectPet</h2>
    <hr>

    <section class="container">
        <?php verifica_usuario();?>
        
    </section>

</div>