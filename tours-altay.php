<?php
    require ("tour-model.php");
    class ToursAltayPage extends TourModel {
        // Перекрытие значений атрибутов родительского класса
        public $title = "Алтай-Тур - Туры по Алтаю";
        public $description = "Алтай-Тур - Туры по Алтаю";
    }
    $ToursAltayObject = new ToursAltayPage();
    $ToursAltayObject->filename = "view/services/tours-altay.html";
    $ToursAltayObject->display();
?>
