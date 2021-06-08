<?php
require 'Form_Helper.php';

$estados = array(   'MS'   => 'Mato Grosso do Sul',
                    'MT'   => 'Mato Grosso',
                    'SP'   => 'São Paulo',
                    'RJ'   => 'Rio de Janeiro'
                );

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  list($errors, $input) = validate_form();
  if ($errors) {
    show_form($errors);
      print"<pre>";
       print_r($input);
       print_r($_POST);
      print"</pre>";
  } else {
    process_form($input);
  }
} else {
  show_form();
}

function show_form($errors = array()) {
  $defaults = array('peso' => 0);
  $form = new FormHelper($defaults);
  include 'complete-form.php';
}

function validate_form() {
  $input = array();
  $errors = array();

  $input['peso'] = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_INT);
  if ((is_null($input)) || ($input === false) || ($input['peso'] > 68) ) {
    $errors[] = 'Digite um peso valido';
  }

  $input['d1'] = filter_input(INPUT_POST, 'd1', FILTER_VALIDATE_FLOAT);
  if ((is_null($input)) || ($input === false) || $input['d1'] > 99.44) {
    $errors[] = 'A dimensão 1 estrapolou o tramanho máximo';
  }

  $input['d2'] = filter_input(INPUT_POST, 'd2', FILTER_VALIDATE_FLOAT);
  if ((is_null($input)) || ($input === false) || $input['d2'] > 99.44) {
    $errors[] = 'A dimensão 2 estrapolou o tramanho máximo';
  }

  $input['d3'] = filter_input(INPUT_POST, 'd3', FILTER_VALIDATE_FLOAT);
  if ((is_null($input)) || ($input === false) || $input['d3'] > 99.44) {
    $errors[] = 'A dimensão 3 estrapolou o tramanho máximo';
  }

  $input['d4'] = filter_input(INPUT_POST, 'd4', FILTER_VALIDATE_FLOAT);
  if ((is_null($input)) || ($input === false) || $input['d4'] > 99.44) {
    $errors[] = 'A dimensão 4 estrapolou o tramanho máximo';
  }

  $input['postal'] = $_POST['postal1']. '-' .$_POST['postal2'];
  if (strlen(trim($input['postal'])) < 8) {
    $errors[] = 'código postal tem no mínimo 8 digitos';
  }

   $input['eEmitente'] = $_POST['eEmitente'] ?? '';
  if (strlen(trim($input['eEmitente'])) == 0) {
    $errors[] = 'Endereço Emitente obrigatório';
  }
   $input['eDestino'] = $_POST['eDestino'] ?? '';
  if (strlen(trim($input['eDestino'])) == 0) {
    $errors[] = 'Endereço Destino obrigatório';
  }
  $input['estado'] = $_POST['estado'];
  

  return array($errors, $input);
}

function process_form($input) {
  print"<pre>";
    print_r($input);
  print"</pre>";
  //A função  de processamento de seu progrmaa deve exibir as informações 
  //sobre o pacote em um relatório organizado e formatado
  $dimen = $input['d1'] .'x'. $input['d2'] .'x'. $input['d3'] .'x'. $input['d4'];
  $peso = $input['peso'] . 'kg';
  print"<pre>";
  $str = '<p>O pacote de dimensões'. $dimen.', pesando'.  $peso.', vai ser enviado de '. $input['eEmitente'].', para '. $input['eDestino']. ', '
      .$input['postal'].', '. $input['estado'] .'</p>';

     print $str;
}

?>