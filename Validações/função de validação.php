<?php
function validate_form() {
  $erros = array();
  $input = array();
  //nome
  if (strlen(trim($_POST['my_name'])) < 3) {
    $erros[] = 'A string tem que ter no minimo 3 caracteres';
  }
  if (strlen(trim($_POST['my_name'])) == 0) {
    $erros[] = 'É obrigatório digitar algo';
//sobrenome
  }
  if (strlen(trim($_POST['sobrenome'])) < 5) {
    $erros[] = 'A caixa sobrenome tem que ter no minimo 5 caracteres';
  }
  if (strlen(trim($_POST['sobrenome'])) == 0) {
    $erros[] = 'É obrigatório digitar algo em sobrenome';
  }
  //retorna falso ou o inteiro
   $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
  if (is_null($input['age']) || ($input['age'] === false) && $erros[0] == true ) {
   $erros[] = 'Digite um inteiro valido';
  }
  return array($erros, $input); 

}
?>