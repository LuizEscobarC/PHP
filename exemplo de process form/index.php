<?php
// Essa instrução presume que FormHelper.php esteja no mesmo diretório desse arquivo 
require 'Form_Helper.php';

// Define os arrays de nomes dos menus de seleção
// Eles são necessários em show_form(), validate_form()
// e process_form(), logo, são declarados no escopo global 
$sweets = array('bolo'      => 'bolode morango',
                'gelatina'  => 'gelatina integral',
                'leite'     => 'leite com toddy',
                'bolacha'   => 'bolacha de morango');

$main_dishes = array('cuke'    => 'Braised',
                     'stomach' => 'Sauteed',
                     'tripe'   => 'Pork',
                     'taro'    => 'Steweed',
                     'giblets' => 'Baked',
                     'abalone' => 'Abalone');

// Lógica da página principal:
// - Se o formulário for enviado, valida e então processa ou reexibe
// - Se ele não for enviado, é exibido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Se validate_form retornar erros, eles serão passados para show_form()
  list($errors, $input) = validate_form();
  if ($errors) {
    show_form($errors);
  } else {
    // Os dados enviados são válidos , logo, são processados
    process_form($input);
  }
} else {
  // O formulário não foi enviado, logo, ele é exibido
  show_form();
}

function show_form($errors = array()) {
  $defaults = array('delivery' => 'yes', 'size' => 'medium');
  // Define o objeto $form com padrões apropriados
  $form = new FormHelper($defaults);

  // A exibição do código HTML e do formulário está em um arquivo separado
  // para melhor entendimento
  include 'complete-form.php';
}

function validate_form() {
  $input = array();
  $errors = array();

  // o nome é obrigatório
  $input['name'] = trim($_POST['name'] ?? '');
  if (! strlen($input['name'])) {
    $errors[] = 'Please enter your name.';
  }
  // tamanho é obrigatório
  $input['size'] = $_POST['size'] ?? '';
  if (! in_array($input['size'], ['small','medium','large'])) {
    $errors[] = 'pls select size.';
  }
  // a sobremesa é obrigatória
  $input['sweet'] = $_POST['sweet'] ?? '';
  if (! array_key_exists($input['sweet'], $GLOBALS['sweets'])) {
    $errors[] = 'Pls select a valid sweet item.';
  }
  // exatamente dois pratos principais são obrigatórios
  $input['main_dish'] = $_POST['main_dish'] ??  array();
  if (count($input['main_dish']) != 2) {
    $errors[] = 'Please select exactly two main dishes.';
  } else {
      // sabemos que há dois pratos principais selecionados, logo, verificamos
      // se ambos são válidos
      if (! (array_key_exists($input['main_dish'][0], $GLOBALS['main_dishes']) && 
             array_key_exists($input['main_dish'][1], $GLOBALS['main_dishes']))) {
        $errors[] = 'Pls select exactly two valid main dishes.';
    }
  }
  // se a opção delivery for marcada, os comentários devem conter algo
  $input['delivery'] = $_POST['delivery'] ?? 'no';
  $input['comments'] = trim($_POST['comments'] ?? '');
  if (($input['delivery'] == 'yes') && (! strlen($input['comments']))) {
    $errors[] = 'Pls enter your address for delivery.';
  }

  return array($errors, $input);
}

function process_form($input) {
  // procura os nomes completos da sobremesa e dos pratos principais
  // nos arrays $GLOBALS['sweets'] e $GLOBALS['main_dishes']
  $sweet = $GLOBALS['sweets'][ $input['sweet'] ];
  $main_dish_1 = $GLOBALS['main_dishes'][ $input['main_dish'][0] ];
  $main_dish_2 = $GLOBALS['main_dishes'][ $input['main_dish'][1] ];
  if (isset($input['delivery']) && ($input['delivery'] == 'yes')) {
    $delivery = 'do';
  } else {
    $delivery = 'do not';
  }
    // contrói o texto da mensagem do pedido
    $message=<<<HTML
  Thank you for order, {$input['name']}.
  You requested the {$input['size']} size of $sweet, $main_dish_1, and $main_dish_2.
  you $delivery want delivery.
HTML;
  if (strlen(trim($input['comments']))) {
    $message .= ' Your comments: ' . $input['comments'];
  }

  // envia a mensagem para o chef
  mail('luiz_escobar12@hotmail.com', 'New Order', $message);
  // exibe a mensagem, mas faz a codificação usando as entidades HTML necessárias
  // e transforma novas linhas em tags <br/>
  print nl2br(htmlentities($message, ENT_HTML5));
}
?>