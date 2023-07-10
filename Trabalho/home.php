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
    <?php if(isset($_SESSION['username'])): // Fiz está parte no HTML, pois estou mais familiarizado a utilizar o <a> do HTML?>
        <p>
            <a href="cadastrousuario.php">Cadastrar Usuário</a>
        </p>
        <p>
            <a href="alterarsenha.php">Alterar Senha</a>
        </p>
        <p>
            <a href="addgame.php">Adicionar jogos</a>
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
