<?php
$erro = "";

//verifica se foi dado POST ma página
if (!empty($_POST)) {
  $objeto = new Usuarios();
  $objeto->set('login', $_POST['txtLogin']);
  $objeto->set('senha', $_POST['txtSenha']);

  if ($objeto->verificaUsuario()) {
    session_start();
    $_SESSION["usuário"] = $objeto;
    //Redireciona para outra página
    header("Location: painel_controle.php");
  } else {
    //emite uma mensagem
    $erro = "Desculpe, nenhum registro encontrado!";
  }
}

?>