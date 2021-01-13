<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="sayhello.php">
        Your name: <input type="text" name="user">
        <br>
        <button type="submit">say hello</button>
    </form>
    <?php
        print "hello,";
        //exibe o nome enviado no parâmetro chamado 'user'
        print $_POST ['user'];
        print "!";
    ?>
</body>
</html>