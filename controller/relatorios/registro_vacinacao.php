<?php
require __DIR__ . "/../../connection/conexao.php";


if ($_POST['relatorio']) {
    $tutor = filter_input(INPUT_POST, 'cpf_tutor', FILTER_SANITIZE_STRING);
    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

    $sql = "select t.nome as 'tutor', e.logradouro, e.numero as 'numero endereco', u.nome as 'vacinador',
    p.nome_pet, p.especie, p.sexo, p.raca, p.microchip, 
    v.descricao, v.laboratorio, v.lote, va.data_vacina
    from tutor t 
    inner join endereco e on
    t.id_tutor = e.tutor_id 
    inner join pet p on 
    p.id_tutor = t.id_tutor
    inner join vacinacao va on 
    va.id_pet = p.id_pet
    inner join vacina v on
    v.id_vacina = va.id_vacina 
    inner join usuarios u on
    va.id_usuario = u.id_usuario 
    where t.cpf = '{$tutor}' and p.nome_pet = {$dados['Nome do Pet']}";

    $consulta = $connection->query($sql);
    $row = $consulta->fetch_assoc();


    $diretorio = '../../imagens/tutor.jpg';
    if ($row['sexo'] == "M") {
        $sexo = "Masculino";
    } else {
        $sexo = "Feminino";
    }

    if ($row['raca'] == 'raca') {
        $raca = "Raça";
    } else {
        $raca = 'Vira Lata';
    }

    $microchip  = ($row['microchip']) ? 'Sim' : 'Não';
    $data_vacina = date('d/m/Y', strtotime($row['data_vacina']));
    $especie = ($row['especie']) ? "Cão" : "Gato";


    $html = "
    <div style ='border:1px solid'>
        <div>
            <h2 style='text-align:center;'>ConnectPet - Sistema Gerenciador de Vacinação de Pets</h2>
            <h3 style='text-align: center;'>Certificado de Vacinação</h3>
        </div>
        <hr>
        
        <div style= 'text-align:center'>
        <h3 style='text-align: center;'>Informações do Proprietário</h3>
            <div style='text-align: center;  margin: 5px; padding: 10px;'>
                <span>Nome: {$row['tutor']}</span>
                <span style='padding-left:5em'>Endereço: {$row['logradouro']}, {$row['numero endereco']}</span>
            
            </div>
        </div>
        
        <h3 style='text-align: center;'>Informações do Animal</h3>
        <div style='text-align: center;  margin: 5px; padding: 10px;'>
                <span>Nome: {$row['nome_pet']}</span>
                <span style='padding-left:5em'>Raça: {$raca}</span>
                <br>
                <br>
                <span style='padding: 5px 5px 5px 5px'>Sexo: {$sexo}</span>
                <br>
                <br>
                <span>Espécie: {$especie}</span>
                <span style='padding-left:5em'>Microchip: {$microchip}</span><br>

        </div>
        <h3 style='text-align: center;'>Informações da Vacina</h3>

        <div style='text-align: center;  margin: 5px; padding: 10px;'>
                <span>Vacina: {$row['descricao']}</span>
                <span style='padding-left:5em'>Dt. Aplicação: {$data_vacina}</span>
                <br>
                <br>
                <span>Laboratório: {$row['laboratorio']}</span>
                <span style='padding-left:5em'>Lote: {$row['lote']}</span>
        </div>
        
        <h3 style='text-align: center;'>Identificação do Vacinador</h3>
        <div style='text-align: center;  margin: 5px; padding: 10px;'>
                <span>Vacinador: {$row['vacinador']}</span>
        </div>
    </div>
                ";
}
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require __DIR__ . "/../../vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('registro_vacinacao.pdf', array('Attachment' => false));
