<?php
    require ("model.php");
    class TourModel extends Model {
        protected $buttons2 = array(
            "Туры по Алтаю" => "tours-altay.php",
            "Туры по России" => "tours-russia.php",
            "Активный отдых" => "tours-active.php",
        );
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
?>