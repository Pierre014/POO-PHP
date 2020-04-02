<?php

    require 'user.php';
    require 'connect.php';
    $pdo = Connect::bdd();
    $user = new user($_POST);
    $user->deleteMember("delete",$pdo);
?>

<form action="#" method="post">

    <p>Are you sure you want to delete your profil?</p>

    <label for="yes">Yes</label>
    <input type="radio" name="sure" id="yes" value="yes">
    <label for="no">No</label>
    <input type="radio" name="sure" id="no" value="no">

    <input type="submit" name="delete" value="delete">


</form>