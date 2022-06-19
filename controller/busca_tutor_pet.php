<?php
require __DIR__ . "/../connection/conexao.php";

$tutor = $_POST['busca'];

$sql = "select p.id_pet, p.nome_pet, p.raca, p.data_nascimento from pet p inner join tutor t on 
    p.id_pet = t.id_tutor 
    where t.nome = '{$tutor}'";

$consulta = $connection->query($sql);
while ($row = $consulta->fetch_assoc()) {  
    echo $html = "
        <div class ='container'>
            <table class='table table-border' id='tutorPet'>
                <thead class='table-dark'>
                    <tr>
                        <th>PET</th>
                        <th>Raça</th>
                        <th>Data Nascimento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>{$row['nome_pet']}</td>
                    <td>{$row['raca']}</td>";
    echo "<td>" . date('d/m/Y', strtotime($row['data_nascimento'])) . "</td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class='container' style='text-align: center;'>
            <input class='btn btn-secondary' type='submit' value='Gerar Relatório' name='relatorio'>
        </div>" ; ?>
<?php }

?>