<?php
//Diminui o preço de alguns pratos
$count = $db->exec("
  UPDATE dishes SET price = price + 5
  WHERE price > 3 
");
print 'Mudou o preço de ' . $count . 'linhas.';
?>