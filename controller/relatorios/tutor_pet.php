<?php
require __DIR__ . "/../../connection/conexao.php";


if ($_POST['relatorio']) {
    $tutor = filter_input(INPUT_POST, 'tutor', FILTER_SANITIZE_STRING);

    $sql = "select p.id_pet, p.nome_pet, p.raca, p.data_nascimento from pet p inner join tutor t on 
    p.id_pet = t.id_tutor 
    where t.nome = '{$tutor}'";

    $consulta = $connection->query($sql);
    
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
                    </tr>
                </tbody>

                </table>";
    }
}


// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require __DIR__. "/../../vendor/autoload.php";

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
