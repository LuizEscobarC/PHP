<?php

require 'Form_Helper.php';

$sexos = array('heterosexual'   => 'heterosexual',
                'bisexual'       => 'bisexual',
                'homosexual'     => 'homosexual');

$estados_civis = array('empreendedor' => 'empreendedor',
                     'Autodidata'     => 'Autodidata',
                     'Proativo'       => 'Proativo',
                     'Lider'          => 'Lider',
                     'Focado'         => 'Focado');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  list($errors, $input) = validate_form();
  if ($errors) {
    show_form($errors);
  } else {
    process_form($input);
    }
} else {
  show_form();
  } 

function show_form($errors = array()) {
  $defaults = array('termo' => 'yes', 'altura' => '1,70');
  $form = new FormHelper($defaults); 
//imprime a página
  menu();
      include 'complete_form.php';
  menu_end();                                     
}

function validate_form() {
  $input = array();
  $errors = array();

  // o nome é obrigatório
  $input['name'] = trim($_POST['name'] ?? '');
  if (! strlen($input['name'])) {
    $errors[] = 'Please enter your name.';
  }
  // altura é obrigatória
  $input['altura'] = $_POST['altura'] ?? '';
  if (! in_array($input['altura'], ['1,60','1,70','1,80'])) {
    $errors[] = 'Por favor selecione a altura.';
  }
  // o sexo é obrigatória
  $input['sexo'] = $_POST['sexo'] ?? '';
  if (! array_key_exists($input['sexo'], $GLOBALS['sexos'])) {
    $errors[] = 'Por favor selecione um sexo válido';
  }
  // exatamente dois estados civis devem ser selecionados
  $input['estado_civil'] = $_POST['estado_civil'] ??  array();
  if (count($input['estado_civil']) != 2) {
    $errors[] = 'Por favor selecione no minimo dois estados civis.';
  } else {
      // sabemos que há dois pratos principais selecionados, logo, verificamos
      // se ambos são válidos
      if (! (array_key_exists($input['estado_civil'][0], $GLOBALS['estados_civis']) && 
             array_key_exists($input['estado_civil'][1], $GLOBALS['estados_civis']))) {
        $errors[] = 'Por favor selecione 2 estados civis validos';
    }
  }
  // se a opção termo for marcada, os comentários devem conter algo
  $input['termo'] = $_POST['termo'] ?? 'no';
  $input['comments'] = trim($_POST['comments'] ?? '');
  if (($input['termo'] == 'yes') && (! strlen($input['comments']))) {
    $errors[] = 'Por favor comente algo sobre você';
  }

  return array($errors, $input);
}

function process_form($input) {
  // procura os nomes completos da sobremesa e dos pratos principais
  // nos arrays $GLOBALS['sexos'] e $GLOBALS['estados_civis']
  $sexo = $GLOBALS['sexos'][ $input['sexo'] ];
  $estado_civil_1 = $GLOBALS['estados_civis'][ $input['estado_civil'][0] ];
  $estado_civil_2 = $GLOBALS['estados_civis'][ $input['estado_civil'][1] ];
  if (isset($input['termo']) && ($input['termo'] == 'yes')) {
    $termo = 'aceitou';
  } else {
    $termo = 'não aceitou';
  }
    // contrói o texto da mensagem do pedido
    $message=<<<HTML
  Obrigado por preencher o formulário Sr., {$input['name']}.
  Você disse ter {$input['altura']} de altura e ser $sexo, $estado_civil_1 ou $estado_civil_2.
  Você $termo nossos termos.
HTML;
  if (strlen(trim($input['comments']))) {
    $message .= '  Seu comentário: ' . $input['comments'];
  }

  //mail('luiz_escobar12@hotmail.com', 'New Order', $message);
  // exibe a mensagem, mas faz a codificação usando as entidades HTML necessárias
  // e transforma novas linhas em tags <br/>
  menu();
  print htmlentities($message);
  menu_end();
}
//imprime a página
function menu() {
  print <<<_HTML1
  <!DOCTYPE html>
  <html lang="pt-br">
  
  <head>
      <script>
          document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
          });
          
          $(document).ready(function(){
            $('select').formSelect();
          });
      </script>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cacos Barber</title>
      <!--chamando o css-->
      <link rel="stylesheet" type="text/css" href="style.css" media="screen">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css"  media="screen,projection"/>
  
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  
  <body>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.min.js"></script>

        <script>
          $(document).ready(function(){
            $('select').formSelect();
          });
        </script>
      <!--cabeçalho-->
      <div class="container_header">
          <header>
                  <nav id="menu">
                  
                      <div class="nav-wrapper #1a237e indigo darken-4">
                      <a href="dark.jpg" class=" "><img id="logo" src="dark.jpg" width="110" alt="logo"></a>
                      <ul id="nav-mobile" class="right hide-on-med-and-down center">
                          <li><a href="home.php">home</a></li>
                          <li><a href="contato.php">contato</a></li>
                          <li><a href="about.html">about</a></li>
                      </ul>
                      </div>
                  </nav>
          </header>
      </div>
  
      <!--corpo-->
          <div class="corpo">
                  <div id="div_aside1">
                      
                          <article>

                                  <section>
                                      <p>
                                                   
_HTML1;
}
//imprime a pagina 
function menu_end () {
  print<<<_HTML2
            </p>  
            </section>
            </article>
            
        </div>
        <div id="div_aside">
        
            <aside>
                    <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <div class="card-panel grey lighten-5 z-depth-1 ">
                    <div class="row valign-wrapper">
                        <div class="col s8">
                        <img src="autor.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s10">
                        <span class="black-text">
                            Olá meu nome é luiz. Sou o autor!
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
            </aside>
        </div>     
    </div>
</div>    
<!--rodapé-->
<footer class="#1a237e indigo darken-4">
<div class="container">
    <div class="row">
    <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
    </div>
    <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Links</h5>
        <ul>
        <li><a class="grey-text text-lighten-3" target="_blank" src="whats icone.png" alt="whatsapp" href="https://www.facebook.com/NantesBarber">NantesBarber</a></li>
        <li><a class="grey-text text-lighten-3" target="_blank" src="whats icone.png" alt="whatsapp" href="https://www.instagram.com/Nantes67">whats</a></li>
        <li><a class="grey-text text-lighten-3" target="_blank" href="#!">Link 3</a></li>
        <li><a class="grey-text text-lighten-3" target="_blank" href="#!">Link 4</a></li>
        </ul>
    </div>
    </div>
</div>
<div class="footer-copyright">
    <div class="container">
    © 2014 Copyright Text
    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
</div>
</footer>
_HTML2;
}
?>