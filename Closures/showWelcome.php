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

echo $showWelcome("Escobar");

var_dump([
    $firstName,
    $lastName,
    $welcome,
    $showWelcome
]);
