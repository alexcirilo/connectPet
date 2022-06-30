<?php



function verifica_login()
{
    if ((!isset($_SESSION['login'])) && (!isset($_SESSION['id']))) {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Necessário Logar para acessar a página! </div>";
        header("Location: /?pagina=login");
    }
}

function verifica_usuario()
{
    require __DIR__ . '/../connection/conexao.php';

    $sql = "select perfil from usuarios where login = '{$_SESSION['login']}'";

    $consulta = $connection->query($sql);
    $row = $consulta->fetch_assoc();

    if ($row['perfil'] == 1) {
        echo "
        <div class='row'>

            <div class='col-md-6'>
                <div class='row'>
                    <div class='container-fluid' style='text-align: center;'>
                        <legend>Cadastros</legend>
                    </div>
                    <div class='col-6'>
                        <a href='?pagina=cad_tutor'> <input class='img-thumbnail' type='image' src='imagens/tutor.png' width='120' height='120' name='cadastro_tutor' alt='Cadastro Tutor' title='Cadastro Tutor'>
                            <figcaption>Cadastro Tutor</figcaption>
                        </a>

                    </div>
                    <div class='col-6'>
                        <a href='?pagina=cad_pet'> <input type='image' class='img-thumbnail' width='120' height='120' src='imagens/registrationPet.png' name='cadastro_pet' title='Cadastro Pet'>
                            <figcaption>Cadastro Pet</figcaption>
                        </a>

                    </div>
                </div>
                <!--<a href='pdf.php' target='_blank'>Imprimir</a>-->
            </div>
            <div class='col-md-6'>
                <div class='row'>
                    <div class='container-fluid' style='text-align: center;'>
                        <legend>Ações</legend>
                    </div>
                    <div class='col-6'>
                        <a href='?pagina=vacinar'><input class='img-thumbnail' type='image' src='imagens/dog.png' width='120' height='120' name='vacinar' alt='Vacinar' title='Vacinar'>
                            <figcaption>Vacinar</figcaption>
                        </a>
                    </div>
                    <div class='col-6'>
                        <a href='?pagina=cad_usuario_logado'><input class='img-thumbnail' type='image' src='imagens/user.png' width='120' height='120' name='vacinar' alt='Vacinar' title='Vacinar'>
                            <figcaption>Cadastro Usuário</figcaption>
                        </a>
                    </div>

                </div>
            </div>
        </div>";
    } else if ($row['perfil'] == 2) {
        echo "
        <div class='row'>

            <div class='col-md-6'>
                <div class='row'>
                    <div class='container-fluid' style='text-align: center;'>
                        <legend>Cadastros</legend>
                    </div>
                    <div class='col-6'>
                        <a href='?pagina=cad_tutor'> <input class='img-thumbnail' type='image' src='imagens/tutor.png' width='120' height='120' name='cadastro_tutor' alt='Cadastro Tutor' title='Cadastro Tutor'>
                            <figcaption>Cadastro Tutor</figcaption>
                        </a>

                    </div>
                    <div class='col-6'>
                        <a href='?pagina=cad_pet'> <input type='image' class='img-thumbnail' width='120' height='120' src='imagens/registrationPet.png' name='cadastro_pet' title='Cadastro Pet'>
                            <figcaption>Cadastro Pet</figcaption>
                        </a>

                    </div>
                </div>
                <!--<a href='pdf.php' target='_blank'>Imprimir</a>-->
            </div>
            <div class='col-md-6'>
                    <div class='container-fluid' style='text-align: center;'>
                        <legend>Ações</legend>
                    </div>
                    <div class='col-12'>
                        <a href='?pagina=vacinar'><input class='img-thumbnail' type='image' src='imagens/dog.png' width='120' height='120' name='vacinar' alt='Vacinar' title='Vacinar'>
                            <figcaption>Vacinar</figcaption>
                        </a>
                    </div>
            </div>
        </div>";
    } else if($row['perfil'] == 3 ){
        echo "";
    }
}
