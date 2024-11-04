<?php 

session_start();

require_once "classes/Conexao.php";

$pdo = Conexao::conectar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body class="login-body">

    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        <form action="" method="post">

        <div class="input-box"> 
            <input type="text" class="input-field" placeholder="Usuário" name="username" required><br>
        </div> 
        <div class="input-box">
            <input type="password" class="input-field" placeholder="Senha" name="password" required><br>
        </div>
        <div class="input-submit">
            <input type="submit" class="submit-btn" name="SendLogin">
            <label for="submit">Entrar</label>
        </div>
        </form>
    </div>

    <?php
    if ($_POST){
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        $SendLogin = $_POST["SendLogin"];
    }
    
    if(!empty($SendLogin)){
        
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :USERNAME LIMIT 1");
        $stmt->bindValue(":USERNAME", $_SESSION["username"]);

        $stmt->execute();

        if(($stmt) AND ($stmt->rowCount() != 0)){

            $row_user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($_SESSION["password"] == $row_user['password']){
                
                $_SESSION["Logado"] = true;
                header("Location: index.php");

            } else {

                $_SESSION['msg'] = "<p style='color:red'>Erro: Usuário ou senha inválida!</p>";
            }
        } else {

            $_SESSION['msg'] = "<p style='color:red'>Erro: Usuário ou senha inválida!</p>";
        }

        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

    }
    ?>
</body>
</html>