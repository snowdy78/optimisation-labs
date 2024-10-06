// создание ajax-объекта с поддержкой браузеров
function createRequestObject() {
    //Gecko-совместимые браузеры, Safari, Konqueror
    try {
        //создание объекта
        return new XMLHttpRequest();
    } catch (e) {
        // запрос бросает исключение
        //Internet explorer
        try {
            return new ActiveXObject('Msxml2.XMLHTTP')
        } catch (e) {
            //Internet explorer
            try { return new ActiveXObject('Microsoft.XMLHTTP') }
            catch (e) { return null; }
        }
    }
}
//сюда передаем ссылку
function linkcontent(link, content_selector, loading_text = "loading text") {
    //Получаем ID контента
    let contents = document.body.querySelectorAll(content_selector);
    //получить HTML-содержимое элемента в виде строки "Идет загрузка.."
    for (let content of contents) {
        //Создаем объект Ajax
        content.innerHTML = loading_text;
        let http = createRequestObject();
        //если объект создан 
        if (http) {
            //Созданный объект инициализирует новый запрос
            //Параметры: метод GET, ссылка
            http.open('get', link);
            //задаётся обработчик, который вызывается при смене статуса объекта
            http.onreadystatechange = function () {
                //readyState — число, обозначающее статус объекта
                //4 - объект инициализирован, получен ответ от сервера
                if (http.readyState == 4) {
                    //представление ответа сервера в виде текста
                    content.innerHTML = http.responseText;
                }
            }
            http.send(null);
            delete http;
        }
        else {
            document.location = link;
        }
    }
} //end function