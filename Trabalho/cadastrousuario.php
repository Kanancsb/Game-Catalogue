<?php

    include ("dbconection.php");

    if(!isset($_SESSION)){
        session_start();
    }

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //Verifica se tem algum nome repetido no banco
        $query_user = "SELECT * FROM users WHERE username = '$username'";
        $result = $mysqli -> query($query_user);

        if(!empty($username) && !empty($password)){
            if($result -> num_rows > 0){
                echo "Este usuario já existe! Tente outro.<br>";
            }else{ // Se não houver um usuario repetido, cadastra o usuario e senha
                $Insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
                $mysqli -> query($Insert_query) or die("Falha na inserção do usuario: " . $mysqli -> error);

                echo "Usuario adicionado com sucesso! <br>";
            }
        }else{
            echo "Por favor, preencha todos os campos!<br>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuarios</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <form action="cadastrousuario.php" method="post">
        <br>
        <label for="">Nome do Usuario</label>
        <input type="text" name ="username"><br><br>
        <label for="">Senha</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Cadastrar">
    </form>

    <p>
        <a href="home.php">Voltar</a>
    </p>
</body>
</html>