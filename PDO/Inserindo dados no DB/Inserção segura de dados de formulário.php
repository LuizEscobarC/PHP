<?php

//Os seguintes códigos sanitizam os valores enviados para o banco
//de dados apartir de formulários, assim evitando AQLinjection

$stmt = $db->prepare('INSERT INTO dishes (dish_name) VALUES (?)');
$stmt->execute(array($_POST['new_dish_name']));

//usando vários placeholders
$stmt = $db->prepare('INSERT INTO dishes (dish_name, price, is_spicy) VALUES (?,?,?)');
$stmt->execute(array($_POST['new_dish_name'], $_POST['new_price'], $_POST['is_spicy']));
