<?php
class Entree {
    public $name;
    public $ingredients = array();

    public function hasIngredient($ingredient) {
        return in_array($ingredient, $this->ingredients);
    }
}
$soup = new Entree;
$soup->name = 'Chicken soup';
$soup->ingredients = array('chicken','water');

$sandwich = new Entree;
$sandwich->name = 'Chicken sandwich';
$sandwich->ingredients = array('chicken','bread');

foreach (['chicken','lemon','bread', 'water'] as $ing) {
    if ($soup->hasIngredient($ing)){
        print "Soup contains $ing. \n";
    }
    if($sandwich->hasIngredient($ing)){
        print "Sandwich contains $ing. \n";
    }
}
?>