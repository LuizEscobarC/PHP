<?php 
//contruindo um array de padrôes 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $defaults = $_POST;
  } else {
    $defaults = array('delivery' => 'yes',
                      'size'     => 'medium',
                      'main_dish'=> array('tato', 'tripe'),
                      'sweet'    => 'cake');
  }
?>