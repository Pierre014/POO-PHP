<?php
    require 'class.php';
    $pdo = connect::bdd();

    $post = new Post();

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO-Practise</title>
</head>
<body>
    <h1>post de films</h1>

    <h2>voici la liste de film présent dans la base de données;</h2>
    <?= $post -> findAllPost($pdo);?>


    <p>envie de rajouter un film à la base de donnée? clique <a href="add.php">ici</a></p>
</body>
</html>