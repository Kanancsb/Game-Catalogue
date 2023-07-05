<?php 
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php if(isset($_SESSION['username'])): ?>
        <p>
            <a href="cadastrousuario.php">Cadastrar Usuário</a>
        </p>
        <p>
            <a href="addgame.php">Adicionar mais jogos</a>
        </p>
        <p>
            <a href="AlterarJogos.php">Alterar Nome/Descrição</a>
        </p>
        <p>
            <a href="games.php">Biblioteca de Jogos</a>
        </p>
        <p>
            <a href="logout.php">Logout</a>
        </p>
    <?php else: ?>

    <p>
        <a href="index.php">Login</a>
    </p>
    <p>
        <a href="games.php">Biblioteca de Jogos</a>
    </p>

    <?php endif; ?>
</body>
</html>
