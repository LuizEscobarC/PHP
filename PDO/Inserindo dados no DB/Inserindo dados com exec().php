<?php
try {
$db = new PDO('sqlite:/tmp/restaurant.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$effectedRows = $db->exec(
  "INSERT INTO dishes (dish_name, price, is_spicy)
   VALUES             ('Sesame Seed Puff', 2.50, 0)                   
  )"
);
} catch (PDOException $e) {
  print "Não pode inserir linhas: " . $e->getMessage();
}
?>