<?php
session_start();
ob_start();
unset($_SESSION['login']);
header("Location: ?pagina=login");
$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Deslogado com Sucesso! </div>";