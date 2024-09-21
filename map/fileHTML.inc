<?php
    //3. Запись/перезапись файла sitemap.html
    $filename = 'view/sitemap.html';
    $fd = fopen($filename, 'w+');
    $text =
        "<link rel='stylesheet' href='css/map.css'></head></body>\n
        <body><figure><h1>Карта сайта</h1><dl class='holiday'>";
    $text = $text . "\n<dt>Главная</dt><dd><ul><li><a href='index.php'>index.php</a></li></dd>";
    foreach ($arr_asoc as $keys => $value) {
        //Если составное имя файла с символом '-', то задаем иерархию
        if (strpos($keys,"-")) {
            $str1 = "<ul><ul><li>";
            $str2 = "</li></ul></ul>";
        } else {
            $str1 = "<ul><li>";
            $str2 = "</li></ul>";
        }
        $text = $text . "\n<dt>" . $value . "</dt><dd>".$str1."<a href='" . $keys .
            "'>".$keys."</a>".$str2."</dd>";
    }
    $text = $text . "\n</ul></dl></figure>";
    fwrite($fd, $text); //Пишем в файл view/map.html
    fclose($fd); //Закрываем файл
?>
