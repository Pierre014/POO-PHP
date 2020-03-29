<?php

    require 'form.php';
    require 'html.php';
    require 'validator.php';
    $form = new Form();
    $html = new Html();

    $valid = new Validator($_POST);
    $valid -> valid('submit');
?>


<!DOCTYPE html>
<html lang="en">
    <?= $html-> headerData("head")?>
    <?= $html-> headerData("meta","charset=UTF-8")?>
    <?= $html-> headerData("meta",'name=viewport content="'.'width=device-width, initial-scale=1.0"')?>
    <?= $html-> doubleTag("title","etape 2 POO")?>
    <?= $html-> headerData("/head")?>
<body>
    <?= $html->headerData(
        "img", 
        "src=https://images-na.ssl-images-amazon.com/images/I/61km1amwOSL._AC_SL1000_.jpg
         with=150 height=150")
    ?>
    <?= $form -> createForm("post")?>
    <?= $form -> input('text','username')?>
    <?= $form -> input('email','email')?>
    <?= $form -> input('password','pass')?>
    <?= $form -> input('radio','gender')?>
    <?= $form -> input('checkbox','Y')?>
    <?=$form -> submit()?>
    <?=$form -> endForm()?>
</body>
</html>