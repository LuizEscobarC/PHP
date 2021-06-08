<?php
// definindo um estilo de busca padrão
$q = $db->query('SELECT dish_name, price FROM dishes');
// Não é preciso passar nada para fetch(); setFetchMode();
// se encarregará disso
$q->setFetchMode(PDO::FETCH_NUM);
while ($row = $q->fetch()) {
  print implode (', ', $row). "\n";
}

//estilo padrão para TUDO PDO::ATTR_DEFAULT_FETCH_MODE

//Não é preciso chamar setFetchMode() oupassar algo para fetch();
//setAttribute() se encarregará disso
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);

$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch()) {
  print implode(', ', $row) . "\n";
}
$anotherQuery = $db->query('SELECT dish_name FROM dishes WHERE price < 5');
//cada Subarray de $moreDishes também é indexado numericamente
$moreDishes = $anotherQuery->fetchAll();