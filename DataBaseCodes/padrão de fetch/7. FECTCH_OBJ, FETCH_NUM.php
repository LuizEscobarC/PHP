<?php
// estilo de busca
// se usarmos apenas indices numericos, será facil agrupar os valores
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch(PDO::FETCH_NUM)) {
  print implode(', ', $row) . "\n";
}

//com o uso de um objeto, a sintaxe de acesso ás propriedades obtém os valores
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch(PDO::FETCH_OBJ)) {
  print "{$row->dish_name} has price {$row->price}\n";
}