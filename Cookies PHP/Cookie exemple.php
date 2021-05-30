<?php 

//Cookie
$user = "nortoncg";
//cria o Cookie
setcookie("usuário", $user, time() + 172800);

$nome_do_cokie = "usuário";
if (isset($_COOKIE[$nome_do_cokie])) {
  echo "O cookie $nome_do_cokie existe! ";
} else {
  echo "O cookie $nome_do_cokie não existe";
}

//escrever o valor do Cookie
echo $_COOKIE["usuário"];

//Excluindo Cookies
setcookie("usuário", "");

?>