<?php
    require 'connect.php';
    require 'user.php';
    
    $pdo = Connect::bdd();
    $user = new User($_POST);
    $user->sessionStart($pdo);
    $user->update($pdo,'update');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
    <form action="update.php" method="post">
        <label for="nameOrEmail">put your new name or new email</label>
        <input type="text" id="nameOrEmail" name="nameOrEmail"><br>
        <input type="submit" name="update" id="update" value="update">
    </form>
</body>
</html>