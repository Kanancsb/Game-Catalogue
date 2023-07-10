<?php

    include('dbconection.php');

    if(!isset($_SESSION)){
        session_start();
    }

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $oldPassword = $_POST["oldPassword"];
        $newPassword = $_POST["newPassword"];

        // Verifique se a senha atual corresponde à senha armazenada no banco de dados
        $username = $_SESSION['username'];
        $query = "SELECT password FROM users WHERE username = '$username'";
        $result = $mysqli->query($query);
        $row = mysqli_fetch_assoc($result);

        if ($result->num_rows > 0) {
            $storedPassword = $row["password"];

            // Verifique se a senha atual está correta
            if ($oldPassword == $storedPassword) {

                // Atualize a senha no banco de dados
                $updateQuery = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
                $mysqli->query($updateQuery);

                echo "Senha alterada com sucesso!";
            } else {
                echo "Senha atual incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
</head>
<body>
    <h2>Alterar Senha</h2>
    <form action="alterarsenha.php" method="POST">
        <label for="oldPassword">Senha Atual:</label>
        <input type="password" name="oldPassword" id="oldPassword" required><br><br>

        <label for="newPassword">Nova Senha:</label>
        <input type="password" name="newPassword" id="newPassword" required><br><br>

        <input type="submit" value="Alterar Senha">
    </form>

    <p>
        <a href="home.php">Voltar</a>
    </p>
</body>
</html>