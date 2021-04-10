
<?php 
class Jogador {
  public $nome;
  public $posicao;
  public $data_de_nascimento;
  public $nacionalidade;
  public $altura;
  public $peso;

  public function __construct($nome,$posicao, $data_de_nascimento, $nacionalidade, $altura, $peso) {
    $this -> nome = $nome;
    $this -> posicao = $posicao;
    $this -> data_de_nascimento = $data_de_nascimento;
    $this -> nacionalidade = $nacionalidade;
    $this -> altura = $altura;
    $this -> peso = $peso;
  }
  public function imprimir() {
    print "<b>$this->nome</b><br>";
    print "<b>$this->posicao</b><br>";
    print "<b>$this->data_de_nascimento</b><br>";
    print "<b>$this->nacionalidade</b><br>";
    print "<b>$this->altura</b><br>";
    print "<b>$this->peso</b><br>";
}
public function calculaIdadde() {
  $idade = 2021 - $this->data_de_nascimento; 
  return $idade;
}
public function aposentadoria() {
  if ($this ->posicao == 'atacante') {
    $faltam = 35 - $this->calculaIdadde();
    return $faltam;
  } else if ( $this->posicao == 'meio_campo'){
    $faltam = 40 - $this->calculaIdadde();
    return $faltam;
  } else {
    $faltam = 38 - $this->calculaIdadde();
    return $faltam;
  }
}
}

$joao = new Jogador('joao','atacante',2001, 'BR', 1.73, 76.50 );

$joao->imprimir();
print "$joao->nome tem ".$joao->calculaIdadde()." anos ";

print "<br>$joao->nome vai se aposentar daqui ". $joao->aposentadoria() . "";

?>