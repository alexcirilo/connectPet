<?php

function verifica_usuario_menu()
{
    require __DIR__ . '/../connection/conexao.php';

    if (isset($_SESSION['login'])) {

        $sql = "select id_funcao from usuarios where login = '{$_SESSION['login']}'";

        $consulta = $connection->query($sql);
        $row = $consulta->fetch_assoc();

        if ($row['id_funcao'] != 3) {
            echo "
        
    <div class='collapse navbar-collapse' id='navbarNavDropdown'>
    <ul class='navbar-nav mx-auto'>
        <li class='nav-item'><a class='navbar-brand' href='?pagina=home'>Home</a></li>

        <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Cadastro</a>
            <div class='dropdown-menu'>
                <a class='dropdown-item' href='?pagina=cad_tutor'>Tutor</a>
                <a class='dropdown-item' href='?pagina=cad_pet'>Pet</a>
                <a class='dropdown-item' href='?pagina=cad_vacina'>Vacina</a>
                <!--<a class='dropdown-item' href='?pagina=cad_vacinacao'>Vacinação</a> -->
                <a class='dropdown-item' href='?pagina=vacinar'>Vacinar</a>
            </div>
        </li>
        <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Consulta</a>
            <div class='dropdown-menu'>
                <a class='dropdown-item' href='?pagina=consulta_tutor'>Consulta Tutor</a>
                <a class='dropdown-item' href='?pagina=consulta_pet'>Consulta Pet</a>
                <a class='dropdown-item' href='?pagina=con_vacinacao'>Consulta Vacinação</a>
                <a class='dropdown-item' href='?pagina=consulta_vacina'>Consulta Vacina</a>
                <a class='dropdown-item' href='?pagina=consulta_usuarios'>Consulta Usuário</a>
            </div>
        </li>
        <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Relatórios</a>
            <div class='dropdown-menu'>
                <a class='dropdown-item' href='?pagina=tutor_pet'>Tutor x Pet</a>
                <a class='dropdown-item' href='?pagina=pets_vacinados'>Total Pets Vacinados</a>
            </div>
        </li>
    </ul>
    </div>
        ";
        } else {
            echo "";
        }
    }
}
