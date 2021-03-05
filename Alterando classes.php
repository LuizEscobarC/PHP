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
        $row_styles = array('even','odd');
        $style_index = 0;
        $meal = array('breakfast' => 'Walnut',
                      'lunch' => 'cashew nuts',
                      'snack' => 'Dried M',
                      'dinner' => 'Eggpant with chill',
                    );
        print "<table>\n";
        foreach($meal as $key => $value){
            print '<tr class=">'. $row_styles[$style_index]. '">';
            print "<td>$key</td><td>$value</td></tr>\n";
            //altera o $style_index entre 0 e 1
            $style_index = 1 - $style_index;
        }   
        print"</table>";          

    ?>
    
</body>
</html>