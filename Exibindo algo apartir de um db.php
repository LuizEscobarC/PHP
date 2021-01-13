<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //usa o banco de dados AQlite 'dinner.db'     
        $db = new PDO('sqlite:dinner.db');
        //define quais são as refeições permitidas
        $meals = array('breakfast', 'lunch', 'dinner');
        //verifica se o parametro "meal" enviado contém "breakfast", "lunch" ou "dinner"
        if(in_array($_POST['meal'], $meals)){
            //em caso afirmativo, obtém todas as iguarias servidas na refeição especifica
            $stmt = $db->prepare('SELECT dish, price FROM meals WHERE meal LIKE ?');
            $stmt -> execute (array($_POST['meal']));
            $rows = $stmt -> ferchALL();
            //se não forem  encontradas iguarias o banco de dados, informa isso
            if(count($rows) == 0){
                print "No dishes available.";
            }else {
                //exibe cada iguaria e seu preço como uma linha de ua tabela HTML 
                print "<tr><td>Dish</td><td>Price</td></tr>";
                foreach ($row as $row){
                    print "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
                     }
            print "</table>";
            }
        }else{
            //Essa mensageem será exibida se o paremetro "meal" enviado não contiver
            //"breakfasdt, "luch" ou "dinner"
            print "Unknowun meal.";
        }
    ?>
</body>
</html>