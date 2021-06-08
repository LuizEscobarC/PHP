<?php
	$host = "127.0.0.1";
	$dbname = "aula";
	$user = "root";
	$pass = "";

  $table = 'dishes';

	try {
		$db = new PDO ("mysql:host=$host;dbname=$dbname",
                   $user, $pass);
	} catch (PDOException $e) {
		print "falha ao conectar: " . $e->getMessage();
	}
  //cria a tabela se não houver
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($tableExists = $db->query("SHOW TABLES LIKE '$table'")->rowCount() == 0){
      $db->exec(
        "CREATE TABLE dishes (
          dish_id INTEGER PRIMARY KEY,
          dish_name VARCHAR(255),
          price DECIMAL(4,2),
          is_spicy INT
        )"
      );
   } else {
     print "<br> A tabela já foi criada";
   }
  //printa na tela os valores de dish_name ordenado por preço
   $q = $db->query("SELECT dish_name, price FROM dishes ORDER BY price");
   while ($row = $q->fetch()) {
     print "<li>$row[dish_name] = $row[price]</li>";
   }
   list($price, $errors) = validate_form();

   //anti sqlinjection
   if ($errors) {
      print $errors[0];
   } else {
    $price = $db->quote($price);
    $price_sanitizado = strtr($price, array('_' => '\_', '%' => '\%'));

    $q = $db->query("SELECT dish_name, price FROM dishes 
                      WHERE price = $price_sanitizado");
      print "<h4>nome de pratos cujo preço seja igual ao INPUT</h4>";
      while ($row = $q->fetch(PDO::FETCH_ASSOC)) { 
          print "<li>Nome: $row[dish_name] com valor = $row[price] </li>";
      }  
   }
    //valida a variavel preço
  function validate_form() {
    $error = array();
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if (is_null($price) || $price === false ) {
      $error[] = '<h4>Digite um preço válido</h4>';
    }
    return array($price, $error);
  }
?>
