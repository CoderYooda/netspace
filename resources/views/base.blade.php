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

    <link rel="stylesheet" href="/css/app.css" />
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

                        {{-- Если это компьютер .active добавлять к .lk__tab при размере экрана меньше 655px .active добавлять .tab  --}}
                        <div class="lk__tabs tabs">

                            <div class="lk__tab tab">Оплата услуг</div>

                            <div class="lk__tab active p_rel">
                                <div class="lk__tab-mobile">Финансы</div>

                                <div class="lk__tab_icon"></div>

                                <div class="tab-dropdown_mask">
                                    <div class="tab-dropdown">
                                        <div class="tab tab-dropdown__item">История списаний</div>
                                        <div class="tab tab-dropdown__item">История платежей</div>
                                    </div>
                                </div>
                            </div>

                            <div class="lk__tab tab">Обещанный платеж</div>

                            <div class="lk__tab lk__tab_last p_rel">
                                <div class="lk__tab-mobile">Настройки</div>

                                <div class="lk__tab_icon"></div>

                                <div class="tab-dropdown_mask">
                                    <div class="tab-dropdown">
                                        <div class="tab tab-dropdown__item">Личные данные</div>
                                        <div class="tab tab-dropdown__item">Смена пароля</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="lk__tab-content-wrap">

                        {{-- Оплата услуг --}}
                        <div class="lk__tab-content tab-content">

                            <h1 class="lk__h3 lk__underline">Оплата услуг</h1>

                            <div class="lk__payment-form">
                                <div class="lk__input-wrap form-group input_error"> {{-- классу lk__input-wrap добавляем .input_error при ошибке --}}
                                    <label for="ps_name" class="lk__label">Плательщик</label>
                                    <input type="text"
                                           id="ps_name"
                                           name="name"
                                           class="lk__input"
                                           value="Гончаренко Евгений Сергеевич"
                                    >

                                    <div class="lk__errors">
                                        Ошибка
                                    </div>
                                </div>
                                <div class="lk__input-wrap form-group">
                                    <label for="ps_phone" class="lk__label">Телефон</label>
                                    <input type="tel" id="ps_phone" name="phone" class="lk__input">

                                    <div class="lk__errors">
                                        Ошибка
                                    </div>
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
                                        <label for="hs_start" class="lk__label">Начало</label>
                                        <input type="text" id="hs_start" name="start" class="lk__input">

                                        <div class="lk__errors">
                                            Ошибка
                                        </div>
                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <label for="hs_end" class="lk__label">Конец</label>
                                        <input type="text" id="hs_end" name="end" class="lk__input">

                                        <div class="lk__errors">
                                            Ошибка
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
                                                <td class="td-nowrap">
                                                    Ед<span class="mobile_show">.</span><span class="mobile_hide">иница</span> измерения
                                                </td>
                                                <td>Сумма</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="lk__lable-name">
                                                    <div class="lk__lable-name-mobile">Услуга</div>
                                                    Услуга из свой: Трафик (1000,00 руб. вх. 0,000 руб. исх. 0,000 руб.)
                                                </td>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Месяц</div>
                                                    август
                                                </td>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Год</div>
                                                    2020
                                                </td>
                                                <td class="td-nowrap">
                                                    <div class="lk__lable-name-mobile">Цена</div>
                                                    180 р.
                                                </td>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Единица измерения</div>
                                                    300,000 Мбит
                                                </td>
                                                <td class="td-nowrap">
                                                    <div class="lk__lable-name-mobile">Сумма</div>
                                                    10000 р.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="lk__lable-name">
                                                    <div class="lk__lable-name-mobile">Услуга</div>
                                                    Услуга из свой: Трафик (1000,00 руб. вх. 0,000 руб. исх. 0,000 руб.)
                                                </td>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Месяц</div>
                                                    август
                                                </td>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Год</div>
                                                    2020
                                                </td>
                                                <td class="td-nowrap">
                                                    <div class="lk__lable-name-mobile">Цена</div>
                                                    180 р.
                                                </td>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Единица измерения</div>
                                                    300,000 Мбит
                                                </td>
                                                <td class="td-nowrap">
                                                    <div class="lk__lable-name-mobile">Сумма</div>
                                                    10000 р.
                                                </td>
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

                                        <div class="lk__errors">
                                            Ошибка
                                        </div>
                                    </div>
                                </div>
                                <div class="lk__form-l3">
                                    <div class="lk__input-wrap">
                                        <label class="lk__label">Конец</label>
                                        <input type="text" class="lk__input">

                                        <div class="lk__errors">
                                            Ошибка
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
                                        <td>Номер операции</td>
                                        <td>Дата операции</td>
                                        <td>Сумма</td>
                                        <td>Описание</td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @for ($i = 0; $i < 10; ++$i)
                                            <tr>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Номер операции</div>
                                                    16267950
                                                </td>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Дата операции</div>
                                                    2020-10-30 00:00:00
                                                </td>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Сумма</div>
                                                    10 000,00
                                                </td>
                                                <td>
                                                    <div class="lk__lable-name-mobile">Описание</div>
                                                    Текст
                                                </td>
                                            </tr>
                                        @endfor
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

                        {{-- Личные данные --}}
                        <div class="lk__tab-content tab-content">
                            <h1 class="lk__h3">Личные данные</h1>

                             <div class="row lk__personal-info">
                                <div class="lk__form-l5">
                                    <div class="lk__input-wrap lk__form-group">
                                        <label for="pd_phone" class="lk__label">Телефон</label>
                                        <input type="tel" id="pd_phone" name="phone" class="lk__input">

                                        <div class="lk__errors">
                                            Ошибка
                                        </div>
                                    </div>
                                </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap lk__form-group input_disabled">
                                         <label for="pd_name" class="lk__label">Имя</label>
                                         <input type="text" id="pd_name" name="name" class="lk__input" disabled>
                                     </div>
                                 </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap lk__form-group">
                                         <label for="pd_email" class="lk__label">E-mail</label>
                                         <input type="email" id="pd_email" name="email" class="lk__input">
                                     </div>
                                 </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap lk__form-group input_disabled">
                                         <label for="pd_surname" class="lk__label">Фамилия</label>
                                         <input type="text" id="pd_surname" class="lk__input" disabled>
                                     </div>
                                 </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap lk__form-group input_disabled">
                                         <label for="pd_address" class="lk__label">Адрес</label>
                                         <input type="text" id="pd_address" name="address" class="lk__input" disabled>
                                     </div>
                                 </div>
                                 <div class="lk__form-l5">
                                     <div class="lk__input-wrap input_disabled">
                                         <label for="pd_patronymic" class="lk__label">Отчество</label>
                                         <input type="text" id="pd_patronymic" class="lk__input" disabled>
                                     </div>
                                 </div>

                                 <button class="lk__btn lk__btn-controls pi_btn">Сохранить</button>
                             </div>
                        </div>

                        {{-- Смена пароля --}}
                        <div class="lk__tab-content tab-content">
                            <h1 class="lk__h3">Смена пароля</h1>

                            <div class="lk__password-reset">
                                <div class="lk__input-wrap lk__form-group p_rel">
                                    <label for="pd_password" class="lk__label">Новый пароль</label>
                                    <input type="password" id="pd_password" name="password" class="lk__input">

                                    <div class="eyes">
                                        <div class="eye eye_closed"></div> {{-- .eye_closed - закрытый глаз --}}
                                    </div>

                                    <div class="lk__errors">
                                        Ошибка
                                    </div>
                                </div>

                                <div class="lk__input-wrap lk__form-group p_rel">
                                    <label for="pd_confirm_password" class="lk__label">Подтвердить пароль</label>
                                    <input type="password" id="pd_confirm_password" name="confirm_password" class="lk__input">

                                    <div class="eyes">
                                        <div class="eye eye_closed"></div> {{-- .eye_closed - закрытый глаз --}}
                                    </div>

                                    <div class="lk__errors">
                                        Ошибка
                                    </div>
                                </div>

                                <button class="lk__btn lk__btn-controls">Сохранить</button>
                            </div>
                        </div>

                        {{-- 404 --}}
                        <div class="lk__tab-content error">

                            <div>
                                <h1 class="error__404">404</h1>
                                <div class="error__title">
                                    Страница <br> не найдена
                                </div>

                                <div class="error__subtitle">
                                    Возможные причины:
                                </div>

                                <ul class="lk__list">
                                    <li class="lk__list-item">
                                        Вы неправильно набрали URL;
                                    </li>
                                    <li class="lk__list-item">
                                        Вы нажали на неверную ссылку, опубликованную на другом сайте;
                                    </li>
                                    <li class="lk__list-item">
                                        Закладка (ярлык) в Вашем браузере указывает на страницу, которая была
                                        перемещена или удалена.
                                    </li>
                                </ul>

                                <div class="error__text">
                                    Приносим Вам извинения за причиненные неудобства.
                                </div>

                                <ul class="lk__list">
                                    <li class="lk__list-item">
                                        <a href="https://inetspace.ru/"
                                           class="error__link"
                                           title="NetSpace - Главная страница"
                                           target="_blank"
                                           rel="nofollow"
                                        >
                                            Главная страница сайта «NETSPACE»
                                        </a>
                                    </li>
                                    <li class="lk__list-item">
                                        <a href="#" class="error__link" title="Личный кабинет">Личный кабинет</a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('includes.footer')

</div>

<script async src="/js/app.js"></script>

</body>

