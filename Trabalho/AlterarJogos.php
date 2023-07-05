<?php
    include("dbconection.php");

    if(!isset($_SESSION)){
        session_start();
    }

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];
        $query = "SELECT * FROM games WHERE title LIKE '%$search%'";
        $result = $mysqli->query($query);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_game']) && isset($_POST['game_id'])) {
        $game_id = $_POST['game_id'];
        $new_title = $_POST['title'];
        $new_description = $_POST['description'];

        $update_query = "UPDATE games SET title = '$new_title', description = '$new_description' WHERE game_ID = $game_id";
        $mysqli->query($update_query) or die("Falha na atualização do jogo: " . $mysqli->error);

        header("Location: AlterarJogos.php");
        exit;
    }else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_game']) && isset($_POST['game_id'])) {
        $game_id = $_POST['game_id'];

        $delete_query = "DELETE FROM games WHERE game_ID = $game_id";
        $mysqli->query($delete_query) or die("Falha na exclusão do jogo: " . $mysqli->error);

        header("Location: AlterarJogos.php");
        exit;
    }else{
        echo "Jogo não encontrado!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Nome e Descrição</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="AlterarJogos.php" method="post">
        <label for="search">Pesquisar jogo:</label>
        <input type="text" name="search" id="search" value="Nome do Jogo" >
        <input type="submit" value="Pesquisar">
    </form>

    <p>
        <a href="home.php">Voltar</a>
    </p>

    <?php if(isset($result) && $result->num_rows > 0): ?>
        <h2>Resultados da Pesquisa</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <form action="AlterarJogos.php" method="post">
                        <td><?php echo $row['game_ID']; ?>
                            <input type="hidden" name="game_id" value="<?php echo $row['game_ID']; ?>">
                        </td>
                        <td><input type="text" name="title" value="<?php echo $row['title']; ?>"></td>
                        <td><input type="text" name="description" value="<?php echo $row['description']; ?>"></td>
                        <td>
                            <button type="submit" name="update_game">Salvar</button><br><br>
                            <button type="submit" name="delete_game">Excluir Jogo</button>
                        </td>
                        
                    </form>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</body>
</html>
