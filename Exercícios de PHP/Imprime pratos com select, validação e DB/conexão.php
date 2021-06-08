<?php
$host = "127.0.0.1";
$dbname = "aula";
$user = "root";
$pass = '';
$table = 'pratos';

try {
  $db = new PDO("mysql:dbname=$dbname;host=$host", $user, $pass);
} catch (PDOException $e) {
  print 'Conexão falha: ' . $e->getMessage();
}