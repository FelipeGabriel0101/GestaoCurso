<?php

require_once "classes/Conexao.php";

$pdo = Conexao::conectar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Criar Conta</title>
</head>
<body class="login-body">
    <div class="login-box">
        <div class="login-header">
            <header>Registrar</header>
        </div>
        <form action="" method="post">

            <div class="input-box">
                <input type="text" class="input-field" placeholder="Usuário" name="username" required><br>
            </div>

            <div class="input-box">
                <input type="password" class="input-field" placeholder="Senha"name="password" required><br>
            </div>

            <div class="input-submit">
                <input type="submit" class="submit-btn">
                <label for="submit">Criar Conta</label>
            </div>
        </div>
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
            header("Location:index.php");

        } catch(PDOException $e){
           echo $e->getMessage();
        }

        
    }
    
    ?>
</body>
</html>