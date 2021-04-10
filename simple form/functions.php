<?php 
function show_form($erro = array()) {
  if ($erro) {
    print "<ul><li>";
    print implode('</li><li>', $erro);
    print '</li></ul>';   
  }
    print<<<HTML
         <form method="post" action="$_SERVER[PHP_SELF]">
         Your name: <input type="text" name="my_name">
         <br>
         <input type="submit" value="Say hello">
        </form>
HTML;
}
function process_form(){
  print "hello, ". $_POST['my_name'];
}

function validate_form() {
  $erros = array();
  if (strlen($_POST['my_name']) < 3) {
    $erros[] = 'A string tem que ter no minimo 3 caracteres';
  }
  if (strlen($_POST['my_name']) == 0) {
    $erros[] = 'É obrigatório digitar algo';
  }
  return $erros;
}
?>