<?php

    //2. Поочередное открытие файлов и поиск подстроки Title
    for($i = 0; $i < count($files); $i++) {
        //2.1. Имя файла
        $namefile = $files[$i];
        //2.2. Получаем соджержимое файла
        $res = file_get_contents($files[$i]);
        //2.3. Парсим (ищем) подстроку Title
        if (preg_match("/Алтай-Тур .*?[\"]/i", $res, $titles) == 1){
            //5.3. Записываем Ключ=>Имя файла, Значение=>Заголовок
            //SubStr - удалим последний символ (кавычки) "
            $arr_asoc[$namefile] = substr_replace($titles[0],"", -1);
        }
    }
    //Контроль: Вывод массива Ключ=>Значение
    // foreach($arr_asoc as $keys => $value) {
    //     echo $keys . $value . "<br>";
    // }
    
?>