<?php
// ... primeiro, faz a inserção comum das aspas do valor
$dish = $db->quote($_POST['dish_search']);
// em seguida, insere barras invertidas antes de sublinhados e sinais de 
// porcentagem
$dish = strt($dish, array('_' => '\_', '%' => '\%'));
// Agora, $dish está sinitizada e pode ser interpolada na consulta
$stmt = $db->query("SELECT dish_name, price FROM dish_search
                    WHERE dish_name LIKE $dish");


// ... Uso incorreto de placeholders em uma instrução
$stmt = $db->prepare('UPDATE dishes SET price = 1 WHERE dish_name LIKE ?');
$stmt->execute(array($_POST['dish_name']));

// ... Uso correto de uma instrução quote() e strt() com UPDATE

// primeiro, faz a inserção comum das aspas do valor
$dish = $db->quote($_POST['dish_name']);
// em seguida, insere barras invertidas antes de sublinhados e sinais de 
// porcentagem
$dish = strt($dish, array('_' => '\_', '%' => '\%'));
//agora, $dish estpa sanitizada epode ser interpolada na consulta
$db->exec("UPDATE dishes SET price = 1 WHERE dish_name LIKE $dish");
