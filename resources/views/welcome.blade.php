<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SFU Game Space</title>

    <!-- Подключение стилей и скриптов Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fresca&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body>


<!-- Добавление слайдера с баннерами турниров -->


<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        on: {
            slideChange: function () {
                // Вызывайте код, который должен выполняться при смене слайда
            },
        },
    });
</script>
<style>
    body {
        background-image: url('{{ asset('images/home.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        margin: 0; /* Убираем внешние отступы */
    }
    .headline {
        text-align: center;
        font-family: "Fresca", sans-serif;
        font-size: 27px;
    }
    .subtitle{
        text-align: center;
        font-family: "Fresca", sans-serif;
        font-size: 35px;
    }
    .up-line, .under-line{
        text-align:center;
    }
    .up-line img {
        padding-top: 40px; /* Опустить верхнюю линию на 10px */
    }
    .under-line img {
        padding-bottom: 20px; /* Поднять нижнюю линию на 10px */
    }
    .headline h1{
        color: transparent; /* Делаем текст прозрачным */
        -webkit-text-stroke: 2px #CEB7FF; /* Создаем обводку текста */
        display: inline-block; /* Преобразуем заголовок в блочный элемент */
        margin: 0; /* Убираем внешние отступы */
        padding: 0; /* Убираем внутренние отступы */
    }
    .subtitle h2{
        color: transparent; /* Делаем текст прозрачным */
        -webkit-text-stroke: 0.2px #CEB7FF; /* Создаем обводку текста */
        display: inline-block; /* Преобразуем заголовок в блочный элемент */
        margin: 0; /* Убираем внешние отступы */
        padding: 0; /* Убираем внутренние отступы */
        margin-top: 20px;
    }
    .start{
        text-align:center;
        font-size:30px;
        font-family: "Fresca", sans-serif;
    }
    .start h2{
        color: transparent; /* Делаем текст прозрачным */
        -webkit-text-stroke: 1px #CEB7FF; /* Создаем обводку текста */
        display: inline-block; /* Преобразуем заголовок в блочный элемент */
    }
    .left-corner {
        position: absolute;
        top: 305px;
        left: 500px;
    }
    .right-corner {
        position: absolute;
        bottom:335px;
        right: 500px;
    }
    .button{
        margin-top: 30px;
    }
    a{
        text-decoration: none;
        color: transparent; /* Делаем текст прозрачным */
        -webkit-text-stroke: 1px #CEB7FF; /* Создаем обводку текста */
        display: inline-block; /* Преобразуем заголовок в блочный элемент */
    }
    nav {
        position: absolute; /* Устанавливаем абсолютное позиционирование */
        top: 50%; /* Позиционируем по вертикали по центру */
        left: 0; /* Размещаем по левому краю страницы */
        transform: translateY(-50%); /* Сдвигаем на половину высоты элемента вверх, чтобы центрировать относительно вертикальной оси */
        font-family: "Fresca", sans-serif;
        font-size: 20px;
        display: flex; /* Размещаем элементы в строку */
        flex-direction: column; /* Выстраиваем элементы вертикально */
        gap: 10px; /* Расстояние между элементами */
    }
    nav a {
        margin-left: 12px;
        color: #CEB7FF; /* Цвет текста */
        text-decoration: none; /* Убираем подчеркивание у ссылок */
    }
</style>




<div class="up-line">
    <img src="{{ asset('images/line.svg') }}" alt="">
</div>

<div class="headline">
    <h1>Открой вселенную побед</h1>
</div>
<div class="under-line">
    <img src="{{ asset('images/line.svg') }}" alt="">
</div>
<div class="subtitle">
    <h2>Game Space</h2>
</div>
<div class="button">
    <div class="left-corner">
        <img src="{{asset('images/left-corner.svg')}}" alt="">
    </div>
    <div class="start">
        <h2><a href="/tournaments">Принять участие</a></h2>
    </div>
    <div class="right-corner">
        <img src="{{asset('images/right-corner.svg')}}" alt="">
    </div>
</div>
<nav>
    <a href="/games"> <img src="{{asset('images/gamepad.svg')}}"></i> </a>
    @if (Auth::check())
    <a href="/user"><img src="{{asset('images/address-card.svg')}}"></a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{asset('images/door.svg')}}"></a> <!-- Ссылка на выход -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    @else
    <a href="/register"><img src="{{asset('images/user.svg')}}"></a>
    @endif
    
</nav>
</body>
</html>
