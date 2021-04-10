<?php
    //exibindo as linhas de uma tabela HTML com implode()
    $dimsum = array('Galinha', 'Boi', 'porco');
    print '<tr><td>'.implode('</td><td>',$dimsum).'</td></tr>';
    //transformando  uma string em um array com explode()
    $fish='olho, boca, nariz, orelha';
    $fish_list = explode(', ',$fish);
    print "The second fish is $fish_list[1]";
?>