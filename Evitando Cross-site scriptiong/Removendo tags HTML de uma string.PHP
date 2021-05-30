<?php
//remove HTML dos comentários
$comments = strip_tags($_POST['comments']);
//agora pode exibir $comments
print $comments;
?>