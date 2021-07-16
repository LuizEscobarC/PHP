<?php
$dir = __DIR__ . "/arquivos";
$file = __DIR__ . "/file.txt";
if (file_exists($dir) || is_dir($dir)) {
    if (file_exists($file) || is_file($file)) {
        $fileOpen = fopen($file, "r");
        $dataFile = file_get_contents($file);
        mb_parse_str($dataFile, $arrParse);

        $html = <<<HTML
            <article>
                 <h1>{{nome}}</h1>
                 <p>{{sobrenome}}<br>
                 <a href="{{email}}">{{email}}</a>
                 </p>   
            </article>
HTML;

        $dataImplode = "{{" . implode("}}&{{", array_keys($arrParse)) . "}}";

        echo $newDataFile = str_replace(
            explode("&", $dataImplode),
            array_values($arrParse),
            $html
        );

        rename($file, __DIR__ . "/arquivos/" . time() . "." . pathinfo($file)['extension']);

        $dirFiles = array_diff(scandir($dir), ['..', '.']);
        $dirCount = count($dirFiles);

        if ($dirCount > 5) {
            foreach ($dirFiles as $fileItem) {
                $fileItem = __DIR__ . "/arquivos/{$fileItem}";
                if (file_exists($fileItem) && is_file($fileItem)) {
                    unlink($fileItem);
                } else {
                    echo "<p>Erro ao excluir o arquivo</p>";
                }
            }
        } else {
            for ($i = 1; $i <= $dirCount; $i++) {
                echo "<p>Temos {$i} arquivo(s)</p>";
            }
        }
        fclose($fileOpen);
        echo "<a href='getdate.php'>gerar um novo arquivo</ahref>";

    } else {
        $fileOpen = fopen($file, 'w');
        $arrayData = [
            'nome' => 'luiz',
            'sobrenome' => 'escobar',
            'email' => 'luiz@gmail.com'
        ];
        $dataHttp = http_build_query($arrayData);
        fwrite($fileOpen, $dataHttp);
        fclose($fileOpen);
        echo "<script>
                      alert('Criando um arquivo Article novo no diretório raiz...' +
                            ' Clique em atualizar');
                      window.location.reload();
               </script>";


    }
} else {
    mkdir($dir, 0755);
}