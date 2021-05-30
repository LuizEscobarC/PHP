<?php 
  //Definindo padrões em um menu <select> de vários valores
$main_dishes = array('suco'         => 'goiaba',
                     'sopa'         => 'sardinha',
                     'proteina'     => 'picanha',
                     'salada'       => 'rucula',
                     'carboidrato'  => 'batata',
                     'doce'         => 'bolo');
//************************************************                   
print '<select name="main_dish[]" multiple>';
$selected_options = array();
foreach ($defaults['main_dish'] as $option) {
  $selected_options[$option] = true;
}
//exibe as tags <option>
foreach ($main_dishes as $option => $label) {
  print '<option value="' . htmlentities($option) . '"'
  //seleciona as opções dousuário se existentes
  if (array_key_exists($option, $selected_options)) {
    print ' selected';
  }
  print '>' . htmlentities($label) . '</option>';
  print "\n";
}
print '</select>';
?>