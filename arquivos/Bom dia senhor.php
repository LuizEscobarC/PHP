<?php
if (file_exists($file) || is_file($file)) {
    $fileOpen = fopen($file, "w");
    for ($i = 1; $i < 5; $i++) {
        fwrite($fileOpen, "opa senhor penis numero $i" . PHP_EOL);
    }
    fclose($fileOpen);
} else {
    $fileOpen = fopen($file, "w");
    fclose($fileOpen);
}

$i = 0;
while ($i < count(file($file))) {
    echo "<h3>Bom dia  ", file($file)[$i], "</h3>";
    $i++;
}