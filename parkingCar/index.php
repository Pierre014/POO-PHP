<?php   
    require 'car.php';

    $mazda = new car('Mazda',15000,4.5,"10/09/2019",'free', 'BE-355');

    $mazda -> rouler();
    $mazda -> rouler();
    
    $merco = new car('Mercedes',10000,3.5,"10/01/2020",'free','BE-114');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car catalog</title>
</head>
<body>
    <h1>Catalog of our cars</h1>

    <table>

        <tr>
            <th>vieuw</th>
            <th>mark</th>
            <th>kilometer</th>
            <th>mass</th>
            <th>date</th>
            <th>dispo</th>
            <th>numberplate</th>
            <th>used</th>
            <th>country</th>
            <th>for?</th>
        </tr>
        <tbody>
            <tr>
                <td>
                
                    <img src="https://www.cars-data.com/pictures/mazda/mazda-2_3334_10.jpg" 
                        alt="mazda" width="150" heigth="150">
                
                </td>
                <?= $mazda->display()?>
            </tr>
            <tr>
                <td>
                
                    <img src="https://www.cars-data.com/pictures/mazda/mazda-2_3334_10.jpg" 
                        alt="mazda" width="150" heigth="150">
                
                </td>
                <?= $mazda->display()?>
            </tr>
            <tr>
                <td>
                
                    <img src="https://www.cars-data.com/pictures/mazda/mazda-2_3334_10.jpg" 
                        alt="mazda" width="150" heigth="150">
                
                </td>
                <?= $mazda->display()?>
            </tr>
            <tr>
                <td>
                
                    <img src="https://www.cars-data.com/pictures/mercedes/mercedes-benz-amg-gt_3865_1.jpg" 
                        alt="merco" width="150" heigth="150">
                
                </td>
                <?= $merco->display()?>
            </tr>
        
        </tbody>
        
    
    
    
    </table>
</body>
</html>
