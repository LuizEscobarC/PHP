<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <?php
        $pratos = array('Cashew' => 4.95,
                        'Dried' => 3.00,
                        'Eggplant' => 6.50
                        );
        foreach ($pratos as $refeicao => $preco) {
            $pratos[$refeicao] = $pratos[$refeicao] * 2;
        }

        foreach ($pratos as $refeicao => $preco){
            printf ("The new price of %s is %.2f.\n",$refeicao, $preco);
        }
    ?>    
</body>
</html>