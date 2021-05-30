<?php
$sweets = array('puff' =>'Sesame', 'square' =>'Coconut', 'cake' => 'Brown','ricemeat' => 'Sweet');

function generate_options_with_value($options) {
  $html = '';
  foreach ($options as $value => $option) {
    $html .= "<option value=\"$value\">$option</option>\n";
  }
  return $html;
}
//exibe o formulário
function show_form() {
  $sweets = generate_options($GLOBALS['sweets']);
  print<<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
Your Order: <select name="order">
$sweets
</select>
<br>
<input type="submit" value="Order">
</form>
_HTML_;
}
?>