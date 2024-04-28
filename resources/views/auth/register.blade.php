<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
<style>
    body {
        background-image: url('{{ asset('images/register-background.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .headline{
        text-align: center;
        font-family: "Fresca", sans-serif;
        font-size: 27px;
    }
    .headline h1{
        color: transparent; /* Делаем текст прозрачным */
        -webkit-text-stroke: 2px #CEB7FF; /* Создаем обводку текста */
        display: inline-block; /* Преобразуем заголовок в блочный элемент */
        margin: 0; /* Убираем внешние отступы */
        padding: 0; /* Убираем внутренние отступы */
    }
    .container {
        margin-top: 80px;
        padding: 20px;
    }
    .row {
        margin-bottom: 10px; /* Добавлен отступ между рядами */
    }
    .col-md-4 {
        display: flex;
        align-items: center; /* Выравнивание текста по вертикали */
        color: white; /* Изменен цвет текста на белый */
    }
    .col-md-6 {
        display: flex;
        align-items: center; /* Выравнивание текста по вертикали */
    }
    .col-form-label {
        margin-right: 15px; /* Увеличен отступ справа для лейблов */
    }
    /* Новый стиль для оберток */
    .wrap {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .btn-create-account {
    background-color: #b59fff; /* Цвет фона кнопки */
    color: white; /* Цвет текста кнопки */
    padding: 10px 20px; /* Увеличение размера кнопки */
    border-radius: 5px; /* Закругление углов кнопки */
}
.btn-create-account-dark {
    background-color: #555555; /* Тёмно-серый цвет кнопки */
    color: white; /* Цвет текста кнопки */
    padding: 10px 20px; /* Увеличение размера кнопки */
    border-radius: 5px; /* Закругление углов кнопки */
    margin-left: 10px; /* Дополнительный отступ между кнопками */
}
    .form-control {
            background-color: rgba(206, 183, 255, 0.3); /* Цвет поля формы */
            border: none; /* Убираем границу */
            color: white; /* Цвет текста в полях формы */
            padding: 6px; /* Увеличение размера поля */
        }
        .form-control:focus {
            background-color: rgba(206, 183, 255, 0.5); /* Цвет поля формы при фокусе */
            color: white; /* Цвет текста в полях формы при фокусе */
            
        }
        .mb-3{
            display: flex;
            font-size: 30px;
            font-family: "Fresca", sans-serif;
        }
</style>
<div class="wrap">
    <div class="up-line">
        <img src="{{ asset('images/line.svg') }}" alt="">
    </div>

    <div class="headline">
        <h1>Регистрация</h1>
    </div>
    <div class="under-line">
        <img src="{{ asset('images/line.svg') }}" alt="">
    </div>

    <!-- Перемещенная форма -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    

                    <div class="card-body">
                        <form method="POST" action="{{ route('register')  }} ">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Никнейм') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Почта') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label class="error-mail" id="error-mail"></label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" required autocomplete="new-password">
                                    <label class="error-password1" id="error-password1"></label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Повторите пароль') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-create-account" id="submit-btn">
    {{ __('Создать аккаунт') }}
</button>
<button type="button" onclick="window.location.href='/login'" class="btn btn-create-account-dark">Уже есть аккаунт?</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- переделанный скрипт для почты и пароля -->
<script>
    const btn = document.getElementById('submit-btn');
    btn.addEventListener('click', function (evt) {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const errorMessage = document.getElementById('error-mail');
        const errorMessage1 = document.getElementById('error-password1');

        // Проверка почты
        const email = emailInput.value;
        const emailRegex = /^[a-zA-Z]+[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailRegex.test(email)) {
            evt.preventDefault();
            errorMessage.textContent = 'Некорректный адрес электронной почты';
        } else {
            errorMessage.textContent = '';
        }

        // Проверка пароля
        const password = passwordInput.value;
        const passwordRegex = /^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*]).*$/;
        if (!passwordRegex.test(password)) {
            evt.preventDefault();
            errorMessage1.textContent = 'Пароль должен содержать цифру, заглавную букву и специальный символ.';
        } else {
            errorMessage1.textContent = '';
        }
    });
</script>
</body>
</html>
