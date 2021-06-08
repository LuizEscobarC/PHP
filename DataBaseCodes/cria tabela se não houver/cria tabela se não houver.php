 <?php
 
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