<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php
    function retorna_cor($red = null, $green = null, $blue = null){
      $red = dechex($red);
      $green = dechex($green);
      $blue = dechex($blue);

      return print"color is #$red$green$blue";
    }
     retorna_cor(255,159,119); 
   ?> 
  </body>
</html>