<?php
define("DATE_BR", "d/m/Y H:i:s");
date_default_timezone_set("America/Sao_Paulo");

echo date(DATE_BR, strtotime("+20days"));
echo "<br>";
echo date(DATE_BR, strtotime("-300days"));
echo "<br>";
echo date(DATE_BR, strtotime("+2years"));
echo "<br>";
echo strftime("A data de hoje é %d/%m/%Y e agora são
               %Hh%M minutos em São Paulo");