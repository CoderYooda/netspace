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

    {{-- header --}}

        @include('includes.header')

    {{-- end header --}}


    <div class="lk__offset">
        <div class="container">
            <div class="row lk__row">
                <div class="lk__menu">

                    {{-- tabs --}}
                    <div class="lk__menu-list">
                        <div class="lk__menu-item lk__menu-item_first">Лицевой счет</div>
                        <div class="lk__menu-item active">Добровольная блокировка</div>
                        <div class="lk__menu-item lk__menu-item_last">Статистика описаний</div>
                    </div>
                    {{-- end tabs --}}

                    <div class="lk__logout">
                        Выйти
                    </div>

                    {{-- user info --}}

                        @include('includes.user_info')

                    {{-- end user info --}}
                </div>

                {{-- content --}}

                <div class="lk__content lk__white">

                    <div class="lk__main-info lk__time-offset">
                        <h1 class="lk__h2">Текущий тариф</h1>

                        <p class="lk__main-info-text">
                            Таврово-800: 800.0 руб.
                        </p>

                        <button class="lk__btn">Поменять тариф</button>
                    </div>

                    <div class="lk__personal-account lk__time-offset">
                        <h1 class="lk__h2">Лицевой счет</h1>

                        <table class="lk__table">
                            <tr>
                                <td>Номер счета</td>
                                <td>83877373</td>
                            </tr>
                            <tr>
                                <td>Баланс</td>
                                <td>999</td>
                            </tr>
                            <tr>
                                <td>Договор</td>
                                <td>BH848DJJ</td>
                            </tr>
                        </table>

                        <h2 class="lk__h3">Состояние абонента</h2>

                        <table class="lk__table">
                            <tr>
                                <td>Статус</td>
                                <td>Новый</td>
                            </tr>
                            <tr>
                                <td>Тариф</td>
                                <td>Таврово-800: 800.0 руб.</td>
                            </tr>
                            <tr>
                                <td>Дата активации</td>
                                <td>2020-11-20 17:44:05.969100</td>
                            </tr>
                        </table>

                        <h2 class="lk__h3">Расходы в текущем месяце</h2>

                        <table class="lk__table">
                            <tr>
                                <td>Услуга из Таврово-800: Трафик (800.00 руб. Вх. 0.000 руб. Исх. 0.000 руб.)</td>
                                <td>180,65</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lk__block lk__time-offset">
                        <h1 class="lk__h2">Добровольная блокировка</h1>

                        <p class="lk__h4">
                            Стоимость услуги: 0
                        </p>

                        <div class="row lk__block-info">
                            <div class="lk__form-l3">
                                <div class="lk__input-wrap"> {{-- .lk_input_err при ошибке --}}
                                    <input type="text" class="lk__input">
                                    <label class="lk__label">Начало</label>

                                    <div class="lk__errors"> {{-- Добавить класс .show при ошибке --}}
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

                    <div class="lk__block">
                        <h1 class="lk__h2">Статистика списаний</h1>

                        <p class="lk__h4">
                            Фильтрация по датам
                        </p>

                        <div class="row lk__block-info">
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
                                    <button class="lk__btn lk__block-btn">Показать</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- end content --}}
            </div>
        </div>
    </div>


    {{-- footer --}}

    <div class="login-container login-footer">
        <div class="row">
            <div class="login-footer__copyright">© {{ now()->year }} NetSpace</div>

            <div class="login-footer__webstyle">
                <a href="https://webstyle.top/prodvizhenie-sajtov"
                   class="login-footer__webstyle-link"
                   title="Продвижение сайтов Белгород"
                   target="_blank"
                   rel="noopener"
                >
                    Продвижение сайтов
                </a>
                <a href="https://webstyle.top/"
                   class="login-footer__webstyle-link"
                   title="Создание сайтов Белгород"
                   target="_blank"
                   rel="noopener"
                >
                    <img src="/images/logo/webstyle_black.png" alt="Создание сайтов Webstyle" class="login-footer__webstyle-img">
                </a>
            </div>
        </div>
    </div>

    {{-- end footer --}}

</div>

<script async src="{{ mix('js/app.js') }}"></script>

</body>

