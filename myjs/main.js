function validateField(className, type) {
    let element = document.getElementById(className);
    let value = element.value;
    //Объект поля e-mail
    if (type === 'email') {
        //Если символ @ не найден в строке получаем -1
        if (value.indexOf('@') === -1) {
            //Добавляем подкласс об ошибке!
            element.classList.add('is-invalid');
            //Удаляем подкласс валидности!
            element.classList.remove('is-valid');
        } else {
            //Удаляем подкласс об ошибке!
            element.classList.remove('is-invalid');
            //Добавляем класс валидности
            element.classList.add('is-valid');
        }
    } else {
        if (!value) {
            //Добавляем подкласс об ошибке!
            element.classList.add('is-invalid');
            //Удаляем подкласс валидности!
            element.classList.remove('is-valid');
        } else {
            //Удаляем подкласс об ошибке!
            element.classList.remove('is-invalid');
            //Добавляем класс валидности
            element.classList.add('is-valid');
        }
    }
}
document.addEventListener("DOMContentLoaded", () => {
    //Получаем список элементов родителя
    let buttons = document.querySelector('button');
    //в 1 параметре - событие (щелчок по кнопке)
    //во 2 - анонимная функция с контекстом вызвавшим событие
    buttons.addEventListener('click', function (e) {
        //метод, предотвращающий реакцию по умолчанию
        e.preventDefault();
        //Значение из поля e-mail
        validateField('contact-email', 'email');
        validateField('contact-name');
    });
});