<?php
    require ("model.php");
    class ToursActivePage extends Model {
        private $buttons2 = array(
            "Туры по Алтаю" => "tours-altay.php",
            "Туры по России" => "tours-russia.php",
            "Активный отдых" => " tours-active.php"
        );
        // Перекрытие значений атрибутов родительского класса
        public $title = "Алтай-Тур - Активный отдых";
        public $description = "Алтай-Тур - Активный отдых";
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
    $ToursActiveObject = new ToursActivePage();
    $ToursActiveObject->filename = "view/services/tours-active.html";
    $ToursActiveObject->display();
?>
