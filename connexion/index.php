<?php
    require 'class.php';

    $connex = new Connect('becode','Feuille014','pierre');
    $pdo = $connex->ConnectPDO();
    echo '<pre>';
    print_r($connex->countTable("SELECT * FROM meteo",$pdo));
    echo '</pre>';

    