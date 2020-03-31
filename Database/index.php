<?php
    require 'connect.php';
    require 'user.php';

    $pdo = Connect::bdd();
    $user = new user($_POST);
    $user->sessionStart($pdo);
    $user->setUser('submit',$pdo);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widt
    h=device-width, initial-scale=1.0">
    <title>USERS</title>
</head>
<body>

    <h1>formulaire d'inscription</h1>
    <form action="index.php" method="post">

        <label for="username">username: </label>
        <input type="text" id="username" name='username'><br>

        <label for="email">email: </label>
        <input type="email" id="email" name="email"><br>

        <label for="password">password: </label>
        <input type="password" id="password" name="password"><br>

        <label for="confirmPass">Confirm Pass: </label>
        <input type="password" id="confirmPass" name="confirmPass"><br>

        <input type="submit" name="submit" id="submit" value="submit">
    </form>

    <h3>dejà inscrit? connecte-toi</h3>

        <form action="#" method="post">
            <label for="pseudo">pseudo: </label>
            <input type="text" id="pseudo" name='pseudo'><br>

            <label for="pass">password: </label>
            <input type="password" id="pass" name="pass"><br>

            <input type="submit" name="login" id="login" value="login">
        </form>
        
</body>
</html>