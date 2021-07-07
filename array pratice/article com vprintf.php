<?php
$familyOne = [
    'h1' => 'My Family is:',
    'father' => 'Pedro',
    'mother' => 'Janaina',
    'grandFa' => 'Robson',
    'grandMo' => 'Laiza'
];

$familyTwo = [
    'h1' => 'Your Family is:',
    'father' => 'Roberto',
    'mother' => 'Jinx',
    'grandFa' => 'Jack',
    'grandMo' => 'Jasmin'
];

$arrFamily = [
    'oneF' => $familyOne,
    'twoF' => $familyTwo
];

$article = "<article><h3>%s</h3><p>%s</p><p>%s</p><p>%s</p><p>%s</p></article>";

foreach ($arrFamily as $family) {
    vprintf($article, $family);
}