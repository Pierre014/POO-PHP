<?php
    require 'class.php';

    $pdo = Connect::bdd();
    if(isset($_POST['add'])){
        $title = $_POST['title'];
        $content = $_POST['content'];

        $doPost = new Post($title,$content);
        $doPost->addPost($pdo);
        header('location:index.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form add content</title>
</head>
<body>
<h1>add movies</h1>
    <form action="add.php" method="post">
        <label for="title">title</label>
        <input type="text" name="title" id="title"><br>
        <label for="content">content</label>
        <textarea name="content" id="content" placeholder="be creative"></textarea><br>
        <input type="submit" name="add" id="add" value="add">
    </form>
</body>
</html>