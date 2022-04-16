<?php

function verifica_login(){
    if ((!isset($_SESSION['login'])) && (!isset($_SESSION['id']))) {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Necessário Logar para acessar a página! </div>";
        header("Location: /?pagina=login");
    }
}