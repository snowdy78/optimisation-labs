<?php
    require ("model.php");
    class ToursAltayPage extends Model {
        private $buttons2 = array(
            "Туры по Алтаю" => "tours-altay.php",
            "Туры по России" => "tours-russia.php",
            "Активный отдых" => " tours-active.php"
        );
        // Перекрытие значений атрибутов родительского класса
        public $title = "Алтай-Тур - Туры по Алтаю";
        public $description = "Алтай-Тур - Туры по Алтаю";
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
    $ToursAltayObject = new ToursAltayPage();
    $ToursAltayObject->filename = "view/services/tours-altay.html";
    $ToursAltayObject->display();
?>
