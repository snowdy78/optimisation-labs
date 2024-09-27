
//Слайдер на главной странице – запускаем всегда!
window.onload = function () {
    var idx = 0; // Индекс текущего слайда.

    //Массив картинок
    var total_img = document.getElementsByClassName('index-img');

    console.log(total_img);
    //Левая кнопка
    var slide_left = document.getElementById('btnLeft');
    //Правая кнопка
    var slide_right = document.getElementById('btnRight');
    //Обрабатываем событие - щелчок по правой кнопке
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
    slide_right.addEventListener('click', () => move('right'));
    //Аналогично, только для левой стрелки
    slide_left.addEventListener('click', () => move('left'));

}