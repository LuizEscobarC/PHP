<?php
$article = <<<ATC
    <h1>{{primeiro}}</h1>
    <p>{{segundo}}
    <br><small>{{terceiro}}</small></p>
ATC;

$arrArticle = [
    "primeiro" => "Olá, Mundo",
    "segundo" => "Você é um guerreiro",
    "terceiro" =>"Luiz Paulo"
];

$replace = "{{". implode("}}&{{" . array_keys($arrArticle)) . "}}";

echo str_replace(
    explode("&",$replaces),
    array_values($arrArticle),
    $arrArticle
);