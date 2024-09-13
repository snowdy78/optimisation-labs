<?php
    require ("model.php");
    class ContactPage extends Model {
        //Перекрытие значений атрибутоа родительского класса
        public $title = "Алтай-Тур - Контакты";
        public $description = "Алтай-Тур - Контакты";
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
    $contact = new ContactPage();
    $contact -> filename = "view/contact.html";
    //Вызов метода родительского класса Model
    $contact -> Display();
?>
