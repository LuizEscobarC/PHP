<?php
$q = $db->query('SELECT dish_name, price FROM dishes');
//$rows será uma array de quatro elementos; cada elementos 
// é uma linha de dados do banco de dados
$rows = $q->fetchaAll();