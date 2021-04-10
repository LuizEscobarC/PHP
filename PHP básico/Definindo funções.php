<?php
    function page_header(){
      print'<html><head><title>Bem vindo</title></head>';
      print'<body bgcolor="#fffff">';
    }
    page_header();
    print "welcome, $user";
    page_footer();

    function page_footer(){
      print'<hr>Thank you';
      print'</body></html>';
    } 
   ?> 