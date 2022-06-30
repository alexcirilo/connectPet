<?php
require __DIR__ . "/../../connection/conexao.php";


if ($_POST['relatorio']) {
    $tutor = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

    $sql = "select p.id_pet, p.nome_pet, p.raca, p.data_nascimento from pet p inner join tutor t on 
    p.id_tutor = t.id_tutor 
    where t.cpf = '{$tutor}'";

    $consulta = $connection->query($sql);
    $diretorio = '../../imagens/tutor.jpg';
    
        $html = "
            <h2 style= 'text-align: center;'>Relatório de Pets por Tutor</h2>
                <table border='1' width='100%'>
                    <thead style='text-align: center;'>
                        <tr>
                            <th>PET</th>
                            <th>Raça</th>
                            <th>Data Nascimento</th>
                        </tr>
                    </thead>
                <tbody style='text-align: center;'>";
                    while ($row = $consulta->fetch_assoc()) {
            $html.="<tr>
                        <td>{$row['nome_pet']}</td>
                        <td>{$row['raca']}</td>";
            $html .= "<td>" . date('d/m/Y', strtotime($row['data_nascimento'])) . "</td>
                    </tr>";
                }
                $html .="</tbody>

                </table>";
}


// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require __DIR__. "/../../vendor/autoload.php";

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
$dompdf->stream('tutor_pet.pdf',array('Attachment' =>false));

