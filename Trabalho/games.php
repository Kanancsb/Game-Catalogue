<?php
include('dbconection.php');

if(!isset($_SESSION)){
    session_start();
}

$query = "SELECT * FROM games";
$result = $mysqli->query($query);

// tive que deixar desta forma para formatar a página, outro modo seria colocando está parte do código no próprio HTML
if ($result->num_rows > 0) {
    echo "<h2>Lista de Jogos</h2>";

    echo "<table>";
    echo "<tr><th>Título</th><th>Descrição</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $title = $row['Title'];
        $description = $row['Description'];

        echo "<tr>";
        echo "<td class='box'>$title</td>";
        echo "<td class='box'>$description</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nenhum jogo encontrado no banco de dados.</p>";
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Jogos</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <p>
        <a href="home.php">Voltar</a>
    </p>

</body>
</html>
