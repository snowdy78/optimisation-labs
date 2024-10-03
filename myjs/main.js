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
function addValidationOnButtonClick() {
    let buttons = document.querySelector('button');
    if (buttons) {
        //в 1 параметре - событие (щелчок по кнопке)
        //во 2 - анонимная функция с контекстом вызвавшим событие
        buttons.addEventListener('click', function (e) {
            //метод, предотвращающий реакцию по умолчанию
            e.preventDefault();
            //Значение из поля e-mail
            validateField('contact-email', 'email');
            validateField('contact-name');
        });
    }
}
function switchSignMode() {
    let sign_form = document.getElementById('sign-form');
    let ul = document.getElementById('sign-ul');

    if (sign_form.classList.contains('hidden-element')) {
        ul.classList.add('hidden-element');
        sign_form.classList.remove('hidden-element');
    } else if (ul.classList.contains('hidden-element')) {
        sign_form.classList.add('hidden-element');
        ul.classList.remove('hidden-element');
    }
}
document.addEventListener("DOMContentLoaded", () => {
    //Получаем список элементов родителя
    addValidationOnButtonClick();

    let sign_button = document.getElementById('sign-btn');

    sign_button.addEventListener('click', switchSignMode);

    let form_sign_button = document.getElementById('out-btn');
    form_sign_button.addEventListener('click', switchSignMode);
});
