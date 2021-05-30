<?php
//imprime a data
$data = date('d-m-Y');
echo "Data:". $data . "<br>";

//divide duas datas 
$jan1 = mktime(0,0,0,1,31,2014);
$jan1_30 = mktime(0,30,0,1,31,2014);
$dif = $jan1_30 - $jan1;
echo $dif;
echo "<br>";

//Funções de caixa 

$msg = "Olá, mundo!";
echo lcfirst($msg). "<br>";
echo ucfirst($msg). "<br>";
echo ucwords($msg) ."<br>";
echo strtolower($msg). "<br>";
echo strtoupper($msg). "<br>";

//funções de espaçamento

$msg = "   Cheio   de   Espaços";
echo ltrim($msg). "<br>";
echo rtrim($msg). "<br>";
echo trim($msg). "<br>";

//função de troca

$busca = "nome";
$troca = "Marivalda";
$frase = "E aí, nome!";
$msg = str_replace($busca, $troca, $frase);
echo $msg;

//conta quantas vezes tem certa palavra ou letra em uma frase

$msg = "Oi, como foi seu dia?";
echo "<br>";
echo strlen($msg). "<br>";
echo substr_count($msg, 'oi');

//pega determinada parte da string
echo "<br>";
$msg = "luizpauloescobar";
echo substr($msg, 0, 1). "<br>";
echo substr($msg, 3, 5). "<br>";
echo substr($msg, 10, -3). "<br>";
echo substr($msg, strlen($msg) -2, 1). "<br>";
?>