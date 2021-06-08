<?php
//Recuperando dados seguramente
$stmt = $db->prepare('SELECT dish_name, price FROM dishes
                      WHERE dish_name LIKE ?');
$stmt->execute(array($_POST['dish_sarch']));
while ($row = $stmt->fetch()) {
  // ... faz algo com $row ...
}