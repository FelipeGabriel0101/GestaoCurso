<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username"><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password"><br>

        <input type="submit" value="Criar Conta">
    </form>

    <?php
    require_once 'classes/Admin.php';
    require_once 'classes/AdminDAO.php';

    $admin = new Admin($_POST["username"], $_POST["password"]);
    print_r($admin);
    ?>
</body>
</html>