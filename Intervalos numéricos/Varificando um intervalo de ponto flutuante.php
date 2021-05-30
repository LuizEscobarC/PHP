<?php

  $input['age'] =  filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);

  if (is_null($input['age']) || ($input['age' === false]) 
  || ($input['price'] < 10.00) || ($input['price'] > 50.00)) {
    $errors[] = 'Please enter a valid price between $10 and $50';
  }
?>