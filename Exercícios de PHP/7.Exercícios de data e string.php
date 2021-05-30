<?php
//Dadas três variáveis com os seguintes valores ($n1 = 2, $n2 = 5, $n3 = 8), faça um programa em PHP que: 
//a) determine a soma dos três números
//b) determine a raiz quadrada do produto dos três números.
$n1 = 2;
$n2 = 5; 
$n3 = 8;
$soma = 0;

$soma = $n1 + $n2 + $n3;
$produto = $n1 * $n2 * $n3;

print $soma; 
echo"<br>";
print $produto; 
echo"<br>";
print sqrt($produto); 
echo"<br>";
//Usando a função mktime, faça uma página PHP que calcule a diferença de dias entre as seguintes datas: 28/02/2016 e 04/03/2016.
$data1 = mktime(0,0,0,02,28,2016);
$data2 = mktime(0,0,0,04,03,2016);
$data_dif = $data2 - $data1;
print $data_dif; echo "<br>\n";
//Faça uma página PHP que armazene numa variável a mensagem: “Comentários do Facebook não estão disponíveis no Google”. Substitua a palavra Facebook por Google e Google por Facebook, gerando a frase: “Comentários do Google não estão disponíveis no Facebook”. Mostre na tela a frase modificada.

$msg = "Comentários do Facebook não estão disponíveis no Google";
print "<br> $msg";
$troca = "Google";
$busca = "Facebook";
$msg = str_replace($troca, $busca, $msg); echo "<br>";
$tamanho = strlen($msg);
$rights = substr($msg, 30, 61);
$lefts = substr($msg, 0, 30 );
$lefts = str_replace($busca, $troca, $lefts);
$msg = $lefts;
$msg .= $rights;
print $msg;

//Faça uma página PHP que armazene numa variável a mensagem: “Palavra”, e inverta essa mensagem, mostrando como resultado na tela: “arvalaP”.
print "<br>\n<br>";

$msg = 'Palavra';
$tamanho = strlen($msg);
print $tamanho."<br>";
$msg2 = "";
for ($i = $tamanho; $i > 0; $i--) {
    $msg2 .= substr($msg, $i - 1 , 1 );
}
print $msg; echo"<br>";
print $msg2;

?>