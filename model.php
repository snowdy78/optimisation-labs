<?php
    class Model
    {
            public $content;
            public $filename;
            public $title = "ООО \"Алтайское туристическое агенство\"";
            public $description = "Агенство Алтай-Тур Барнаул";
            public $buttons = array(
                "Главная" => "index.php",
                "Контакты" => "contact.php",
                "Услуги" => "services.php",
                "Карта сайта" => "map.php"
            );
            public function display()
            {
                $this->displayTitle(); //Название веб-страницы
                $this->displayDescriptions();//Мета-тег содержания веб-страницы
                $this->displayStyles();//Стиль оформления
                $this->displayHeader();//Заголовок
                $this->displayMenu($this->buttons);//Панель меню
                $this->displayContent($this->filename); //Контент
                $this->displayFooter(); //Подвал
            }
            public function displayTitle()
            {
                echo "<!DOCTYPE html><html>\n<head>\n<meta charset='UTF-8'>\n";
                echo "<title>".$this->title."</title>";
            }
            public function displayDescriptions()
            {
                echo "\n<meta name=\"description\"
                content=\"".$this->description."\" />";
            }
            public function displayStyles()
            {
                ?>
                    <link rel="stylesheet" type="text/css" href="css/style.css">
                    </head><body>
                <?php
            }
        public function displayHeader()
        {
            require('view/header.html'); //Открываем файл в любом случае
        }
        public function displayMenu($buttons)
        {
            echo "<table width=\"100%\" bgcolor=\"white\""."cellpadding=\"4\" cellspacing=\"4\">\n";
            echo "<tr>\n";
            // Вычисление значения кнопки 100/количество
            $width = 100/count($buttons);
            //Получаем ключ и значение массива кнопок
            //И определяем текущий элемент Меню
            foreach($buttons as $name => $url)
            {
                $this -> displayButton($width, $name, $url, !$this->urlCurrentPage($url));
            }
            echo "</tr></table>\n";
        }
        protected function urlCurrentPage($url)
        {
            //Если подстрока элемента массива кнопок НЕ входит в текущую ссылку
            if(strpos($_SERVER['PHP_SELF'], $url) == false)
            {
                return false; // возврат False
            }
            else
            {
                return true; // возврат True
            }
        }
        protected function displayButton($width, $name, $url, $active = true)
        {
            if ($active)
            { //Для всех прочих - ставим крестик(код UTF8) и указываем ссылку!
                echo "<td width =\"".$width."%\"> &#10062;" .
                "<a href=\"".$url."\"><span class=\"menu\">".$name."</span></a>" .
                "</td>";
            }
            else
            { //Активный (выделен пользователем) - ставим галочку и убираем ссылку!
                echo "<td width =\"".$width."%\">&#9989;"."<span class=\"menu\">".$name."</span></td>";
            }
        }
        public function displayContent($fil) { //Подгружаем контент
            $filename = $fil;
            //Читаем файл
            $myfile = fopen($filename, "r") or die("Не удается открыть файл!");
            $content = fread($myfile, filesize($filename));
            fclose($myfile);
            echo $this->content=$content; //Публикуем контекст -> Атрибут класса = Значение
        }
        public function displayFooter() {
            require('view/footer.html'); //Открываем файл в любом случае
        }
    }
?>
