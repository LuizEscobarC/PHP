<?php
//criando uma tabela
try {
$db = new PDO('sqlite:/tmp/restaurant.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$q = $db->exec(
  "CREATE TABLE dishes (
   dish_id INTEGER PRIMARY KEY,
   dish_name VARCHAR(255),
   price DECIMAL(4,2),
   is_spicy INT
  )"
);
} catch (PDOException $e) {
  print "Não pode criar a tabela: " . $e->getMessage();
}

//removendo uma tabela
DROP TABLE dishes
?>