<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user=scalable=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagens/pet.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="js/javascript.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <title>ConnectPet</title>
</head>

<body>
    <header class="container-fluid header bg-dark">
        <?php
        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        } else {
            $pagina = 'login';
        }


        if (isset($_SESSION['login'])) {
            require __DIR__ . '/connection/conexao.php';

            $sql = "select id_funcao from usuarios where login = '{$_SESSION['login']}'";

            $consulta = $connection->query($sql);
            $row = $consulta->fetch_assoc();

            if ($pagina !== 'login' && $pagina !== 'esqueci_senha' && $pagina !== 'cad_usuario') {
        ?>
                <nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="nav-link mx-auto" href="?pagina=home"><img src="imagens/pet.ico" width="80px" height="80px"></a>
                    <div class="col-md-6">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item"><a class="navbar-brand" href="?pagina=home">Home</a></li>
                                <?php if ($row['id_funcao'] == 1) { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastro</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pagina=cad_tutor">Tutor</a>
                                            <a class="dropdown-item" href="?pagina=cad_pet">Pet</a>
                                            <a class="dropdown-item" href="?pagina=cad_vacina">Vacina</a>
                                            <!--<a class="dropdown-item" href="?pagina=cad_vacinacao">Vacinação</a> -->
                                            <a class="dropdown-item" href="?pagina=vacinar">Vacinar</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consulta</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pagina=consulta_tutor">Consulta Tutor</a>
                                            <a class="dropdown-item" href="?pagina=consulta_pet">Consulta Pet</a>
                                            <a class="dropdown-item" href="?pagina=con_vacinacao">Consulta Vacinação</a>
                                            <a class="dropdown-item" href="?pagina=consulta_vacina">Consulta Vacina</a>
                                            <a class="dropdown-item" href="?pagina=consulta_usuarios">Consulta Usuário</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relatórios</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pagina=tutor_pet">Tutor x Pet</a>
                                            <a class="dropdown-item" href="?pagina=pets_vacinados">Total Pets Vacinados</a>
                                        </div>
                                    </li>
                                <?php } else if ($row['id_funcao'] == 2) { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastro</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pagina=cad_tutor">Tutor</a>
                                            <a class="dropdown-item" href="?pagina=cad_pet">Pet</a>
                                            <a class="dropdown-item" href="?pagina=cad_vacina">Vacina</a>
                                            <!--<a class="dropdown-item" href="?pagina=cad_vacinacao">Vacinação</a> -->
                                            <a class="dropdown-item" href="?pagina=vacinar">Vacinar</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consulta</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pagina=consulta_tutor">Consulta Tutor</a>
                                            <a class="dropdown-item" href="?pagina=consulta_pet">Consulta Pet</a>
                                            <a class="dropdown-item" href="?pagina=con_vacinacao">Consulta Vacinação</a>
                                            <a class="dropdown-item" href="?pagina=consulta_vacina">Consulta Vacina</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relatórios</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pagina=tutor_pet">Tutor x Pet</a>
                                            <a class="dropdown-item" href="?pagina=pets_vacinados">Total Pets Vacinados</a>
                                        </div>
                                    </li>
                            <?php } else if($row['id_funcao'] == 3){
                                    echo "Usuario";
                            }
                            } ?>
                            </ul>
                        </div>
                    </div>
                    <p style="text-align: right; color: white;" id="p" style="color:white"> <?= $_SESSION['login'] ?> | <a href="controller/sair.php"> <img src="/imagens/sair.png" alt="Sair" title="Sair"></a></p>
                </nav>
            <?php

        }
            ?>
    </header>
    <br>