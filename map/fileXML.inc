//2. Поочередное открытие файлов и поиск подстроки Title
for($i=0; $i<count($files); $i++) {
//2.1. Имя файла
$namefile = $files[$i];
//2.2. Получаем соджержимое файла
$res = file_get_contents($files[$i]);
//2.3. Парсим (ищем) подстроку Title
if (preg_match("/Алтай-Тур .*?[\"]/", $res, $titles)==1){
//5.3. Записываем Ключ=>Имя файла, Значение=>Заголовок
//SubStr - удалим последний символ (кавычки) "
$arr_asoc[$namefile] =substr_replace($titles[0],"", -1);
}
}
//Контроль: Вывод массива Ключ=>Значение
foreach($arr_asoc as $keys => $value) {
echo $keys . $value . "<br>";
}
//3. Запись/перезапись файла sitemap.html
$filename = 'view/sitemap.html';
$fd = fopen($filename, 'w+') or die("не удалось создать файл");
$text =
"<link rel='stylesheet' href='css/map.css'></head></body>\n
<body><figure><h1>Карта сайта</h1><dl class='holiday'>";
$text = $text . "\n<dt>Главная</dt><dd><ul><li>
<a href='index.php'>index.php</a></li></dd>";
foreach($arr_asoc as $keys => $value) {
    //Если составное имя файла с символом '-', то задаем иерархию
    if (strpos($keys,"-")) {
        $str1 = "<ul><ul><li>";
        $str2 = "</li></ul></ul>";
    } else {
        $str1 = "<ul><li>";
        $str2 = "</li></ul>";
    }
    $text = $text . "\n<dt>" . $value . "</dt><dd>".$str1."<a href='".$keys."'>".$keys."</a>".$str2."</dd>";
}
$text = $text . "\n</ul></dl></figure>";
fwrite($fd, $text); //Пишем в файл view/map.html
fclose($fd); //Закрываем файл
