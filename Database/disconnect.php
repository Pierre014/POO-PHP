<?php
require 'connect.php';
    require 'user.php';
    $pdo = Connect::bdd();
    $user = new user($_POST);
    $user->sessionStart($pdo);
    $user ->sessionEnd($pdo);
    header('location:index.php');
?>