<?php 

session_start();
ob_start();

include_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php
    //echo password_hash($_POST['password'], PASSWORD_DEFAULT) . "<br>";
    ?>

    <?php
    if ($_POST){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $SendLogin = $_POST["SendLogin"];
    }
    
    
    if(!empty($SendLogin)){
        
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :USERNAME LIMIT 1");
        $stmt->bindValue(":USERNAME", $username);

        $stmt->execute();

        if(($stmt) AND ($stmt->rowCount() != 0)){

            $row_user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($password == $row_user['password']){
                header("Location: index.php");

            } else {

                $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
            }
        } else {

            $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
        }

        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

    }
    ?>
    <form action="" method="post">
        <label for="username">Usuário: </label>
        <input type="text" name="username" required><br>

        <label for="password">Senha: </label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login" name="SendLogin"><br>
    </form>
    <p><a href="registrar.php">Criar Conta</a></p>
</body>
</html>