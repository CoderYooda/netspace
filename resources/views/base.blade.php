<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Личный кабинет</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

</head>
<body class="login-wrap lk">

<div class="wrapper">

    @include('includes.header')

    <div class="lk__offset">
        <div class="container">
            <div class="row lk__row">

                @include('includes.sidebar')

                <div class="lk__content">

                    <div class="lk__tabs-wrap"> {{-- Эта обертка для адаптива --}}
                        <div class="lk__tabs tabs">
                            <div class="lk__tab">Оплата услуг</div>
                            <div class="lk__tab active">История платежей</div>
                            <div class="lk__tab">Добровольная блокировка</div>
                            <div class="lk__tab lk__tab_last">Настройки</div>
                        </div>
                    </div>

                    <div class="lk__tab-content-wrap">

                        {{-- Оплата услуг --}}
                        <div class="lk__tab-content tab-content">

                            <h1 class="lk__h3 lk__underline">Оплата услуг</h1>

                            <p class="lk__payment-text">
                                Рекомендуемый платеж: <b>999 руб.</b>
                            </p>

                            <button class="lk__btn">Оплатить</button>
                        </div>

                        {{-- История платежей --}}
                        <div class="lk__tab-content tab-content">

                            <h1 class="lk__h3 lk__underline">История платежей</h1>

                            <div class="row">
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap lk_input_err"> {{-- .lk_input_err при ошибке --}}
                                        <input type="text" class="lk__input">
                                        <label class="lk__label">Начало</label>

                                        <div class="lk__errors show"> {{-- Добавить класс .show при ошибке --}}
                                            Необходимо заполнить
                                        </div>
                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <input type="text" class="lk__input">
                                        <label class="lk__label">Конец</label>
                                        <div class="lk__errors">
                                            Необходимо заполнить
                                        </div>
                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <button class="lk__btn lk__block-btn">Показать</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Добровольная блокировка --}}
                        <div class="lk__tab-content tab-content">
                            <h1 class="lk__h3 lk__underline">Добровольная блокировка</h1>

                            <p class="lk__h4">
                                Стоимость услуги: 0
                            </p>

                            <div class="row">

                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <input type="text" class="lk__input">
                                        <label class="lk__label">Начало</label>

                                        <div class="lk__errors">
                                            Необходимо заполнить
                                        </div>
                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <input type="text" class="lk__input">
                                        <label class="lk__label">Конец</label>
                                        <div class="lk__errors">
                                            Необходимо заполнить
                                        </div>
                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <button class="lk__btn lk__block-btn">Заблокировать</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Настройки --}}
                        <div class="lk__tab-content tab-content">
                            <h1 class="lk__h3 lk__underline">Настройки</h1>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('includes.footer')

</div>

<script async src="{{ mix('js/app.js') }}"></script>

</body>

