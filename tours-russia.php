<?php
    require ("tour-model.php");
    class ToursRussiaPage extends TourModel {
        // Перекрытие значений атрибутов родительского класса
        public $title = "Алтай-Тур - Туры по России";
        public $description = "Алтай-Тур - Туры по России";
    }
    $ToursRussiaObject = new ToursRussiaPage();
    $ToursRussiaObject->filename = "view/services/tours-russia.html";
    $ToursRussiaObject->display();
?>
