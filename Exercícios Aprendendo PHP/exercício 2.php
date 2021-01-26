<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       $first_name = 'lUIZ paulo';
       $last_name = ' EScoBar';
       //concatenando variáveis
       $name = $first_name . $last_name;
       //formata com primera letra de cada palavra em maiusculo
       $formatada = ucwords(strtolower($name));
       //tira os espaços e conta cada byte
       $tamanho = strlen(trim($formatada));
       print "$formatada  $tamanho";
    ?>
</body>
</html>