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
        <p>Nome:</p>
       <div>
             <?= $form->input('text', ['name' => 'name', 'class'=>'validade',
                              'id' => 'name']) ?>
                              <label for="name"> Name</label>
       </div>  
             
          <p>Altura:</p>
 
            <label>
                <?= $form->input('radio',[ 'name' => 'altura', 'value' => '1,60']) ?>
                <span>Pequeno</span>
            </label>
          
            <label>
                <?= $form->input('radio',[ 'name' => 'altura', 'value' => '1,70']) ?>
                <span>Medio</span>
            </label>
          
            <label>
                <?= $form->input('radio',[ 'name' => 'altura', 'value' => '1,80']) ?>
                <span>Grande</span>
            </label>
                    <br>
            <label >  
            <p>Sexo:</p>
              <?= $form->select($GLOBALS['sexos'], [ 'name' => 'sexo']) ?> 
                        
              </label>
              <label for="">
              <p>Escolha duas qualidades suas:</p>
                          <div>
                            <?= $form->select($GLOBALS['estados_civis'], ['name' => 'estado_civil',
                                                                          'multiple' => true]) ?>
                          <div>
              <label >
                <p>Aceita nossos termos?</p>
                          <p>
                            <label>
                              <?= $form->input('checkbox', ['name' => 'termo', 'value' => 'yes']) ?>
                              <span>Yes</span>
                            </label>
                          </p>
              </label>
              <label>                          
                 <p> Digite algo sobre sua carreira.<br/>
                  Digite aqui qual é sua ambição:´</p>
                  <?= $form->textarea(['name' => 'comments']) ?></td></tr>
              </label>
              <label>
                  <td colspan="2" align="center">
                  <center><?= $form->input('submit', [ 'value' => 'Enviar',]) ?></center>
              </label>
    </table>
    </form>
                                                                
