<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php
    //iterando um array multidimensional com foreach()
    $sabores = array(
      'japones' => array('hot' => 'wasabi',
                         'salty' => 'soy sauce'),
      'chines'  => array('hot' => 'mustard',
                         'pepper' => 'prickly'));
    //Iterando                
    foreach ($sabores as $cultura => $cultura_sabores){
      foreach($cultura_sabores as $sabor => $exemplo){
        print "<p>O $exemplo $sabor é $cultura</p> \n ";
      }
    }                     
   ?> 
  </body>
</html>
