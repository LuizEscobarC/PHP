<?//nome do arquivo = Programa para inserção de registros em dishes.php?>
<?php
//Classe auxiliar
require 'FormHelper.php';

//Conexão com o DB
try {
  $db = new PDO("mysql:host=localhost; database=restaurant", "login","senha");
} catch (PDOException $e) {
  print "Não houve conexão: ". $e->getMessage();
  exit();
}
//Define as exceções para erros do DB
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Lógica da página principal:
// - Se o formulário for enviado, valida e então processa ou reexibe
// - Se ele não for enviado, é exibido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Se validate_form retornar erros, eles serão passados para show_form()
  list($errors, $input) = validate_form();
  if ($errors) {
    show_form($errors);
  } else {
    // Os dados enviados são válidos, logo, são processados
    process_form($input);
  }
} else {
  // O formulário não foi enviado, logo, ele é exibido
  show_form();
}

function show_form($errors = array()) {
  $defaults = array('price' => '5.00');

  // Define o objeto $form com padrões apropriados
  $form = new FormHelper($defaults);

  // A exibição do código HTML e do formulário está em um arquivo separado
  // para melhor entendimento
  include 'insert-form.php';
}

function validate_form() {
  $input = array();
  $errors = array();

  // dish_name é obrigatório
  $input['dish_name'] = trim($_POST['dish_name'] ?? '');
  if (! strlen($input['dish_name'])) {
    $errors[] = 'Digite o dish_name';
  }
  // O preço deve ser um numero de ponto flutuante
  $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
  if ($input['price'] <= 0) {
    $errors[] = 'Digite um preço valido';
  }
  // o padrão de apimentado é 'no'
  $input['is_spicy'] = $_POST['is_spicy'] ?? 'no';

  return array($errors, $input);
}

function process_form($input) {
  //Acessa a variavel global $db dentro dessa função
  global $db;

  //define o valor de $is_spicy de acordo com a caixa de seleção
  if ($input['is_spicy'] == 'yes') {
    $is_spicy = 1;
  } else {
    $is_spicy = 0;
  }

  // Insere o novo prato na tabela
  try {
    $stmt = $db->prepare('INSERT INTO (name_dish, price, is_spicy)
                          VALUES (?, ?, ?)');
    $stmt->execute(array($input['name_dish'], $input['price'],
                         $is_spicy));
    //tell the user that we added a dish
    print 'Added '. htmlentities($input['name_dish']) . ' to the database.';                                           
  } catch (PDOException $e) {
    print "Não foi possível inserir ". $e->getMessage();
  }
}