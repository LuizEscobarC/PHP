<?php
  //Definindo valor padrão em um menu <select>
$pesos = array('ogro'      => '10kg',
                'anão'      => '25kg',
                'elefante'  => '500kg',
                'latão'     => '100g');
print '<select name="peso">';
// > é o valor da opção , $label é o que é exibido
foreach ($pesos as $option => $label ) {
  print '<option value"'. $option .'"';
  if ($option == $defaults['peso']) {
    print ' selected';
  }
  print "> $label</option>\n";
}
print '</select>';
?>