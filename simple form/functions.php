<?php 
// variavel global que contem os valores de options
$estado_civil = array('Solteiro', 'Casado', 'Viúvo', 'Divorciada');

//Imprime o formulário
function show_form($erro = array()) {
  //Se chegar algum array de erro vai imprimir antes do formulário
  if ($erro) {
    print "<ul><li>";
    print implode('</li><li>', $erro);
    print '</li></ul>';   
  }
  $estado_civil = generate_form($GLOBALS['estado_civil']);
    print<<<HTML
         <form method="post" action="$_SERVER[PHP_SELF]">
         <fieldset>
         Your name: <input type="text" name="my_name">
         <br>
         Sobrenome: <input type="text" name="sobrenome">
         <br>
         Your email:  <input type="text" name="email">
         <br>
         Your age:  <input type="text" name="age">
         <br>
         Your relationship: <select name="estado_civil">
         $estado_civil
         </select>
         <br>
         <input type="submit" value="Enviar">
         </fieldset>
        </form>
HTML;
}
//função que imprime na tela o saida
function process_form($input){
  print "hello, ". $_POST['my_name'];
 if ($input['age'] != false){
  print "<br>your age: ". $input['age'];
 }
  print "<br> Seu sobrenome: ". $_POST['sobrenome'];
  print "<br>your email: ". $input['email'];
  print "<br>Estado Civil:  ". $input['estado_civil'];
}
//função de validações
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

  $input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  if (! $input['email']) {
    $erros[] = 'please enter a valid email adress';
  }
  //validadando options
  $input['estado_civil'] = $_POST['estado_civil'];
  if (! in_array($input['estado_civil'], $GLOBALS['estado_civil'])) {
    $erros[] = 'please choose a valid order';
  }

  return array($erros, $input); 

}
//função que gera o options do estado civil
function generate_form($options) {
  $html = '';
  foreach ($options as $option) {
    $html .= "<option>$option</option>\n";
  }
  return $html;
}
?>