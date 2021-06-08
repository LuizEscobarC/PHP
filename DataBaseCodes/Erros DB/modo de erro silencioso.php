<?php
//o construtor sempre lança uma exceção quando falha
try {
$db = new PDO('sqlite:/tmp/restaurant.db');
} catch (PDOException $e) {
  print "Não pode conectar: " . $e->getMessage();
}
$result = $db->exec("
  INSERT INTO dishes(dish_size, dish_name, price, is_spicy)
  VALUES            ('large', 'Sesame Seed Puff', 2.50, 0 )
");
if (false === $result) {
  $error = $db->errorInfo();
  print "Não pode inserir!\n";
  print "SQL Error={$error[0]}, DB Error={$error[1]}, Message={$error[2]}\n";
}
?>