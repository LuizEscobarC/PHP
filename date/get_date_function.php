<?php
define("DATE_BR", "d/m/Y H:i:s");
date_default_timezone_set("America/Sao_Paulo");

echo "<pre>";
var_dump(getdate());

echo "<h1>Esse é o ", getdate()['mday'], " dia do mes</h1>";
echo "<h1>Agora são -> ", getdate()['hours'],":", getdate()['minutes'],
":", getdate()['seconds'], "</h1>";