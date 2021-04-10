<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php
    /* asort(); classifica em ordem alfabetica pelo valor do array, sort();
     faz a mesma coisa porem redefine para numeros as chaves do array, ksort();
     ordena os valores pelas chaves. 
        Aqui vou apresentar o asort.*/
    $livros = array('livro 1' => '3',
                    'livro 2' => '1',
                    'livro 3' => '2');
    print "<b>antes do sorteio:</b>\n";
    foreach ($livros as $key => $value){
      print "<p>\$livros: $key - $value </p> \n";
    }      
    asort($livros);

    print"<b>Depois do sorteiro</b> \n";          
    foreach ($livros as $key => $value){
      print "<p> \$livros: $key - $value</p> \n";
    }
   ?> 
  </body>
</html>