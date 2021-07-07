<?php
$welcome = "Bem vindo";
echo $firstName = "Luiz";
echo "<br><br>";

$showWelcome = function($lastName) use (&$firstName) 
{
    global $welcome;
    $firstName .= " {$lastName}";
    return "{$welcome}, sr. {$firstName}";
};

echo $showWelcome("Escobar") . "<br><br>";

var_dump([
    "<pre>",
    $firstName,
    // null por que é um parametro, se tirar null continua null pois não existe
    $lastName = null, 
    $welcome,
    $showWelcome,
]);
