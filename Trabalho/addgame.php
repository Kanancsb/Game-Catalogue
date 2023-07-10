<?php

    include('dbconection.php');

    if(!isset($_SESSION)){
        session_start();
    }

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }


    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = ($_POST["title"]);
        $description = $_POST["description"];

        // Insere o jogo no banco de dados
        if(!empty($title) && !empty($description)) {
            $insert_query = "INSERT INTO games (title, description) VALUES ('$title', '$description')";
            $mysqli->query($insert_query) or die("Falha na inserção do jogo: " . $mysqli->error);

            echo "Jogo adicionado com sucesso!";
        }else{
            echo "Por favor, preencha todos os campos";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Jogos</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h2>Adicionar Jogos</h2>
    <form action="addgame.php" method="post">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="description">Descrição:</label>
        <textarea name="description" id="description" required></textarea><br><br>

        <input type="submit" value="Adicionar">
    </form>

    <p>
        <a href="home.php">Voltar</a>
    </p>

</body>
</html>
