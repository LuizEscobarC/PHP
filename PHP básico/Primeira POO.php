<?php
class Entree {
    public $name;
    public $ingredients = array();

    public function __construct($name, $ingredients) {
        if (! is_array($ingredients)){
            throw new Exception('$ingredients must be an array');
        }
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
    public function hasIngredient($ingredient) {
        return in_array($ingredient, $this->ingredients);
    }
    public static function getSizes() {
        return array ('small','medium','large');
    }
}
class ComboMeal extends Entree {

    public function __construct($name, $entrees)
    {
        parent::__construct($name, $entrees);
        foreach($entrees as $entree) {
            if (! $entree instanceof Entree) {
                throw new Exception('Elements of $entrees must be Entree objects');
            }
        }
    }
    public function hasIngredient($ingredient)
    {
        foreach ($this->ingredients as $entree) {
            if ($entree->hasIngredient($ingredient)){
                return true;
            }
        }
        return false;
    }
}
$soup = new Entree('Chicken soup', array('chicken','water'));
$sandwich = new Entree('Chicken sandwich', array('chicken','bread'));

//recebe um array de dois objetos
$combo = new ComboMeal('Soup + Sandwich', array($soup, $sandwich));


//recebe um array com os tamanhos
$sizes = Entree::getSizes();

print_r($sizes);
print'<br>';

foreach (['chicken','lemon','bread', 'water'] as $ing) {
    if ($soup->hasIngredient($ing)){
        print "Soup contains $ing. <br> \n";
    }
    if($sandwich->hasIngredient($ing)){
        print "Sandwich contains $ing. <br> \n";
    }
}

foreach (['chicken','water','pickles'] as $ing) {
    if($combo->hasIngredient($ing)) {

        print "<p>Something in the combo contains $ing.</p> \n";
    }
}
?>