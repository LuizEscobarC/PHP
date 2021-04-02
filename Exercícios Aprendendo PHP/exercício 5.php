<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php
    $cidade = [
      'NY' => 8000000 
      ,'LA' => 3000000
      ,'CH' => 2600000
      ,'HT' => 2100000
      , 'FF' => 1500000
      , 'PX' => 1400000
      , 'SA' => 1300000
      , 'SD' => 1300000
      , 'DL' => 1100000
      , 'SJ' => 900000
    ];
    //ordena por chave
    ksort($cidade);
    print "<table border='1'>";
    foreach($cidade as $key => $value){
      print"<tr>";
      print "<td><b>$key</b></td> <td> $value habitantes </td>";
      print"</tr>";
    }               
    print "</table>";  
   ?> 
  </body>
</html>
