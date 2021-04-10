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
        //struct
        $funcionarios = array(
            array("nome" => "Alex", "idade" => 21, "salario" => 1285.27, "ativo" => true),
            array("nome" => "Emerson", "idade"=> 35, "salario" => 3885.27, "ativo" => false),
            array("nome" => "Osvaldo", "idade" => 54, "salario" => 5285.27, "ativo" => true),
        );

        $bonificacao = 10;

        foreach($funcionarios as $funcionario){
            if($funcionario["ativo"]){
                $funcionario["salario"]+= $funcionario["salario"] * ($bonificacao/100);
                echo "Funcionario: {$funcionario['nome']} - {$funcionario['salario']}\n";
            }else{
                echo "funcionario: {$funcionario['nome']} - INATIVO\n";
            }
        }
    ?>
</body>
</html>