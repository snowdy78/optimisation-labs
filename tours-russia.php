<?php
    require ("model.php");
    class ToursRussiaPage extends Model {
        private $buttons2 = array(
            "Туры по Алтаю" => "tours-altay.php",
            "Туры по России" => "tours-russia.php",
            "Активный отдых" => " tours-active.php"
        );
        // Перекрытие значений атрибутов родительского класса
        public $title = "Алтай-Тур - Туры по России";
        public $description = "Алтай-Тур - Туры по России";
        function display() {
            $this->displayTitle();
            $this->displayDescriptions();
            $this->displayStyles();
            $this->displayHeader();
            $this->displayMenu($this->buttons);
            $this->displayMenu($this->buttons2);
            $this->displayContent($this->filename);
        $this->displayFooter();
        }
    }
    $ToursRussiaObject = new ToursRussiaPage();
    $ToursRussiaObject->filename = "view/services/tours-russia.html";
    $ToursRussiaObject->display();
?>
