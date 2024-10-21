<?php
    function getLocation() {
        //Откуда пришел пользователь - имя файла
        $filelink = basename($_SERVER['HTTP_REFERER']);
        //Получаем подтверждение получения имени файла
        $fpos = strripos($filelink, '.php');
        
        $links = '/optimisation-labs/';
        $links = $links . ($fpos ? $filelink : '');

        return $links; 
    }
    function start_session() {
        session_start();
        //Выход -> удаление сессии
        if (isset($_GET['exit'])) {
            session_destroy();

            header('Location:' . getLocation());
            exit;
        }
    }
?>
