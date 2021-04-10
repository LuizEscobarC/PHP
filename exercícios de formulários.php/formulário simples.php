
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim($_POST['my_name'] )) != 0) {
    print "hello, ". $_POST['my_name'];
} 
else {
    print <<<HTML
    <fieldset>
    <form method="post" action="$_SERVER[PHP_SELF]">
    Your name: <input type="text" name="my name">
    <br>
    <input type="submit" value="Say Hello">
    </form>
    </fieldset>
HTML;
}?>