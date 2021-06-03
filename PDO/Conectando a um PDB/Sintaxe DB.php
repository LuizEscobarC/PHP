<?php
//conectando a algum banco mysql
$db = new PDO('mysql:host=db.exemple.com;dbname=restaurant',
              'penguin', 'top^hat');

//capturando erro de conexão
try {
  $db = new PDO('mysql:host=db.exemple.com;dbname=restaurant',
              'penguin', 'top^hat');
    //faz algo com o $db aqui          
} catch (PDOexception $e) {
  print "Não pode se conectar como o DB: " . $e->getMessage();
}

//criando uma tabela
CREATE TABLE dishes (
  dish_id   INTEGER PRIMARY KEY,
  dish_name VARCHAR(255),
  price     DECIMAL(4,2),
  is_spicy  INT
)

?>