<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php
    function restaurant_check($meal, $tax, $tip): float{
      $tax_amount = $meal * ( $tax / 100 );
      $tip_amount = $meal * ( $tip / 100 );
      $total_amount = $meal + $tax_amount +$tip_amount;

      return $total_amount;
    }
    function payment_method($cash_on_hand, $amount){
      if($amount > $cash_on_hand){
        global $valor_refeicao;
        $GLOBALS['taxa'] = 9;
        $valor_refeicao = 24;  
        return print'<b>credit card</b>';
      }
      else{
        return print'<b>cash</b>';
      }
    }

    $valor_refeicao = 20;
    $taxa = 8.25;
    $gorjeta = 20;
    $dinheiro = 19;
    $conta = restaurant_check($valor_refeicao, $taxa,$gorjeta);
    print"I will pay with<br>";
    payment_method($dinheiro, $conta);
    print "<br>$valor_refeicao and $taxa";
   ?> 
  </body>
</html>