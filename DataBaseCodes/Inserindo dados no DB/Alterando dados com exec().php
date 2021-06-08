<?php
//modifica dados
try {
$db = new PDO('sqlite:/tmp/restaurant.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERROMODE_EXCEPTION);
//não quisermos saber o valor de linhas afetadas não
// precisamos do retorno de exec()
$db->exec("
  UPDATE dishes SET is_spicy = 1
  WHERE  dish_name = 'Eggplant with Chilli Sauce'
");
$db->exec("
  UPDATE dishes SET is_spicy = 1, price = price * 2
  WHERE  dish_name = 'Lobster with Chili Sauce'
");
} catch (PDOException $e) {
  print "Não pode modificar a linha: " . $e->getMessage();
}
?>