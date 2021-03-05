<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $meals = array('Cashew' => 4.95,
                       'Dried' => 3.00,
                       'Eggplant' => 6.50);
        foreach ($meals as $dish => $price){
            //$price = $price * 2 não funciona
            $meals[$dish] = $meals[$dish] * 2;
        }
        //itera pelo array navamente e exibe os valores
        foreach ($meals as $dish => $price){
            printf ("The new price of %s is \$%.2f.\n",$dish,$price);
        }               
    ?>    
</body>
</html>