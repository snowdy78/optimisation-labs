<?php
    //4. Гененрация файла sitemap.xml (Карта сайта для поисковых роботов)
    //4.1. Открываем файл для перезаписи
    $fp = fopen( "sitemap.xml", "w" ) or die ( "Не удалось открыть файл" );
    //4.2. Находим дату последнего изменения индексного файла
    $fileDateTime = date("Y-m-d", filemtime("index.php"));
    //4.3. Заголовок файла sitemap.xml
    $xml ="<?xml version='1.0' encoding='UTF-8'?>
        <urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>
        <url>
        <loc>http://localhost/optimisation-labs/index.php</loc>
        <lastmod>$fileDateTime</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
        </url>";
    //4.4. Записываем заголовок в файл
    fputs($fp,$xml);
    $url = "";
    //4.5. Обход файлов из Карты сайта: Ключ->Имя файла
    foreach($arr_asoc as $keys => $value) {
        $fileDateTime = date("Y-m-d", filemtime($keys));
        //4.6. Построчно записываем URL файлов
        fputs($fp,$url . "
            <url>
            <loc>http://localhost/www/mvc/$keys</loc>
            <lastmod>$fileDateTime</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
            </url>
        ");
    }
    //4.7. Дозаписываем закрывающий тег
    fputs($fp,"</urlset>");
    //4.8. Закрываем файл
    fclose($fp);
?>
