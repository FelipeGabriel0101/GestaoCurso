<?php

require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Usuário: </label>
        <input type="text" name="username" required><br>

        <label for="password">Senha: </label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Criar Conta">
    </form>
    <?php
    if (!empty($_POST)){
        $username = $_POST["username"];
        $password = $_POST["password"];

        try{
            $stmt  = $pdo->prepare("INSERT INTO admins(username, password) VALUES (:USERNAME, :PASSWORD)");

            $stmt->bindValue(":USERNAME", $username);
            $stmt->bindValue(":PASSWORD", $password);

            $stmt->execute();

            echo "<br>Conta criada com sucesso!";
            header("Location:login.php");

        } catch(PDOException $e){
           echo $e->getMessage();
        }

        
    }
    
    ?>
</body>
</html>