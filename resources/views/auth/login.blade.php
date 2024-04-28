<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
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
            color: transparent;
            -webkit-text-stroke: 2px #CEB7FF;
            display: inline-block;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 80px;
            padding: 20px;
        }
        .row {
            margin-bottom: 10px;
        }
        .col-md-4 {
            display: flex;
            align-items: center;
            color: white;
        }
        .col-md-6 {
            display: flex;
            align-items: center;
        }
        .col-form-label {
            margin-right: 15px;
        }
        .wrap {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .btn-create-account {
            background-color: #b59fff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-create-account-dark {
            background-color: #555555;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-left: 10px;
        }
        .form-control {
            background-color: rgba(206, 183, 255, 0.3);
            border: none;
            color: white;
            padding: 6px;
        }
        .form-control:focus {
            background-color: rgba(206, 183, 255, 0.5);
            color: white;
        }
        .error-message {
            color: red;
        }
        .mb-3{
            display:flex;
            font-size: 30px;
            font-family: "Fresca", sans-serif;
            color: white;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="up-line">
        <img src="{{ asset('images/line.svg') }}" alt="">
    </div>

    <div class="headline">
        <h1>Вход</h1>
    </div>
    <div class="under-line">
        <img src="{{ asset('images/line.svg') }}" alt="">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email адрес') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <span class="error-message" id="error-message"></span>

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Запомнить меня') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-create-account">
                                        {{ __('Войти') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Забыли пароль?') }}
                                        </a>
                                    @endif
                                    <button onclick="window.location.href='/register'" class="btn btn-create-account-dark">Регистрация</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const emailInput = document.getElementById('email');
    const errorMessage = document.getElementById('error-message');

    emailInput.addEventListener('input', function () {
        const email = emailInput.value;
        const emailRegex = /^[a-zA-Z]+[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if (!emailRegex.test(email)) {
            errorMessage.textContent = 'Некорректный адрес электронной почты';
        } else {
            errorMessage.textContent = '';
        }
    });
</script>
</body>
</html>

