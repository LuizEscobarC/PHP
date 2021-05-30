<?php

$erro = "";
print<<<htmlform
  <form method="post" action="">
  Login: <input name="txtLogin" type="text">
  <br><br>
  Senha: <input name="txtSenha" type="password">
  <br>
  <input value="submit" type="submit">
  </form>
htmlform;
//verifica se foi dado POST ma página
if (!empty($_POST)) {
  $objeto = new Usuarios();
  $objeto->set('login', $_POST['txtLogin']);
  $objeto->set('senha', $_POST['txtSenha']);

  if ($objeto->verificaUsuario($objeto)) {
    session_start();
    $_SESSION["usuário"] = $objeto;
    //Redireciona para outra página
    header("Location: index.php");
  } else {
    //emite uma mensagem
    $erro = "Desculpe, nenhum registro encontrado!";
    print $erro;
    
  }
}

class Usuarios {

  public $login;
  public $senha;

  function set($valor, $post) {
    if ($valor == 'login') {
      $this->login = $post;
    }
    if ($valor == 'senha') {
      $this->senha = $post;
    }
  }
  function verificaUsuario($objeto) {
    if(in_array($objeto , $_SESSION['usuário'])){
      return true;
    } else {
      return false;
    }
    }
  }
?>