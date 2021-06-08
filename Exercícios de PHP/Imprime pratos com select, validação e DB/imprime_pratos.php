<?php
//criar um form select de nome de pratos, a tabela deve ter 
//nome de prato, id, preço e se é apimentado. No final exibir tudo
include 'conexão.php';

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($tableExists = $db->query("SHOW TABLES LIKE '$table'")->rowCount() == 0) {
  $db->exec("
    CREATE TABLE pratos (
      id          INT PRIMARY KEY,
      nome_prato  CHAR(255),
      preco       FLOAT(2,2),
      apimentado  INT
    )
  ");
} else {
  print "A tabela já existe<br>";
}

list($prato, $errors) = validate_form();

if ($errors) {
  print implode(', ', $errors);
}

//contra sqlinjection
$prato = $db->quote($prato);
$prato_sanitaze = strtr($prato, array('_'=>'\_', '%'=>'_%'));
$q = $db->query("SELECT * FROM pratos WHERE nome_prato = $prato_sanitaze");
while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
  $string = "$row[nome_prato] - $row[id] - $row[preco]";
  if ($row['apimentado'] == 1) {
    $string .= " - apimentado";
  } else {
    $string .= " - sem_pimenta";
  }
}

print htmlentities($string) . "<br>";


function validate_form () {
  $errors = array();

  $prato = filter_var($_POST['prato'], FILTER_SANITIZE_STRING);
  if (is_null($prato) || $prato === false) {
    $errors[] = 'Digite um prato válido';
  }
  return array($prato, $errors);
}
?>
