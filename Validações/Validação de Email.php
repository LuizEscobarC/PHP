<?php
//$input['email'] recebe falso se o email n for valido
//recebe o email se ele for valido
$input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (! $input['email']) {
  $errors[] = 'please enter a valid email adress';
}
?>
