<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('favicon.ico') }}"/>
    <title>Авторизация</title>
</head>

@vite(['resources/css/style.css'])
<body>
<!----------------------- Main Container -------------------------->
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <!----------------------- Login Container -------------------------->
    <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--------------------------- Left Box ----------------------------->
        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
             style="background: #103cbe;">
            <div class="featured-image mb-3">
                <img src="{{ asset('images/1.png') }}" class="img-fluid" style="width: 250px;" alt="image_view">
            </div>
            <p class="text-white fs-2" style="font-weight: 600;">Быть проверенным</p>
            <small class="text-white text-wrap text-center" style="width: 17rem;">Значит быть в безопасности</small>
        </div>
        <!-------------------------- Right Box ---------------------------->

        <div class="col-md-6 right-box">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Здравствуйте еще раз</h2>
                        <p>Введите свои учетные данные и вперед!</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="login" id="login" class="form-control form-control-lg bg-light fs-6"
                               placeholder="Логин">
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-5">
                        <input type="password" name="password" id="password"
                               class="form-control form-control-lg bg-light fs-6" placeholder="Пароль">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
