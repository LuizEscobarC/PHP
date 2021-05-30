<?php
//Sabendo que Amália tem 17 anos e Joaquim, 18, faça um programa PHP que verifique a idade dos dois amigos e exiba o nome do mais velho na tela.

$amalia = 17;
$joaquim = 18;

if ($amalia > $joaquim) {
  echo 'Amalia ';
} else if ($amalia < $joaquim) {
  echo 'joaquim';
} else {
  echo 'mesma idade';
}
echo '<br>';

//Faça um programa PHP que verifique a hora atual e, se for de manhã (antes das 12h), exiba a mensagem “Bom dia!” na cor verde; se for à tarde (até as 18h), exiba a mensagem “Boa tarde!” na cor vermelha; e, se for à noite, exiba a mensagem “Boa noite!” na cor azul.

$data = new DateTime();
$agora = $data->format('H:i:s');
//$agora = '15:00:00';
//$agora = '11:00:00';
if ($agora < '12:00:00') {
  echo 'manhã';
} else if ($agora > '12:00:00' && $agora < '18:00:00') {
  echo 'tarde';
} else {
  echo 'noite';
}


//Faça uma página PHP que sorteie um número aleatório entre 1 e 10 e verifique se ele é par ou ímpar.

$numero = rand(1, 10);
echo '<br>';
var_dump($numero);
 if ($numero % 2 == 0) {
   echo '<br>par';
 } else {
   echo '<br>impar';
 }

//Faça uma página PHP que sorteie um número aleatório entre 1 e 20 e verifique se ele é múltiplo de 3.

$numero = rand(1, 20);
if ( $numero % 3 == 0 ) {
  echo "<br> O numero $numero é multiplo de 3";
} else {
  echo '<br>Não é multiplo de 3';
}

//Faça uma página PHP que sorteie um número aleatório entre 1 e 14 e verifique se ele é múltiplo de 3 ou 5.

$numero = rand(1, 14);
if ( $numero % 3 == 0 || $numero % 5 == 0  ) {
  echo '<br>é multiplo por 3 ou 5';
} else {
  echo '<br>não é nem multiplo de 3 e nem de 5';
}

//Faça uma página PHP que sorteie um número aleatório entre 1 e 30 e verifique se ele é múltiplo de 2, 3 ou 7.

$numero = rand(1, 30);
if ( $numero % 2 == 0 ) {
  echo '<br>é multplo de 2';
} else if ( $numero % 3 == 0 ) {
  echo '<br>é multiplo de 3';
} else if ($numero % 7 == 0 ) {
  echo '<br>é multiplo de 7';
} else {
  echo '<br>não é multiplo nem de 2, 3 ou 7';
}

echo "<br>";

//Faça uma página PHP que sorteie três números aleatórios entre 1 e 10. Verifique e mostre o menor dos três valores.

$n1 = rand(1, 10);
$n2 = rand(1, 10);
$n3 = rand(1, 10);
if ( $n1 < $n2 && $n1 < $n3 ) {
  echo "<br> $n1 é o menor numero";
} else if ( $n2 < $n1 && $n2 < $n3 ) {
  echo "<br> $n2 é o menor";
} else if ( $n3 < $n2 && $n3 < $n1){
  echo "<br> $n3 é o menor";
} else {
  echo '<br>os numeros são iguais';
}
// ou
if ( $n1 < $n2) {
  $menor = $n1;
} else {
  $menor = $n2;
}
if ( $n3 < $menor ) {
  $menor = $n3;
  echo "<br>o menor numero é $menor";
} else {
  echo "<br>o menor numero é $menor";
}


?>