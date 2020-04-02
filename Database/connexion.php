<?php

    require 'connect.php';
    require 'user.php';

    $pdo = Connect::bdd();
    $user = new user($_POST);
    $user->sessionStart($pdo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connect</title>
</head>
<body>
    <form action="#" method="post">
                <label for="pseudo">pseudo: </label>
                <input type="text" id="pseudo" name='pseudo'><br>

                <label for="pass">password: </label>
                <input type="password" id="pass" name="pass"><br>

                <input type="submit" name="login" id="login" value="login">
    </form>
</body>
</html>