<?php
class FormHelper {
  protected $values = array();

  public function __construct($values = array()) { 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->values = $_POST;
    } else {
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
    return $this->tag('input', $attributes, $isMultiple);
  }

// Gera HTML para um menu <select>
  public function select($options, $attributes = array()) {
    $multiple = $attributes['multiple'] ?? false;
    return
      $this->start('select', $attributes, $multiple) .
      $this->options($attributes['name'] ?? null, $options) .
      $this-> end('select');
  }

  
// Produz HTML para uma tag de fechamento automático, como <input/>
  public function tag($tag, $attributes = array(), $isMultiple = false) {
    return "<$tag {$this->attributes($attributes, $isMultiple)} />";
  }

// Gera a tag inicial do elemento
  public function start($tag, $attributes = array(), $isMultiple = false) {
    $valueAttribute = (! (($tag == 'select') || ($tag == 'textarea')));
    $attrs = $this->attributes($attributes, $isMultiple, $valueAttribute);
    return "<$tag $attrs>";
  }

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
    if ($valueAttribute && isset($attributes['name']) &&
        array_key_exists($attributes['name'], $this->values)) {
          $attributes['values'] = $this->values[$attributes['name']];
        }
    foreach ($attributes as $k => $v) {
      if (is_bool($v)) {
        if ($v) { $tmp[] = $this->encode($k); }
      } else {
        $value = $this->encode($v);
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
    if (! isset($this->values[$name])) {
      return false;
    } else if (is_array($this->values[$name])) {
      return in_array($value, $this->values[$name]);
    } else {
      return $value == $this->values[$name];
    }
  }

  public function encode($s) {
    return htmlentities($s);
  }
}
?>