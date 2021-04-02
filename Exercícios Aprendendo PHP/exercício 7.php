<?php
  namespace Luiz;
  class Ingredient {
    public $nome;
    public $custo;

    public function __construct($nome, $custo) {
      $this->nome = $nome;
      $this->custo = $custo;
    }
    public function ingredientCost($novoCusto){
      $this->custo = $novoCusto;
    }
  }
  class Entree {
    public $name;
    public $ingredients = array();

    public function __construct($name, $ingredients){
      if(! is_array($ingredients)){
        throw new Exception('$ingredients must be an array');
      }
      $this->name = $name;
      $this->ingredients = $ingredients;
    }
    public function hasIngredient($ingredient) {
      return in_array($ingredient, $this->ingredients);
    }
  }
  class Ingredients extends Entree {
    
    public function __construct($name, $ingredients) {
      parent::__construct($name, $ingredients);
      foreach ($this->ingredients as $ingredient) {
        if(! $ingredient instanceof \Luiz\Ingredient ){
          throw new Exception('Elements of $ingredients must be Ingredient objects');
        }
      }
    }
    public function totalCost() {
      $total = 0;
      $objetos = $this->ingredients;
      foreach ($objetos as $ing){
        $total+=$ing->custo;
      }
      return $total;
    } 
  }

  $macarrao = new Ingredient('trigo', 12);
  $carne = new Ingredient('bovino', 24);
  $molho = new Ingredient('tomate', 4);

  $macarrao->ingredientCost(15);

  $ingredients = new Ingredients('macarronada', array($macarrao, $carne, $molho));
  $total = $ingredients->totalCost();
  print "total is ".$total;
?>