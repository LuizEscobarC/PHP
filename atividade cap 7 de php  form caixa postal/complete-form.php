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

  
  <tr><td>Código postal:</td><td><?= $form->input('text', ['name' => 'postal1']) ?>
                              <?= $form->input('text', ['name' => 'postal2']) ?>
  </td><tr>
  <tr><td>Endereço do Emitente:</td><td><?= $form->input('text', ['name' => 'eEmitente']) ?>
  </td><tr>

  <tr><td>Endereço do destinatário:</td><td><?= $form->input('text', ['name' => 'eDestino']) ?>
  </td><tr>

  <tr><td>Dimensões do pacote:</td><td> <?= $form->input('number', ['name' => 'd1']) ?>
                                        <?= $form->input('number', ['name' => 'd2']) ?>
                                        <?= $form->input('number', ['name' => 'd3']) ?>
                                        <?= $form->input('number', ['name' => 'd4']) ?>
  </td><tr>
   <tr><td>Peso (kg):</td><td><?= $form->input('text', ['name' => 'peso']) ?>
  </td><tr>

    <tr><td>Estado<td>
      <td><?= $form->select($GLOBALS['estados'], ['name' => 'estado']) ?> 
      </td></tr>

    <tr><td colspan="2" align="center">
    <?= $form->input('submit', ['value' => 'Continuar']) ?>
    </td></tr>
</table>
<form>                                                                      

