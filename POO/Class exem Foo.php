<?php 

class Foo {
  public $x;
  public $multiplicador;

  function __construct() {
    //Esse é o metodo construtor e será chamado
    //pela primeira vez queando a classe for criada
    $this->multiplicador = 4;
  }
  function set($prop, $value) {
    $this->$prop = $value;
  }
  function get($prop) {
    return $this->$prop;
  }
  function soma() {
    return $this->x * $this->multiplicador;
  }
}
?>