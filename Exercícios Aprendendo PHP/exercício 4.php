<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // tabale a de equivalencia 
    $c = 0;
    $f = -50;
      for($f = -50; $f != 50; $f += 5){
        $c = (($f - 32) * 5) / 9;   
        print "<br> Fahrenheit : $f  =  Celsius : $c";   
    }   
    ?>
</body>
</html>