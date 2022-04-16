<?php
session_start();
ob_start(); 

require __DIR__."/header.php";
require __DIR__."/connection/conexao.php";



if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 'login';
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

switch($pagina){
    case 'login':
        include __DIR__."/paginas/login.php";
        break;
    case 'cad_usuario':
        include __DIR__."/paginas/cadastros/cad_usuario_view.php";
        break;
    case 'cad_usuario_logado':
        include __DIR__."/paginas/cadastros/cad_usuario_view.php";
        break;
    case 'esqueci_senha':
        include __DIR__."/paginas/cadastros/esqueci_senha_view.php";
        break;
    case 'home':
        include __DIR__."/paginas/inicio.php";
        break;
    case 'cad_tutor':
        include __DIR__."/paginas/cadastros/cad_tutor_view.php";
        break;
    case 'cad_pet':
        include __DIR__."/paginas/cadastros/cad_pet_view.php";
        break;
    default:
        include __DIR__."/paginas/login.php";
        break;
}

require __DIR__."/footer.php";

?>

