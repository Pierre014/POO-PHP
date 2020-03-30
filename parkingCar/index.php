<?php   
    require 'car.php';

    $mazda = new car('Mazda',15000,4.5,"10/09/2019",'free', 'BE-355');

    echo '<pre>';
    var_dump($mazda ->display());
    echo '</pre>';

    $mazda -> rouler();
    $mazda -> rouler();

    echo '<pre>';
    var_dump($mazda ->display());
    echo '</pre>';
    

