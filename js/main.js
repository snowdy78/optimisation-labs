//Управление кнопками Вход/Выход
function load(session) {
    console.log('loading...');
    let btn = document.getElementById("btn_modal_window");
    let out = document.getElementById("btn_out");
    if (session) {
        btn.style.display = "none";
        out.style.display = "block";
    } else {
        btn.style.display = "block";
        out.style.display = "none";
    }
}

//Слайдер на главной странице – запускаем всегда!
window.onload = function () {
    var modal = document.getElementById("my_modal");
    var btn = document.getElementById("btn_modal_window");
    var span = document.getElementById("close_modal");
    var out = document.getElementById("btn_out");
    modal.style.display = "none";
    out.onclick = function () {
        btn.style.display = "block";
        out.style.display = "none";
        document.location.href = "?exit";
    }
    btn.onclick = function () {
        modal.style.display = "block";
    }
    span.onclick = function () {
        modal.style.display = "none";
    }

    var idx = 0; // Индекс текущего слайда.

    //Массив картинок
    var total_img = document.getElementsByClassName('index-img');

    //Левая кнопка
    var slide_left = document.getElementById('btnLeft');
    //Правая кнопка
    var slide_right = document.getElementById('btnRight');
    function move(direction) {
        beforeMove();
        if (direction === 'left') {
            moveLeft();
        } else if (direction === 'right') {
            moveRight();
        }
    }
    function beforeMove() {
        // alert(idx);
    }
    function moveRight() {
        if (idx === total_img.length - 1) {
            slide_right.style.display = 'none';
            return;
        }
        slide_left.removeAttribute('style');
        total_img[idx].style.display = 'none'; // Скрываем текущий слайд
        // Увеличиваем индекс и показываем следующий слайд
        total_img[++idx].style.display = 'block';
        // Убираем "правую" стрелку, если справа слайдов больше нет
    }
    function moveLeft() {
        if (idx === 0) {
            slide_left.style.display = 'none';
            return;
        }
        slide_right.removeAttribute('style');
        total_img[idx].style.display = 'none';
        total_img[--idx].style.display = 'block';
    }

    //Обрабатываем событие - щелчок по правой кнопке    
    slide_right.addEventListener('click', () => move('right'));
    //Аналогично, только для левой стрелки
    slide_left.addEventListener('click', () => move('left'));

}