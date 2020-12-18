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

                        {{-- Классы tabs, tab, tab-content не имеют стилей можно использовать для скрипта --}}
                        <div class="lk__tabs tabs">
                            <div class="lk__tab tab">Оплата услуг</div>
                            <div class="lk__tab tab active">История платежей</div>
                            <div class="lk__tab tab">Добровольная блокировка</div>
                            <div class="lk__tab tab lk__tab_last">Настройки</div>
                        </div>
                    </div>

                    <div class="lk__tab-content-wrap">

                        {{-- Оплата услуг --}}
                        <div class="lk__tab-content tab-content">

                            <h1 class="lk__h3 lk__underline">Оплата услуг</h1>

                            <div class="lk__payment-form">
                                <div class="form-group">
                                    <label class="lk__label">Плательщик</label>
                                    <input type="text" class="lk__input" value="Гончаренко Евгений Сергеевич">
                                </div>
                                <div class="form-group">
                                    <label class="lk__label">Телефон</label>
                                    <input type="tel" class="lk__input">
                                </div>
                                <div class="form-group">
                                    <button class="btn lk__payment-btn sber_icon">Оплатить через СБЕР</button>
                                </div>

                            </div>
                        </div>


                        {{-- История списаний --}}
                        <div class="lk__tab-content tab-content">

                            <h1 class="lk__h3 lk__underline">История списаний</h1>

                            <div class="row lk__form">
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <label class="lk__label">Начало</label>
                                        <input type="text" class="lk__input">


                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <label class="lk__label">Конец</label>
                                        <input type="text" class="lk__input">
                                        <div class="lk__errors">
                                            Необходимо заполнить
                                        </div>
                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <button class="lk__btn lk__block-btn">Отфильтровать</button>
                                </div>
                            </div>

                            <div class="lk__form-result">
                                <table class="lk__table">
                                    <thead>
                                        <tr>
                                            <td>Услуга</td>
                                            <td>Месяц</td>
                                            <td>Год</td>
                                            <td>Цена</td>
                                            <td>Единица измерения</td>
                                            <td>Сумма</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                Услуга из свой: Трафик (1000,00 руб. вх. 0,000 руб. исх. 0,000 руб.)
                                            </td>
                                            <td>август</td>
                                            <td>2020</td>
                                            <td class="lk__table-price">180 р.</td>
                                            <td>300,000 Мбит</td>
                                            <td class="lk__table-price">10000 р.</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>



                        {{-- История платежей --}}
                        <div class="lk__tab-content tab-content">

                            <h1 class="lk__h3 lk__underline">История платежей</h1>

                            <div class="row lk__form">
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <label class="lk__label">Начало</label>
                                        <input type="text" class="lk__input">
                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <label class="lk__label">Конец</label>
                                        <input type="text" class="lk__input">
                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <button class="lk__btn lk__block-btn">Отфильтровать</button>
                                </div>
                            </div>

                            <div class="lk__form-result">
                                <table class="lk__table">
                                    <thead>
                                    <tr>
                                        <td>Номер операции</td>
                                        <td>Дата операции</td>
                                        <td>Сумма</td>
                                        <td>Описание</td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>
                                            16267950
                                        </td>
                                        <td>2020-10-30 00:00:00</td>
                                        <td>10 000,00</td>
                                        <td>Текст</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>


                        {{-- Обещанный платеж --}}
                        <div class="lk__tab-content tab-content">
                            <h1 class="lk__h3">Обещанный платеж</h1>

                            <p class="lk__text-style">
                                <b>Действие вашего тарифа приостановлено</b>
                            </p>
                            <p class="lk__text-style">
                                Активирована услуга “Доверительный платеж”
                            </p>

                            <div class="lk__promised-offset">
                                <p class="lk__text-style"><b>Внимание!</b></p>
                                <p class="lk__text-style">
                                    <b>Услуга “Доверительный платеж” будет отключена через</b>
                                    <span class="lk__text-violet">3 дня</span>
                                </p>
                                <p class="lk__text-style">Пожалуйста пополните баланс</p>
                            </div>

                            <button class="btn lk__payment-btn sber_icon lk__promised-btn">Оплатить через СБЕР</button>
                        </div>

                        <div class="lk__tab-content tab-content">
                            <h1 class="lk__h3">Личные данные</h1>

                             <div class="row lk__personal-info">
                                <div class="lk__form-l5">
                                    <div class="lk__input-wrap">
                                        <label class="lk__label">Телефон</label>
                                        <input type="tel" class="lk__input">
                                    </div>
                                </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap">
                                         <label class="lk__label">Имя</label>
                                         <input type="text" class="lk__input">
                                     </div>
                                 </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap">
                                         <label class="lk__label">E-mail</label>
                                         <input type="email" class="lk__input">
                                     </div>
                                 </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap">
                                         <label class="lk__label">Фамилия</label>
                                         <input type="text" class="lk__input">
                                     </div>
                                 </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap">
                                         <label class="lk__label">Адрес</label>
                                         <input type="text" class="lk__input">
                                     </div>
                                 </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap">
                                         <label class="lk__label">Отчество</label>
                                         <input type="text" class="lk__input">
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

