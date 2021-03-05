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
        $meals = array(
            'Cashew' => 4.95,
            'Dried' => 3.00,
            'Egg' =>6.50,
            'shrimp' => 0 );
        if (array_key_exists('Cashew', $meals))
        {
            print "<br>key Exists";
        }
        if (in_array(6.50, $meals)){
            print "<br>6.50 existe em uma chave";
        }
        $chave = array_search(0, $meals);
        print "<br>Essa chave tem o valor zero $chave";
    ?>
</body>
</html>