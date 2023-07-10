    <form action="games.php" method="post">
        <label for="search">Pesquisar jogo:</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="Pesquisar">
    </form>

<?php
    include('dbconection.php');

    if(!isset($_SESSION)){
        session_start();
    }

    $query = "SELECT * FROM games";
    $result = $mysqli->query($query);

    // Pesquisa de jogos por título
    if(isset($_POST['search'])){
        $search = $_POST['search'];
        $query = "SELECT * FROM games WHERE Title LIKE '%$search%'";
        $result = $mysqli->query($query);
    }


    // Se tiver jogos cadastrado no banco, chama eles em ordem
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
