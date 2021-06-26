<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  
        $db = new PDO('sqlite:dinner.db');
        $meals = array('breakfast', 'lunch', 'dinner');
        if(in_array($_POST['meal'], $meals)){

            $stmt = $db->prepare('SELECT dish, price FROM meals WHERE meal LIKE ?');
            $stmt -> execute (array($_POST['meal']));
            $rows = $stmt -> fetchALL();
            if(count($rows) == 0){
                print "No dishes available.";
            }else {
                print "<tr><td>Dish</td><td>Price</td></tr>";
                foreach ($rows as $row){
                    print "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
                     }
            print "</table>";
            }
        }else{
            print "Unknowun meal.";
        }
    ?>
</body>
</html>