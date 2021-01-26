<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //calcule o total de custos
        $hamburguer = 4.95;
        $shark = 1.95;
        $refri = 0.85;
        $aliquoa = 7.5;
        $gorjeta_preimposto = 16;
        $total = $hamburguer+$shark+$refri;
        // o calculo é realizado no printf
        printf ("O custo total é %.2f , o custo com imposto é : %.2f e o preço com gorgeta é %.2f ",
         ( $total ), ( $total )+($total*($aliquoa / 100)), ( $total )+($total*($gorjeta_preimposto/100)));
    ?>
</body>
</html>