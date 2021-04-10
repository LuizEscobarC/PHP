<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php
        //printa na tela
        echo 'Hello Word';
        //printa variável
        $string = '<br>Oi eu sou o goku';
        echo $string;
        //printa na tela formatado
        $string = 'Goku';
        printf ("<p>Oi eu sou o %05.3s</p>", $string);
        //printa numero real
        printf ("numero 1/2 é %.1f",0.5);
        echo "<br>";
        //diferença entre '' e ""
        echo "olá = $string <br>";
        echo 'olá = $string <br>'; 
        // booleano
        $t = true;
        $f = false;
        echo "'$t' é booleano verdadeiro e '$f ' é booleano falso em PHP <hr>";
        // printa o debug das variáveis
        var_dump($t, $f);
        echo'<br>';
        var_dump($string);
        printf ("<br>");
        // A váriavel é uma string?
        $a = "string";
        var_dump(is_string($a));
        echo'<br>';
        //É uma numero inteiro?
        $i = 1;
        var_dump(is_integer($i)); 
        echo '<br>';
        //É um ponto flutuante?
        $f = 1.6789;
        var_dump(is_float($f));
        echo '<br>';
        //A variável é booleana?
        $b = false;
        var_dump(is_bool($b));
        echo '<br>';
        //A variável é um array?
        $a = [1,2,3,4];
        var_dump(is_array($a));
        echo '<br>';
        //A variavel existe?
        $e = 'existo sim';
        var_dump(isset($e));
    ?>
</body>
</html>