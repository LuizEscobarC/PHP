<?php
$comments = htmlentities($_POST['comments']);
//agora pode exibir $comments
print $comments;
// é mais util para codifica tags e retorna um cógido que o navegador interpreta e converte em string
?>