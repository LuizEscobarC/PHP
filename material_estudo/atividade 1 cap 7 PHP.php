<form method="POST">
 Login<input type="text" name="login">
 <br>
 Senha<input type="password" name="senha">
 <input type="submit" name="enviar" value="enviar">
</form>


<?php
  if($_POST) {
    process_form();
  } else {
     print("alert(ERROR)"); 
  }

  function process_form() {
    $input = array();
    $input = $_POST;
      print "<pre>";
        print_r($input);
      print "</pre>";
  }

  print '<ul>';
  foreach ($_POST as $key => $value) {
    print '<li>' . htmlentities($key) . ' = ' . htmlentities($value) . '</li>';
  }
  print '</ul>';
?>