<form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
<table>
 <?//recebe errors de show_form?>
  <?php if ($errors) { ?>
    <tr>
      <td>You need to correct the following errors:</td>
        <td><ul>
        <?//printa os erros do array se houver  OBS: codificados?>
          <?php foreach ($errors as $error) { ?>
            <li><?= $form->encode($error) ?></li>
          <?php } ?>
        </ul></td>
  <?php } ?>

  
  <tr><td>Nome:</td><td><?= $form->input('text', ['name' => 'dish_name']) ?>
  </td><tr>
  
  <tr><td>Preço:</td><td><?= $form->input('text', ['name' => 'price']) ?>
  </td><tr>

  <tr><td>Apimentado:</td><td><?= $form->input('checkbox', ['name' => 'is_spicy',
                                                        'value'=> 'yes']) ?>
  Yes </td><tr>

    <tr><td colspan="2" align="center">
    <?= $form->input('submit', ['value' => 'Order']) ?>
    </td></tr>
</table>
<form>                                                                      
