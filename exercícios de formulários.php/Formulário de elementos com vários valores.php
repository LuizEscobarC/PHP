<?//Formulário de elementos com vários valores?>
<form method="POST" action="$_SERVER['PHP_SELF']">
  <select name="lunch[]" multiple>
    <option value="pork">Pork Bun</option>
    <option value="chicken">Chicken Bun</option>
    <option value="lotus">Seed bun</option>
    <option value="bean">Bean bun</option>
    <option value="nest">Bird Bun</option>
  </select>
  <input type="submit" name="submit">
</form>
<br>
<?php 
if (isset($_POST['lunch'])) {
  print "Quer comer: <br>";
  foreach ($_POST['lunch'] as $i) {
    print "$i <br>";
  }
  //test
  print"<pre>";
  print_r($_POST['lunch']);
  print"</pre>";
} 
?>