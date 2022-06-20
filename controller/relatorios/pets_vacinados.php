<?php
require __DIR__ . "/../../controller/consultas/busca_pets_vacinados.php";
require __DIR__ . "/../../controller/consultas/busca_vacinacao.php";

$html ="
<h2 style= 'text-align: center;'>Total de Pets Vacinados</h2>
<hr>
<table border='1' width='100%'>
    <thead style='text-align: center;'>
        <tr>
            <th>Nome do Pet</th>
            <th>Vacina</th>
            <th>Data de Vacinação</th>
            <th>Código</th>
        </tr>
    </thead>
    <tbody>";
        while ($row = $consulta->fetch_assoc()) {
        $html.="
        <tr>
                <td>{$row['Nome do Pet']}</td>
                <td>{$row['Vacina']}</td>";
        $html.="<td>" . date('d/m/Y', strtotime($row['Data de Vacinação'])) . "</td>
        <td>{$row['Código']}</td>
        </tr>
        </tbody>";
        }
$html.="
        <thead>
            <tr>
                <th colspan='4'>Total: ";
                $linha = $con->fetch_assoc();
        $html.="{$linha['count(*)']}</th>
            </tr>
        </thead>
</table>";



require __DIR__ . "/../../vendor/autoload.php";

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(["enabl_remote" => true]);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
