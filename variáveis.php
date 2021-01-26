<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*atribuindo um here document */
        $page_header = <<<HTML_HEADER
            <html>
            <head><title>Menu<\title><\head>
            <body bgcolor="#fffed9">
            <h1>dinner<\h1>
        HTML_HEADER;
        /*Operando com variáveis */
        $price = 3.95;
        $tax_rate = 0.08;
        $tax_amount = $price * $tax_rate;
        //concatenando
        $username = 'james';
        $domain = '@hotmail.com';
        $email_adress = $username . $domain;
        print 'tax is' . $tax_amount;
        print '\n';
        print $email_adress;
        /*atribuindo e adição combinada*/
        $price = $price + 3;
        $price =+ 3;
        //atribuição e concatenação combinadas
        $username = $username . $domain;
        $username =+ $domain;
        //incremento e decremento
        $birthday = $birthday + 1;
        ++$birthday;
        $year_left = $year_left - 1;
        --$year_left;
        //interpolação de variavel com aspas duplas
        $email = 'jacobi@hotmail.com';
        print"o email é $email";
        //interpolando com here document
        $page_title = 'menu';
        $meat = 'pork';
        $vegetable = 'bean sprout';
        print <<<MENU
        <html>
        <head><title>$page_title<\title><\head>
        <body>
        <ul>
        <li>Barbecued $meat
        <li>Sliced $meat
        <li>Braised $meat with $vegetable
        <\ul>
        <\body>
        <\html>
        MENU;
        //NO NOW DOCUMENT N É PERMITIDO INTERPOLAÇÃO

        //interpolando com chaves
        $preparation = 'Braise';
        $meat = 'Beef';
        print "{$preparation}d $meat with Vegetables"; //chave é usada para separar a variavel da string literal "d"
    ?>
</body>
</html>