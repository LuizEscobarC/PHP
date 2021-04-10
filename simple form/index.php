<?php 
//formulário separado por funções
require 'functions.php';

if ('POST' == $_SERVER['REQUEST_METHOD']){
  if ( $erros = validate_form() ) {
    show_form($erros);
  } else {
    process_form();
  }
} else {
  show_form();
}
?>