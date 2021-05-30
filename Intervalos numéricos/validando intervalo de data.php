<?php

//cria um objeto DateTime para seis meses atrás
$range_start = new DateTime('6 months ago');
//cria um onjeto DateTime para o momento presente
$range_end = new DateTime();

// Há um ano de 4 digitos em $_POST['year']
// Há um mes de 2 dígitos em $_POST['month']
// Há um dia de 2 digitos em $_POST['day']
$input['year'] = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1900, 'max_range' => 2100)));

$input['month'] = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 12)));

$input['day'] = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 31)));

//Não é preciso usar === para fazer a comparação com falso já que 0 não é uma opção
//válida para o ano, o mes ou o dia . CheckDate() assegura que
//o numero de dias seja valido para o mes e o ano fornecidos

if ($input['year'] && $input['month'] && $input['day'] && checkdate( $input['year'], input['month'], $input['day'] )) {
  $submitted_date = new DateTime(strtotime($input['year'] . '-' . $input['month'] . '-' . $input ['day']));
  if (($range_start > $submitted_date) || ($range_end < $submitted_date)) {
    $errors[] = "pls choose a date less than six months old.";
  } else {
    //isso ocorrera se alduem omitir um dos parametros do formulario ou 
    //enviar alfo como 31 de devereiro
    $errors[] = 'pls enter a valid date';
  }
} 
?>