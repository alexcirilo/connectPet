<?php
require __DIR__ . "/../../connection/conexao.php";

$sql = "select codigo, descricao, laboratorio, quantidade, validade from vacina v ";


$consulta = $connection->query($sql);

$html ="<table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Laboratório</th>
                <th>Quantidade</th>
                <th>Validade</th>
            </tr>
        </thead>
        <tbody>";
        while ($row = $consulta->fetch_assoc()) {
        $html.="<tr>
                <td>{$row['codigo']}</td>
                <td>{$row['descricao']}</td>
                <td>{$row['laboratorio']}</td>
                <td>{$row['quantidade']}</td>";
        $html.="<td>" . date('d/m/Y', strtotime($row['validade'])) . "</td>
            </tr>";
}
$html.="</tbody>
        </table>";



require __DIR__ . "/../../vendor/autoload.php";

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
