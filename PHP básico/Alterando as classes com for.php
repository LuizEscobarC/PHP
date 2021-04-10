<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //alterandos as classes
        $row_styles = array('even', 'odd');
        $dinner = array(
            'Sweet',
            'Lemon',
            'Braised'
        );
        print "<table>\n";
        for ($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++){
            print '<tr class="'.$row_styles[$i % 2].'">';
            print "<td>Element $i</td><td>$dinner[$i]</td></tr>\n";
        }
        print '</table>';
    ?>
</body>
</html>