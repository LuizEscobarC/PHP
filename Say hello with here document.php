<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php      
        //exibe uma saudação se o formulário for enviado
        if ($_POST['user']){
            print "hello, ";
            //exibe o nome enviado no parâmetro user
            print $_POST['user'];
            print "!";
            //caso contrário exibe o formulário
        }else {
        //here document
        print <<< _HTML_
            <form method="post" action="$_SERVER[PHP_SELF]">
            your name: <input type="text" name="user">
            <br>
            <button type="submit">say hello</button>
            </form>
        _HTML_;
        }
    ?>
</body>
</html>