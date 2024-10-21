<?php
    include_once "session.php";
    if (isset($_POST['userid']) && isset($_POST['password']) && !isset($_SESSION['valid_user'])) {
        //Аутентификация (попытка)
        $userid = $_POST['userid'];
        $password = sha1($_POST['password']);
        $mysql = new mysqli('localhost', 'root', '', 'auth');
        if (mysqli_connect_errno()) {
            echo 'Невозможно подключиться к базе данных: ' . mysqli_connect_error();
            exit;
        }
        $query = "SELECT groups, role FROM authorised_users WHERE name='$userid' and password='$password'";
        //возвращает набор результатов "ОбъектБД,Запрос"
        $result = mysqli_query($mysql, $query);
        if (!$result) {
            echo 'Ошибка: Невозможно выполнить запрос.';
            exit;
        }
        //Получение количество найденных записей
        $row = mysqli_num_rows($result);
        //Если хоть одна найдена, то $row=1 (true)
        if ($row) {
            //Получение ассоциативного массива из найденной строки
            $d = mysqli_fetch_array($result, MYSQLI_ASSOC);
            //Если найден, регистрируем его идентификатор (группу)
            $_SESSION['valid_user'] = strval($d['groups']);
            // Закрытие набора данных
            $result->close();
        }//end row
        $mysql->close();
        if (isset($_SESSION['valid_user'])) {
            //Откуда пришел пользователь - имя файла
            header('Location:' . getLocation());
        } else {
            // Была предпринята неудачная попытка зарегистрироваться
            echo 'Указан неверный Логин или Пароль.<br />';
            echo "<p><a href='../../index.php'>На главную</a></p>";
        } //end if
    } //end isset
    // Форма для входа в систему
    else if (!isset($userid)) {
        include_once "form.php";
        echoSignInForm();

    }
?>