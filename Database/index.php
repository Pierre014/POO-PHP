<?php

    require 'connect.php';
    require 'user.php';
    $pdo = Connect::bdd();
    $user = new user($_POST);
    $user->setUser('submit',$pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>
</head>
<body>
    <form action="index.php" method="post">

        <label for="username">username: </label>
        <input type="text" id="usrname" name='username'><br>

        <label for="email">email: </label>
        <input type="email" id="email" name="email"><br>

        <label for="password">password: </label>
        <input type="password" id="password" name="password"><br>

        <label for="confirmPass">Confirm Pass: </label>
        <input type="password" id="confirmPass" name="confirmPass"><br>

        <input type="submit" name="submit" id="submit" value="submit">

    
    </form>
</body>
</html>