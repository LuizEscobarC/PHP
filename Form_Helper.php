<?php
class FormHelper {
  protected $values = array();

  public function __construct($values = array()) { 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->values = $_POST;
    } else {
      // recebe os valores padrões passados pelo show_form
      $this->values = $values; 
    }
  }
  
// Gera codigo HTML apropriado para qualquer elemento <input/> (submit, text, radio, etc)
  public function input($type, $attributes = array(), $isMultiple = false) {
    $attributes['type'] = $type;
 
    if (($type == 'radio') || ($type == 'checkbox')) {
        //verifica se é selecionado ou não
      if ($this->isOptionSelected($attributes['name'] ?? null,
                                  $attributes['value'] ?? null)) {
        $attributes['checked'] = true;
      }
    }
    //retorna uma tag checada, com atributos e valores, multipla ou não
    return $this->tag('input', $attributes, $isMultiple);
  }

// Gera HTML para um menu <select>
  public function select($options, $attributes = array()) {
    $multiple = $attributes['multiple'] ?? false; // se tiver vazio atribui falso
    // retorna um select concatenando inicio meio e fim
    return
      $this->start('select', $attributes, $multiple) .
      $this->options($attributes['name'] ?? null, $options) .
      $this-> end('select');
  }

// Gera HTML para um elemento <textarea>
  public function textarea($attributes = array()) {
    $name = $attributes['name'] ?? null;
    //valor padrão, recuperado ou vazio
    $value = $this->values[$name] ?? '';
    //retorna uma textarea com valor padrão, vazio ou já definido e codificado
    return $this->start('textarea', $attributes) . 
           htmlentities($value) .
           $this->end('textarea');
  }
  
// Produz HTML para uma tag de fechamento automático, como <input/>
  public function tag($tag, $attributes = array(), $isMultiple = false) {
      //retorna uma tag pronta multipla ou não
    return "<$tag {$this->attributes($attributes, $isMultiple)} />";
  }

// Gera a tag inicial do elemento
  public function start($tag, $attributes = array(), $isMultiple = false) {
    // As tags <select> e <textarea> não recebem atributos de valor
    $valueAttribute = (! (($tag == 'select') || ($tag == 'textarea')));
    $attrs = $this->attributes($attributes, $isMultiple, $valueAttribute);
    return "<$tag $attrs>";
  }
// Retorna a tag de fechamento
  public function end($tag) {
    return "</$tag>";
  }

// O resto da classe não deve ser chamada fora da classe
// se encarrega do resto da exibição do HTML

// Formata um conjunto de atributos para serem incluidos
// apropriadamente dentro de uma tag HTML
  protected function attributes($attributes, $isMultiple,
                                $valueAttribute = true) {
    $tmp = array();
    // Se essa tag puder incluir um atributo de valor, tiver um nome e houver
    // uma entrada para o nome no array values, define um atributo de valor
    if ($valueAttribute && isset($attributes['name']) &&
        array_key_exists($attributes['name'], $this->values)) {
          $attributes['values'] = $this->values[$attributes['name']];
        }
    foreach ($attributes as $k => $v) {
      // O valor booleano verdadeiro significa um atributo booleano
      if (is_bool($v)) {
        if ($v) { $tmp[] = $this->encode($k); }
      }
      // Caso contrário, k=v
      else {
        $value = $this->encode($v);
        // Se esse elemento puder ter mais de um valor,
        // acrescenta [] ao seu nome
        if ($isMultiple && ($k == 'name')) {
          $value .= '[]';
        }
        $tmp[] = "$k=\"$value\"";
      }
    }
    return implode (' ', $tmp);    
  }
  
// Manipula a formatação das tags <options> de um menu select
  protected function options($name, $options) {
    $tmp = array();
    foreach ($options as $k => $v) {
      $s = "<option value=\"{$this->encode($k)}\"";
      if ($this->isOptionSelected($name, $k)) {
        $s .= ' selected';
      }
      $s .= ">{$this->encode($v)}</option>";
      $tmp[] = $s;
    }
    return implode('', $tmp);
  }

// decobre quem deve ser marcado como selected
  protected function isOptionSelected($name, $value) {
    // Se não houver uma entrada para $name no array values,
    // essa opção não poderá ser selecionada 
    if (! isset($this->values[$name])) {
      return false;
    }
    // Se a entrada referente a $name no array values também for
    // um array, verifica se $value está nesse array
    else if (is_array($this->values[$name])) {
      return in_array($value, $this->values[$name]);
    }
    // Caso contrário, compara $value com a entrada de $name no array de values
    else {
      return $value == $this->values[$name];
    }
  }

// É um encapsulador para htmlentities() PHP,é publico
// para ser usado fora da classe por outros códigos
  public function encode($s) {
    return htmlentities($s);
  }
}
?>