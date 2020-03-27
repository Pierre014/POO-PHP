<?php
    require 'class.php';
    $head = new Head();
?>
<!DOCTYPE html>
<html lang="en">

    <?= $head-> headerData("head")?>
    <?= $head-> headerData("meta","charset=UTF-8")?>
    <?= $head-> headerData("meta",'name=viewport content="'.'width=device-width, initial-scale=1.0"')?>
    <?= $head-> doubleTag("title","etape 2 POO")?>
    <?= $head-> headerData("/head")?>

<body>
    <?= $head->headerData("img", "src=https://images-na.ssl-images-amazon.com/images/I/61km1amwOSL._AC_SL1000_.jpg")?>

</body>
</html>