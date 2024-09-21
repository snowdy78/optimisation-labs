<?php
    require ("tour-model.php");
    class ToursActivePage extends TourModel {
        // Перекрытие значений атрибутов родительского класса
        public $title = "Алтай-Тур - Активный отдых";
        public $description = "Алтай-Тур - Активный отдых";
    }
    $ToursActiveObject = new ToursActivePage();
    $ToursActiveObject->filename = "view/services/tours-active.html";
    $ToursActiveObject->display();
?>
