<?php
//verificando um valor sem value="" enviado para um menu select
$input['order'] = $_POST['order'];
if (! in_array($input['order'], $GLOBALS['sweets'])) {
  $errors[] = 'Please choose a valid order';
}
?>
<?php 
//verificando um valor enviado para um menu select
$input['order'] = $_POST['order'];
if (! array_key_exists($input['order'], $GLOBALS['sweets'])) {
  $errors[] = 'please choose a valid order';
}
?>