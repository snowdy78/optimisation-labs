<?php
    require("map/fileName.inc");
    require("map/fileTitle.inc");
    require("map/fileHTML.inc");
    require("map/fileXML.inc");
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
?>
