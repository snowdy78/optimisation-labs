<?php
    require ("model.php");
    class MapPage extends Model {
        //Перекрытие значений атрибутоа родительского класса
        public $title = "Алтай-Тур - Карта сайта";
        public $description = "Алтай-Тур - Карта сайта";
        function display() {
            $this->displayTitle();
            $this->displayDescriptions();
            $this->displayStyles();
            $this->displayHeader();
            $this->displayMenu($this->buttons);
            $this->displayContent($this->filename);
            $this->displayFooter();
            }
    }
    $map = new MapPage();
    $map->filename = "view/sitemap.html";
    //Вызов метода родительского класса Model
    $map->display();


    ///
    // require("map/fileName.inc");
    // require("map/fileTitle.inc");
    // require("map/fileHTML.inc");
    // require("map/fileXML.inc");
    // $directory = $_SERVER['DOCUMENT_ROOT']."/www/hehe-site";
    // $f = new RecursiveIteratorIterator(
    //     new RecursiveDirectoryIterator()
    // );
    // $files_php = [];
    // foreach ($f as $files) {
    //     if (strpos($f->getSubPathName()), '.php') {
    //         array_push($files_php, $f->getSubPathName());
    //     }
    // }
    // $filter = array("map.php", "model.php", "index.php");
    // $files = array_values(array_diff($files_php, $filter));
    // foreach ($files as $keys => values) {
    //     echo $keys.$values."<br>";
    // }
?>
