<?
//Formulário de dois elementos?>
<form method="POST" action="$_SERVER[PHP_SELF]">
<label for="name">ID</label>
<input type="text" name="product_id">
<label for="category">selecione</label>
<select name="category">
  <option value="ovenmitt">Pot Holder</option>
  <option value="flyingpan">Flying Pan</option>
  <option value="torch">Kitchen Torch</option>
</select>
<input type="submit" name="submit">
</form>
Here are the submitted values: <br>

product_id: <?php print $_POST['product_id'] ?? '' ?>
<br />

category: <?php print $_POST['category'] ?? '' ?>
