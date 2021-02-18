<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     //validação de strings
     //função trim() remove os espaços em branco do começo e do final
     //função strlen() informa o tamanho da string
     //função strcasecmp() ignora as caixas das letras na comparação
     // função strtolower() retorna a string minuscula
     // função strtoupper() retorna astring maiuscula 
     // função ucwords() retorna a string com a primara letra de cada palavra maiúscula
     // função subtr() estrai apenas uma parte da string
     // função str_replace() altera partes de uma string

         /*verificando o tamanho de uma string  reduzida*/

        //$_POST['zipcode'] contém o valor do parâmetro
        // "zipcode" enviado no formulário
        $zipcode = trim($_POST['zipcode']);
        //Agora $zipcode comtém esse valor, mas qualquer espaço inicial ou final foi removido
        $zip_lenght = strlen($zipcode);
        //Avisa se o código postal não tiver cinco caracteres
        if ($zip_lenght !=5 ){
            print 'please enter a zip code that is 5 characters long.';
        }

        // esse outro código faz a mesma coisa
        if (strlen(trim($_POST['zipcode'])) != 5){
            print 'please enter a zip zode that is 5 characters long.';
        }

            /*Comparando strings com == */
            if($_POST['email'] == 'presidente@hotmail.com'){
                print 'Welcome back, BR presidente';
            }
            //comparando sem se preocupar com a caixa alta ou baixa
                //retorna 0 se forem iguais
            if(strcasecmp($_POST['email'], 'presidente@hotmail.com') == 0 ){
                print 'Welcome back, BR presidente';
            }
                /*Formatando strings e numeros*/
                
                //preenchimento com zeros

                $zip = '6520';
                $month = 2;
                $day = 6;
                $year = 2007;

                printf (" ZIP is %05d and the date is %02d/%02d/%d", $zi, $month, $day, $year);
                // exibindo sinais
                $min = -40;
                $max = 40;
                printf("the computer can operate between %+d and %+d degrees Celsius.", $min, $max);
                    /*Alterando caixa de letras */
                    print strtolower('Beef, CHIKEN, Pork, duCK');
                    print strtoupper('Beef, CHIKEN, Pork, duCK');
                    
                    // retorna nome corretamente formatado
                    print ucwords(strtolower('LUIZ PAULO'));

                    //Utilizando a função substr() 
                    print substr($_POST['comments'], 0, 30);
                    print'...';
                    //se a paramentro inicial for negativo ela começa de trás pra frente.
                    print 'Card: XX';
                    print substr($_POST['card'], -4, 4); //se omitir o ultimo parametro ela retorna toda string.

                        //Usando str_replace()
                        $html = '<span class="{class}">Fried Bran Curd<span>
                        <spanclass="{class}">Oil-Soaked Fish<\span>';
                        print str_replace('{class}', $my_class, $html);


    ?>
</body>
</html>