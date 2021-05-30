<?php 
//formulário separado por funções
require 'simple form/functions.php';

if ('POST' == $_SERVER['REQUEST_METHOD']){
  // vai colocar cada array valor na sua variavel
  list($erros, $input) = validate_form();
  if ( $erros ) {
    show_form($erros);
  } else {
    process_form($input);
  }
} else {
  show_form();
}
?>